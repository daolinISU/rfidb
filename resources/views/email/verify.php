<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Email Content</h2>

<div>
    {{$code}}<br>
    {{$data['code']}}<br>
    {{$data["code"]}}<br>

    {{!! $code !!}}<br>
    {{!! $code }}<br>
    {{! $code !}}<br>
    {{! $code }}<br>

    {!! $code !!}<br>
    {!! $code }<br>
    {! $code !}<br>
    {! $code }<br>

    {!!$data['code']}<br>
    {!!$data["code"]}<br>
    <?php echo $code ?><br>
    Thanks for creating an account with the verification demo app.
    Please follow the link below to verify your email address
    {{ URL::to('register/verify/'.$confirmation_code) }}.<br/>

</div>

</body>
</html>