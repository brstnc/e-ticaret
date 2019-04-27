<h1>{{ config('app.name') }}</h1>
<p>Merhaba {{ $user->name_lastname }}, kaydınız başarılı bir şekilde gerçekleşmiştir. </p>
<p>Kaydınızı aktifleştirmek için <a href="https://beyaznet-dev.net/E-Ticaret/laravel/public/user/active/{{ $user->activation_key }}">tıklayın.</a> </p>
