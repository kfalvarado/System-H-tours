<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="myFunction()">
    <form action="{{ route('email.verificar') }}" method="post" id="form1">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="user" value="{{ $user }}">
    </form>

    <script>
      form1 = document.getElementById('form1').submit()
  
    </script>
</body>
</html>