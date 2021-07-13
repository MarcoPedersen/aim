@component('mail::message')
Hello {{$name}},  {{-- use double space for line break --}}
You have created a profile with the  username: {{$username}}

Thank you for creating a profile with us!

Click below to go to your dashboard right now
@component('mail::button', ['url' => $link])
    Go to your inbox
@endcomponent
Sincerely,
A.I.M team.
@endcomponent
