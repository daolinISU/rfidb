<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>User approval</h2>
<div class="bs-example">
    <h3>User information</h3>
    <dl class="dl-horizontal">
        <dt>Email</dt>
        <dd>{{ $email }}</dd>
        <dt>Name</dt>
        <dd>{{ $first_name." ".$last_name }}</dd>
        <dt>Organization</dt>
        <dd>{{ $organization }}</dd>
        <dt>Reason to apply</dt>
        <dd>{{ $reason }}</dd>
    </dl>
</div>

<div>
    Please follow the link below to aproof the new user  or copy and paste it into your browser's address bar.
    {{ URL::to('register/approval/' . $id) }}.<br/>



</div>

</body>
</html>