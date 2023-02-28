<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Register.net</title>
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@yield('content')
<script src="/vendor/jQuery/jquery-3.6.3.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
@yield('script')
</body>
</html>
