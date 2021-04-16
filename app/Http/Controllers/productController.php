<?php

namespace App\Http\Controllers;

use App\attributevalue;
use App\category;
use App\product;
use App\productAttribute;
use App\productImage;
use App\producttype;
use App\specification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class productController extends Controller
{   private $product;
    public function __construct(product $product)
    {
       $this->product=$product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=product::all();
  
    
        return view('admin.products.list',compact('product'));
    }
   
    // public function search(Request $request)
    // {
    // 	$data = [];

    //     if($request->has('q')){
    //         $search = $request->q;
    //         $data =specification::select("id","Band")
    //         		->where('Band','LIKE',"%$search%")
    //         		->get();
    //     }
    //     return response()->json($data);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $color=attributevalue::all();
        $category=category::all();
        $protype=producttype::all();
        $speci=DB::table('specifications')
        ->select('Band','Chip')
        ->groupBy('Chip','Band')->get();
        return view('admin.products.add',compact('color','category','protype','speci'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        if($request->hasFile('feature_image_path')){
            $file=$request->feature_image_path;

            $filenamehash= Str::random(10).'.'.$file->getClientOriginalExtension();
            $path=$request->file('feature_image_path')->storeAs('public/productimg/'.Auth::user()->id,$filenamehash);
            
        }
        $data=new product();
        $data->name=$request->name;
        $data->slug=Str::slug($request->name);
        $data->price=$request->price;
        $data->discount=$request->discount;
        $data->category_id=$request->category_id;
        $data->producttype_id=$request->producttype_id;
        $data->content=$request->content;
        $data->image= $path;
        $data->save();
        
        //luu specification
        $specification=new specification();
        $specification->product_id=$data->id;
        $specification->Display=$request->display;
        $specification->Operating=$request->operating;
        $specification->Memory=$request->memory;
        $specification->Chip=$request->chip;
        $specification->Ram=$request->ram;
        $specification->Sim=$request->sim;
        $specification->Battery=$request->battery;
        $specification->Camera_front=$request->camera_front;
        $specification->Camera_rear=$request->camera_rear;
        $specification->Design=$request->design;
        $specification->Mass=$request->mass;
        $specification->Wifi=$request->wifi;
        $specification->Security=$request->security;
        $specification->Band=$request->band;
        $specification->save();
       
        foreach($request->astributevalue_id as $key=>$item){
            $productattribute= new productAttribute();
            $productattribute->product_id=$data->id;
            $productattribute->attributevalue_id=$item;
            $productattribute->import_price=$request->import_price[$key];
            $productattribute->export_price=$request->export_price[$key];
            $productattribute->quantity=$request->quantity[$key];
            $productattribute->save();
           
            $image='image'.$key;
            foreach($request->$image  as $items){
                
         
                $fileNameHashs =Str::random(10).'.' . $items->getClientOriginalExtension();
                $paths = $items->storeAs('public/productimageattribute/' . auth()->id(), $fileNameHashs);
               $productimage=new productImage();
               $productimage->productattribute_id=$productattribute->id;
               $productimage->image=$paths;
               $productimage->save();
            }
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=product::find($id);
        $category=category::all();
        $protype =producttype::all();
     
        $speci =specification::where('product_id',$id);
        $product_attribute=productAttribute::where('product_id',$id)->get();
        $color=attributevalue::all();
        return view('admin.products.edit',compact('product','product_attribute','speci','category','protype','color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=new product();
        if($request->hasFile('feature_image_path')){
            $file=$request->feature_image_path;
            Storage::delete($data->image);
            $filenamehash= Str::random(10).'.'.$file->getClientOriginalExtension();
            $path=$request->file('feature_image_path')->storeAs('public/productimg/'.Auth::user()->id,$filenamehash);
            $data->image= $path;
        }else{
            $data->name=$request->name;
            $data->slug=Str::slug($request->name);
            $data->price=$request->price;
            $data->discount=$request->discount;
            $data->category_id=$request->category_id;
            $data->producttype_id=$request->producttype_id;
            $data->content=$request->content;
            $data->update();
        }
    
        
        
        //update specification
        $specification=new specification();
        $specification->product_id=$data->id;
        $specification->Display=$request->display;
        $specification->Operating=$request->operating;
        $specification->Memory=$request->memory;
        $specification->Chip=$request->chip;
        $specification->Ram=$request->ram;
        $specification->Sim=$request->sim;
        $specification->Battery=$request->battery;
        $specification->Camera_front=$request->camera_front;
        $specification->Camera_rear=$request->camera_rear;
        $specification->Design=$request->design;
        $specification->Mass=$request->mass;
        $specification->Wifi=$request->wifi;
        $specification->Security=$request->security;
        $specification->Band=$request->band;
        $specification->update();
       
        foreach($request->astributevalue_id as $key=>$item){
            $productattribute= new productAttribute();
            $productattribute->product_id=$data->id;
            $productattribute->attributevalue_id=$item;
            $productattribute->import_price=$request->import_price[$key];
            $productattribute->export_price=$request->export_price[$key];
            $productattribute->quantity=$request->quantity[$key];
            $productattribute->save();
           
            $image='image'.$key;
            if(!empty($image)){
                foreach($request->$image  as $items){
                
         
                    $fileNameHashs =Str::random(10).'.' . $items->getClientOriginalExtension();
                    $paths = $items->storeAs('public/productimageattribute/' . auth()->id(), $fileNameHashs);
                    $productimage=new productImage();
                    $productimage->productattribute_id=$productattribute->id;
                    $productimage->image=$paths;
                    $productimage->save();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deletes($id)
    {
       $data=productAttribute::find($id);
       $data->delete();
       return response()->json(['code'=>200,
       'message'=>'success']);
    }
}
