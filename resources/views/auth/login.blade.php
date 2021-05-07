@extends("layouts.app")

@section("main")
@error("status")
<p><strong>{{$message}}</strong></p>
@enderror
<div class="center1 pad">
    <form action="" method="post">
        @csrf
        <label class="white" for="email">El.paštas:</label>
        @error("email")
        <br>
        <strong>{{$message}}</strong>
        @enderror
        <br>
        <input type="text" name="email" id="email">
        <br>
        <label class="white" for="password">Slaptažodis:</label>
        @error("password")
        <br>
        <strong>{{$message}}</strong>
        @enderror
        <br>
        <input type="password" name="password" id="password">
        <br>
        <label class="white" for="remember">Prisiminti mane</label>
        <input type="checkbox" name="remember" id="remember">
        <br>
        <input type="submit" value="Login">
    </form>
</div>
@endsection