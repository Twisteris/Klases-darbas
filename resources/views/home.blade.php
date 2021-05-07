@extends("layouts.app")

@section("main")
<div class="center1">
    <h2 class="white">Sukurti</h2>
    @auth
    <form action="{{route('home')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="white" for="title">Pavadinimas:</label>
        @error("title")
        <br>
        <strong>{{$message}}</strong>
        @enderror
        <br>
        <input type="text" name="title" id="title" value="{{old('title')}}">
        <br>
        <label class="white" for="image">Nuotrauka:</label>
        @error("image")
        <br>
        <strong>{{$message}}</strong>
        @enderror
        <br>
        <input class="buton" type="file" name="image" id="image" value="{{old('image')}}">
        <br>
        <label class="white" for="description">Aprašymas</label>
        @error("description")
        <br>
        <strong>{{$message}}</strong>
        @enderror
        <br>
        <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
        <br>
        <input type="submit" value="Paskelbti">
    </form>
    @endauth
    @guest
    <p class="white">Tau reikia prisijungti, norint paskelbti!</p>
    @endguest
</div>
<div class="center1">
    <h2 class="white">Naujausi skelbimai</h2>
    @if (count($posts) > 0)
    @foreach ($posts as $post)
    <div>
        <h3>{{$post->title}}
            @auth
            @if ($post->user_id == Auth()->User()->id)
            <form action="{{route('post.delete', $post)}}" method="post">
                @csrf
                @method("DELETE")
                <input type="submit" value="Ištrinti">
            </form>
            @endif
            @endauth
        </h3>
        <img height="256px" src="{{Storage::url($post->image)}}" alt="">
        <p>{{$post->description}}</p>
        <small>Įkėlė <strong>{{$post->user()->name}}</strong></small>
    </div>
</div>

@endforeach
@else
<p>Kolkas nieko nėra...</p>
@endif
{{ $posts->appends(Request::all())->links() }}
@endsection