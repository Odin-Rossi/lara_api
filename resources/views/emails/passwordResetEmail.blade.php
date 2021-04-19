@component('mail::message')
# Introduction
Hello Motherfucker with {{$user->email}},

            You are receiving this email cause you requested a password change on your account

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Click here to Die
@endcomponent

Customer Details <br>
{{$user->email}}<br>
{{$user->name}}<br>
{{$user->created_at}}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent