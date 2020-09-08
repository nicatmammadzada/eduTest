@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])

Salam,{{$user->name.' '.$user->surname}} <a href="{{route('activation',$user->activation)}}"> Klikleyib acautunuzu aktiv edin</a>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
