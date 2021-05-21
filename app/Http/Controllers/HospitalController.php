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
     * create a new Hospital resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateHospitalRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

//            if($request->hasFile('logo')) {
//                $data['logo'] = $request->logo->store('hospital/logo', 'public');
//            }
//            $data['logo'];
            $user = resolve(AuthService::class)->adminRegister($data['user']);
            unset($data['user']);
            $data['user_id'] = $user->id;
            $hospital = Hospital::create($data);
            DB::commit();
            return redirect(url($hospital->domain.'/login'));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            notify()->error("Process Does Not Completed! Please Contact Our IT Department");
            return redirect()->back();
        }
    }

    public function checkDomain(Request $request)
    {
        if(!is_null($request->get('domain'))) {
            $check = Hospital::query()
                            ->where('domain',trim($request->get('domain')))
                            ->exists();
            if($check) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        }

        return null;

    }
}
