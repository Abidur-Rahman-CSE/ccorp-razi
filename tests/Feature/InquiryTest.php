<?php

use App\Mail\NewInquiryReceived;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;

test('valid inquiry is persisted to the database and studio is notified', function () {
    Mail::fake();

    $payload = [
        'name' => 'Kazi Farhan',
        'phone' => '01712345678',
        'project_type' => 'Residential Penthouse / Duplex',
        'message' => 'Looking to design and execute a 4,500 sq.ft turnkey penthouse in Gulshan II.',
    ];

    $response = $this->post(route('contact.inquiry'), $payload);

    $response->assertSessionHas('success')
        ->assertRedirect();

    $this->assertDatabaseHas('inquiries', [
        'name' => 'Kazi Farhan',
        'phone' => '01712345678',
        'project_type' => 'Residential Penthouse / Duplex',
        'message' => 'Looking to design and execute a 4,500 sq.ft turnkey penthouse in Gulshan II.',
        'status' => 'received',
    ]);

    $inquiry = Inquiry::where('phone', '01712345678')->first();
    expect($inquiry)->not->toBeNull()
        ->and($inquiry->notified_at)->not->toBeNull()
        ->and($inquiry->notification_error)->toBeNull();

    Mail::assertSent(NewInquiryReceived::class, function ($mail) use ($inquiry) {
        return $mail->inquiry->id === $inquiry->id;
    });
});

test('inquiry persists successfully even without optional project type', function () {
    $payload = [
        'name' => 'Sara Khan',
        'phone' => '01812345678',
        'message' => 'Renovation consultation for office space.',
    ];

    $response = $this->post(route('contact.inquiry'), $payload);

    $response->assertSessionHas('success')
        ->assertRedirect();

    $this->assertDatabaseHas('inquiries', [
        'name' => 'Sara Khan',
        'phone' => '01812345678',
        'project_type' => null,
    ]);
});

test('validation fails when required fields are missing and preserves input', function () {
    $response = $this->from(route('contact'))->post(route('contact.inquiry'), [
        'name' => 'Incomplete Name',
        // phone and message missing
    ]);

    $response->assertRedirect(route('contact'))
        ->assertSessionHasErrors(['phone', 'message']);

    $this->assertDatabaseCount('inquiries', 0);
});

test('bot submissions with honeypot filled are ignored and not persisted', function () {
    $response = $this->post(route('contact.inquiry'), [
        'name' => 'Bot Crawler',
        'phone' => '01999999999',
        'message' => 'Spam content',
        'company_trap' => 'Hidden honeypot triggered',
    ]);

    $response->assertSessionHas('success')
        ->assertRedirect();

    $this->assertDatabaseCount('inquiries', 0);
});

test('inquiry is retained and failure is recorded if notification fails', function () {
    Mail::shouldReceive('to')
        ->once()
        ->andReturnSelf();
    Mail::shouldReceive('send')
        ->once()
        ->andThrow(new RuntimeException('Mail transport offline'));

    $payload = [
        'name' => 'Tariq Al-Amin',
        'phone' => '01912345678',
        'project_type' => 'Commercial / Office Suite',
        'message' => 'Office design in Banani.',
    ];

    $response = $this->post(route('contact.inquiry'), $payload);

    $response->assertSessionHas('success')
        ->assertRedirect();

    $this->assertDatabaseHas('inquiries', [
        'name' => 'Tariq Al-Amin',
        'phone' => '01912345678',
    ]);

    $inquiry = Inquiry::where('phone', '01912345678')->first();
    expect($inquiry)->not->toBeNull()
        ->and($inquiry->notification_error)->toContain('Mail transport offline');
});

test('useful error is returned and input is preserved if persistence fails', function () {
    Inquiry::saving(function () {
        throw new Exception('Database write locked');
    });

    $payload = [
        'name' => 'Rashid Khan',
        'phone' => '01612345678',
        'project_type' => 'Exterior Façade Design',
        'message' => 'Façade renovation inquiry.',
    ];

    $response = $this->from(route('contact'))->post(route('contact.inquiry'), $payload);

    $response->assertRedirect(route('contact'))
        ->assertSessionHasErrors(['inquiry']);

    $response->assertSessionHas('_old_input', function ($old) {
        return ($old['name'] ?? null) === 'Rashid Khan'
            && ($old['phone'] ?? null) === '01612345678'
            && ($old['message'] ?? null) === 'Façade renovation inquiry.';
    });
});
