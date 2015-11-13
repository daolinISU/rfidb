<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Please verify Your Email Address</h2>

<div>
    Thank you for registering your email.
    Please follow the link below to verify your email address or copy and paste it into your browser's address bar.
    {{ URL::to('register/verify/' . $code) }}.<br/>
    You received this e-mail because this email address was entered into an activation screen on our website.
    Please ignore this message if you think you should not have received this e-mail.


</div>

</body>
</html>