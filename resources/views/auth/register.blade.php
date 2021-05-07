@extends("layouts.app")

@section("main")
@error("status")
<p><strong>{{$message}}</strong></p>
@enderror
<form class="center1 pad" action="{{route('register')}}" method="post">
    @csrf
    <label class="white" for="name">Vardas:</label>
    @error("name")
    <br>
    <strong>{{$message}}</strong>
    @enderror
    <br>
    <input type="text" name="name" id="name" value="{{old('name')}}">
    <br>
    <label class="white" for="email">El.paštas:</label>
    @error("email")
    <br>
    <strong>{{$message}}</strong>
    @enderror
    <br>
    <input type="text" name="email" id="email" value="{{old('email')}}">
    <br>
    <label class="white" for="password">Slaptažodis:</label>
    @error("password")
    <br>
    <strong>{{$message}}</strong>
    @enderror
    <br>
    <input type="password" name="password" id="password">
    <br>
    <label class="white" for="password_confirmation">Patvirtinkite slaptažodį:</label>
    <br>
    <input type="password" name="password_confirmation" id="password_confirmation">
    <br>
    <input type="submit" value="Register">
</form>
@endsection