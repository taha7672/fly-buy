<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function TodayReport(){
        $today = date('d-m-y');
        $order= DB::table('orders')->where('date',$today)->where('status',0)->get();
        return view('admin.report.today_order', compact('order'));
    }
    public function MonthReport(){
        $month = date('F');
        $order= DB::table('orders')->where('month',$month)->where('status',0)->get();
        return view('admin.report.month_order', compact('order'));
    }
    public function Deliverd(){
   
        $order= DB::table('orders')->where('status',3)->get();
        return view('admin.report.deliverd_order', compact('order'));
    }
}
