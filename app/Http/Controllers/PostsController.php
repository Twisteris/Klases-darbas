<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'delete']);
    }
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(9);
        return view("home", [
            'posts' => $posts
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'image' => ['required', 'max:1024', 'mimes:png,jpg'],
            'description' => ['required', 'max:1024'],
        ]);
        $image = Storage::disk('public')->put("posts/" . Auth()->user()->name, $request->image);
        Post::create([
            "title" => $request->title,
            "image" => $image,
            "description" => $request->description,
            "user_id" => Auth()->user()->id
        ]);
        return redirect()->route("home");
    }
    public function delete(Post $post)
    {
        if ($post->user_id == Auth()->User()->id) {
            Storage::disk("public")->delete($post->image);
            $post->delete();
            return redirect()->route('home');
        } else {
            return response(403);
        }
    }
}
