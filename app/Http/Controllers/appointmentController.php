<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DateTime;

class appointmentController extends Controller
{
    public function index()
    {
        return view('appointment.index');
    }

    public function create()
    {
        $hcode = Auth::user()->hospital;
        $hospital = DB::table('hospital_set')->where('hsub',$hcode)->first();
        $service = DB::table('service_plan')->where('ser_hcode',$hcode)->get();

        return view('appointment.create',['hospital'=>$hospital,'service'=>$service]);
    }

    public function store(Request $request)
    {
        $check_day = DB::table('service_plan')
                    ->select('ser_daily')
                    ->where('ser_id',$request->formValues['service_plan'])
                    ->first();
        $dateObject = new DateTime($request->date_app);
        $dayOfWeek = $dateObject->format('w');
        dd($dayOfWeek);
        // dd($request->formValues,$request->date_app);
    }
}
