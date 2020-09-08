@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
sifarisiniz mueyyen sebeblere gore legv edildi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
