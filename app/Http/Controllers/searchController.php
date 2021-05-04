<?php

namespace App\Http\Controllers;

use App\Components\converString;
use App\Components\convertstring;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class searchController extends Controller
{
    public function search(Request $request)
    {
        $data = product::whereIn('producttype_id', $request->brand)
            ->get();
        dd($data);
        if ($request->ajax()) {

            $output = '';

            // if(!empty($data)){
            //     foreach($data as $item){
            //         $output +=
            //         '<div class="col-lg-4 col-md-4 col-sm-6 mt-40">

            //         <div class="single-product-wrap">
            //             <div class="product-image">
            //                 <a href="/san-pham/'.$item->slug.'">
            //                     <img src="{{ Storage::url($item->image) }}"
            //                         alt="">
            //                 </a>
            //                 <span class="sticker">New</span>
            //             </div>
            //             <div class="product_desc">
            //                 <div class="product_desc_info">

            //                     <h4><a class="product_name"
            //                             href="/san-pham/'.$item->slug.'"> '.$item->name.'</a>
            //                     </h4>
            //                     <div class="price-box">
            //                         <span class="new-price">.đ</span>
            //                     </div>
            //                 </div>

            //             </div>
            //         </div>

            //     </div>';
            //     }
            // }


        }
    }
    public function searchByName(Request $request)
    {  
        $con=new converString();
       $key=Str::lower($con->convert_vi_to_en($request->search));
        $product=product::where('lower_name','like','%'.$key.'%')->get();   
        return view('client.search.index',compact('product'));
    }
    public function searchindex(Request $request)
    {

       
    }
}
