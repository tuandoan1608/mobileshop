<?php

namespace App\Http\Controllers;

use App\orders;
use App\product;
use App\statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $countProduct=product::where('status',1)->count();
        $countOrder=orders::whereIn('status',[1,2,3,4,5])->count();
        $doanhthu=statistic::sum('sales');
        $date=Carbon::now()->toDateString();
        $orderdate=orders::where('order_date',$date)->count();
        $dtdate=statistic::where('order_date',$date)->select('sales')->sum('sales');
      
        return view('admin.dashboard.list',compact('countProduct','countOrder','doanhthu','orderdate','dtdate'));
    }
    public function getdata()
    {
        $statis=statistic::all();
        foreach($statis as $key => $val){

            $data[] = array(
             'period' => $val->order_date,
             'order' => $val->total_order,
             'sales' => $val->sales,
             'profit' => $val->profit,
             'quantity' => $val->quantity
         );
        }
        return response($data);
    }
}
