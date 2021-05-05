<?php
 namespace App\Http\ViewComposer;
 use App\Components\Recusive;
 use Illuminate\View\View;
use App\category;
use App\Components\Recusive as ComponentsRecusive;
use App\orders;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\DB;

class categoryComposer
 {
     protected $category;
     public $movieList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct(category $category)
     {
         $this->category=$category;
     }
   
     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
         $menu=category::where('status',1)->where('parent_id',0)->get();
         $cart= Cart::instance('shopping')->content();
         $total=0;
         foreach($cart as $item){
             $price=$item->price;
             $total +=$price;
         }
         $order=orders::where('status',1)->get();
        $category=category::where('status',1)->get();
         $view->with(['menu'=>$menu,'category'=>$category,'cart'=>$cart,'total'=>$total,'order'=>$order]);
         
     }
 }