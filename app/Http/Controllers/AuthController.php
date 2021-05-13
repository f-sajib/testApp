<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login($slug)
    {
        $hospital = Hospital::query()->where('slug',trim($slug))->firstOrFail();

        $icon = $hospital && $hospital->logo ? $hospital->logo : asset('assets/images/hospital.png');
        return view('auth.login', compact('hospital','icon'));
    }

    public function userLogin(LoginUserRequest $request)
    {
        $data = $request->validated();


        $userModel = User::query()->where('email',$data['email'])->first();

        if(!$userModel) {
            notify()->info("You Are Not Registered","Info","topRight");
            return redirect()->back()
                ->withInput($request->all());
        }

        if (!Hash::check($request->input('password'), $userModel->password)) {
            notify()->error("Unauthorized access, wrong password, please try again!","Error","topRight");
            return redirect()
                ->back()
                ->withInput($request->all());
        }
        notify()->success("Successfully Loged In","Success","topRight");

        return redirect()->back();

//        Auth::guard('web')->login($userModel);
//        return redirect()->route('popo');
    }
}
