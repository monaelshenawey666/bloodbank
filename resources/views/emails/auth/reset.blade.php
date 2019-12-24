@component('mail::message')
# Introduction

///The body of your message.
Blood Bank Reset Password..

@component('mail::button', ['url' => 'http://mona.com'])
///Button Text
Reset
@endcomponent


<p>Your reset code is :{{$code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
