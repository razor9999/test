@component('mail::message')
# Hi {{$name}},

Cảm ơn bạn đã đăng kí .

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
