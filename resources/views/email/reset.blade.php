<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Password reset</h2>

<div>
    Please follow the link below to reset your account password. This link will expired as soon as you click it. <br/>
    {{ URL::to('password/reset/' . $token) }}.<br/>
    You received this e-mail because this email address was entered into an activation screen on our website.
    Please ignore this message if you think you should not have received this e-mail.


</div>

</body>
</html>