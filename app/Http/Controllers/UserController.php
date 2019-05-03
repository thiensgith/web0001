<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
            return redirect()->route('admin_dashboard');
        }
        return view('user.dashboard');
    }

    public function profile(Request $request){
        return view('user.profile');
    }

    public function changeAvt(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
                $request->validate([
                    'avatar' => 'image|required'
                ]);
        $imagename = time().rand(0,1000).'.'.$file->getClientOriginalExtension();
        $avatar = $request->user();
        $avatar->avatar = $imagename;
        $avatar->save();

        $file->move(public_path('assets/user_avatar'),$imagename);

        return redirect()->back();
        } else abort(415,'Unsupported Media Type');
    }
}
