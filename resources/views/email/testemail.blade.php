@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '/'])
Button Text
@endcomponent

{{$nonConformities}}
@component('mail::panel')
This is the panel content.
@endcomponent

@component('mail::table')
first	first1
second	first2
third	first3
forth	first4
fifth	first5
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
