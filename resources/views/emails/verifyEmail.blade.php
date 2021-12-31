@component('mail::message')
# {{ $maildata['title'] }} 

{{ $maildata['message'] }} 

@component('mail::button', ['url' => $maildata['url']])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
