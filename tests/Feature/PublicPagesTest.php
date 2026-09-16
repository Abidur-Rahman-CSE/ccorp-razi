<?php

test('homepage returns 200 and renders core content and structured data', function () {
    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('Champion Interior Design')
        ->assertSee('Mushfiqur Rahman Razi')
        ->assertSee('01715394444')
        ->assertSee('chmpnidesign@gmail.com')
        ->assertSee('Spaces Designed Around the Way You Live.')
        ->assertSee('schema.org')
        ->assertSee('HomeAndConstructionBusiness');
});

test('projects index and case studies return 200', function () {
    $response = $this->get(route('projects.index'));
    $response->assertOk()
        ->assertSee('Selected Architectural Works')
        ->assertSee('Gulshan Lakeview Penthouse');

    $detailResponse = $this->get(route('projects.show', 'gulshan-lakeview-penthouse'));
    $detailResponse->assertOk()
        ->assertSee('Gulshan Lakeview Penthouse')
        ->assertSee('6,400 sq.ft')
        ->assertSee('Turnkey Execution');
});

test('services index and service details return 200', function () {
    $response = $this->get(route('services.index'));
    $response->assertOk()
        ->assertSee('Turnkey Interior & Architectural Services')
        ->assertSee('Residential Interior');

    $detailResponse = $this->get(route('services.show', 'residential-interior'));
    $detailResponse->assertOk()
        ->assertSee('Residential Interior')
        ->assertSee('বসতবাড়ির ইন্টেরিয়র')
        ->assertSee('Detailed Scope of Work');
});

test('about, process, and contact pages return 200', function () {
    $about = $this->get(route('about'));
    $about->assertOk()->assertSee('Design with Purpose. Build with Precision.');

    $process = $this->get(route('process'));
    $process->assertOk()->assertSee('The 8-Step Turnkey Process');

    $contact = $this->get(route('contact'));
    $contact->assertOk()->assertSee('Book a Private Architectural Consultation');
});

test('editorial insights index and detail return 200', function () {
    $index = $this->get(route('insights.index'));
    $index->assertOk()->assertSee('Architectural Insights & Design Commentary');

    $detail = $this->get(route('insights.show', 'designing-for-climate-and-light-in-dhaka'));
    $detail->assertOk()
        ->assertSee('Designing for Tropical Light and Urban Acoustic Calm in Dhaka')
        ->assertSee('Mushfiqur Rahman Razi');
});

test('dynamic sitemap returns 200 with valid xml content', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk()
        ->assertHeader('Content-Type', 'application/xml')
        ->assertSee('<urlset', false)
        ->assertSee('gulshan-lakeview-penthouse')
        ->assertSee('residential-interior');
});

test('contact inquiry handles valid submission and redirects with success', function () {
    $response = $this->post(route('contact.inquiry'), [
        'name' => 'Dr. Hasan Ahmed',
        'phone' => '01711122334',
        'project_type' => 'Residential Penthouse / Duplex',
        'message' => 'Looking for turnkey spatial planning and interior execution for our upcoming duplex apartment.',
    ]);

    $response->assertSessionHas('success')
        ->assertRedirect();

    $this->assertDatabaseHas('inquiries', [
        'name' => 'Dr. Hasan Ahmed',
        'phone' => '01711122334',
    ]);
});

test('contact inquiry silently ignores bot submissions with honeypot filled', function () {
    $response = $this->post(route('contact.inquiry'), [
        'name' => 'Spam Bot',
        'phone' => '1234567890',
        'message' => 'Spam content',
        'company_trap' => 'Bot triggered field',
    ]);

    $response->assertSessionHas('success')
        ->assertRedirect();
});

test('contact inquiry validates required fields', function () {
    $response = $this->post(route('contact.inquiry'), [
        'email' => 'incomplete@example.com',
    ]);

    $response->assertSessionHasErrors(['name', 'phone', 'message']);
});
