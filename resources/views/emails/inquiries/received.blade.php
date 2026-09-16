<x-mail::message>
<div style="text-align: center; margin-bottom: 24px;">
    <img src="{{ asset('images/brand/champion-corporation-black.svg') }}" alt="Champion Interior Design" style="height: 48px; width: auto; display: inline-block;" />
</div>

# New Studio Project Inquiry

A new project inquiry has been received from the Champion Interior Design website.

**Client Details:**
- **Full Name:** {{ $inquiry->name }}
- **Phone Number:** {{ $inquiry->phone }}
- **Project Type:** {{ $inquiry->project_type ?: 'Not specified' }}
- **Date & Time:** {{ $inquiry->created_at?->format('d M Y, h:i A') }}
- **IP Address:** {{ $inquiry->ip_address }}

**Project Message:**
> {{ $inquiry->message }}

Champion Interior Design • Dhaka Atelier
</x-mail::message>
