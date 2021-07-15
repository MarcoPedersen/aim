@component('mail::message')
A new game has been scheduled on the date: {{$date}}

The set price is {{ $price }}

The limit is {{ $limit }}

and the field is {{ $field_id }}

Click below to go to your dashboard right now
@component('mail::button', ['url' => $link])
    Go to your inbox
@endcomponent
Sincerely,
A.I.M team.
@endcomponent
