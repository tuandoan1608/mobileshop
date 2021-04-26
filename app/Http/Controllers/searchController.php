<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $request)
    { $data=product::whereIn('producttype_id', $request->brand)
        ->get();
            dd($data);
        if($request->ajax()){
         
            $output='';
           
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
}
