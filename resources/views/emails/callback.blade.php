<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Email</title>
</head>
<body>

<p>Имя отправителя: {{$request->name}}</p>
<p>E-mail: {{$request->email }}</p>
<p>Сообщение: {{$request->message}} </p>

</body>

</html>
