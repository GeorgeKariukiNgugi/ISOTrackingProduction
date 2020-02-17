@component('mail::message')
Hello, This is a polite Reminder for Scoring  the current Quater for your ISO program

@component('mail::button', ['url' => 'https://svdt1isoscard1.safaricom.net/'])
Click To Score Your KPIs
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
@endcomponent
