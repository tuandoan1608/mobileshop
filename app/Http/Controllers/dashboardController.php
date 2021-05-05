<?php

namespace App\Http\Controllers;

use App\orders;
use App\product;
use App\productAttribute;
use App\statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $this->authorize('dashboard-list');
        $countProduct = product::where('status', 1)->count();
        $countOrder = orders::whereIn('status', [1, 2, 3, 4, 5])->count();
        $doanhthu = statistic::sum('sales');
        $loinhuan = statistic::sum('profit');
        $date = Carbon::now()->toDateString();
        $orderdate = orders::where('order_date', $date)->count();
        $dtdate = statistic::where('order_date', $date)->select('sales')->sum('sales');
        $product = product::join('product_attribute', 'product.id', '=', 'product_attribute.product_id')
            ->select('product.*', 'product_attribute.*')
            ->get();
        $order=orders::where('status',1)->orderBy('created_at','asc')->get();
        return view('admin.dashboard.list', compact('countProduct', 'countOrder', 'doanhthu', 'orderdate', 'dtdate', 'product','order','loinhuan'));
    }
    public function getdata()
    {
        $statis = statistic::all();
        foreach ($statis as $key => $val) {

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
    public function softdate(Request $request)
    {
        $date = explode(' - ', $request->order_date);

        $statis = statistic::whereBetween('order_date', $date)->select('sales','profit','quantity','total_order as total','order_date as period')->get();
        $data[] ='';
       
        return response($statis);
    }
}
