@component('mail::message')
# Introduction
Hello Motherfucker @ {{$user->email}}, 

The body of your message. welcome to posty

@component('mail::button', ['url' => $url, 'color' => 'success'])
Click here to Die
@endcomponent

Customer Details
{{$user->email}}
{{$user->name}}
{{$user->created_at}} 

Thanks,<br>
{{ config('app.name') }}
@endcomponent

