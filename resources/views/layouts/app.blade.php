<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP darbas</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <h1 class="pagename"><a href="{{route('home')}}">Puslapis</a></h1>
    @guest
    <div class="button">
        <a class="mg" href="{{route('login')}}">Prisijungti</a>
        <a class="mf" href="{{route('register')}}">Registruotis</a>
    </div>
    @endguest
    @auth
    <form action="{{route('logout')}}" method="post">
        @csrf
        <label class="white" for="">Sveikas atvykęs <strong>{{Auth()->User()->name}}</strong>!</label>
        <input type="submit" value="Logout">
    </form>
    @endauth
    @yield("main")
</body>

</html>