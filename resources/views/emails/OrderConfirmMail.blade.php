@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
    Salam,{{$user->name.' '.$user->surname}}"> Sifarisiniz qeyde alindi :</a>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
