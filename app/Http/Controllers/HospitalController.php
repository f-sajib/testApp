<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHospitalRequest;
use App\Models\Hospital;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HospitalController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $icon = asset('assets/images/config.png');
        return view('hospitals.index',compact('icon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateHospitalRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if($request->hasFile('logo')) {
                $data['logo'] = $request->logo->store('hospital/logo', 'public');
            }
            $user = resolve(AuthService::class)->adminRegister($data['user']);
            unset($data['user']);
            $data['user_id'] = $user->id;
            $hospital = Hospital::create($data);
            DB::commit();
            return redirect(url($hospital->slug.'/login'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors('Process Does Not Completed! Please Contact Our IT Department');
        }
    }
}
