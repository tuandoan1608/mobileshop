<?php
 namespace App\Http\ViewComposer;
 use App\Components\Recusive;
 use Illuminate\View\View;
use App\category;
use App\Components\Recusive as ComponentsRecusive;
use App\orders;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\DB;

class masterComposer
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
        
     }
   
     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        
        
         $order=orders::where('status',1)->count();
       
         $view->with(['order'=>$order]);
         
     }
 }