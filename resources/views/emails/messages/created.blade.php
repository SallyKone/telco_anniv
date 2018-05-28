@component('mail::message')
# Bonjour Telco

{{$nom}} <br>
{{$email}} <br>
{{$telephone}} <br>





@component('mail::panel')
{{$msg}}
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
