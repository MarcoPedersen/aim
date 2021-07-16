@component('mail::message')
The player {{ $name }} has signed up to your game on {{ $date }}

There's currently {{$number }} players signed up for this game

@component('mail::button', ['url' => $link])
Go to your Dashboard to see signups
@endcomponent
Sincerely,
A.I.M team.
@endcomponent
