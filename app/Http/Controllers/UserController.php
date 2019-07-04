<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request)
    {
        if ($request->user()->authorizeRoles('admin',true)) {
            return redirect()->route('admin.index');
        }
        return view('user.dashboard');
    }

    public function profile(Request $request){
        return view('user.profile');
    }

    public function changeAvt(Request $request)
    {
        if ($request->hasFile('uploadavatar')) {
            $file = $request->uploadavatar;
            $request->validate([
                'uploadavatar' => 'image|required'
            ]);
            $imagename = time().rand(0,1000).'.'.$file->getClientOriginalExtension();
            $avatar = Image::make($file)->fit(300, 300)->encode('jpg')->save(public_path('assets/user_avatar/'.$imagename));
            $request->user()->avatar = $imagename;
            $request->user()->save();
            return redirect()->back();
        } else abort(403, "Errors");
    }
}
