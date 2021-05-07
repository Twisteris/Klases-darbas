<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view("auth.login");
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($request->only("email", "password"), $request->remember)) {
            return redirect()->route("home");
        } else {
            return back()->withErrors(["status" => "Email or password is incorrect!"]);
        }
    }
}
