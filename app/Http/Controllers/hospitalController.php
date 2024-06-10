<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class hospitalController extends Controller
{
    public function index()
    {
        $hcode = Auth::user()->hospital;
        $service = DB::table('service_plan')->where('ser_hcode',$hcode)->get();
        $subhos = DB::table('hospital_set')->where('hmain',$hcode)->where('hsub','!=',$hcode)->get();
        return view('hospital.index',['service'=>$service,'subhos'=>$subhos]);
    }
}
