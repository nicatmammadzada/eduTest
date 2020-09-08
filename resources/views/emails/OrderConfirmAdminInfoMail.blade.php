@component('mail::message')


@component('mail::button', ['url' => ''])
{{$user->name.' '.$user->surname}} > adli sexsin yeni sifarisi var</a>
@endcomponent

{{ config('app.name') }}
@endcomponent
