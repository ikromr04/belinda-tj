<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $details['vacancy'] }}</title>
</head>

<body>
  <p>Имя: {{ $details['name'] }}</p>
  <p>E-mail: {{ $details['email'] }}</p>
  <p>Тел: {{ $details['tel'] }}</p>
  <p>Сообщение: {{ $details['message'] }}</p>
</body>

</html>
