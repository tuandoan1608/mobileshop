<?php

namespace App\Http\Controllers;

use App\attribute;
use App\attributevalue;
use App\attributevalue_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class attributeController extends Controller
{

   public function index()
   {
      $size = attribute::where('id',5)->first();
      $color = attribute::where('id',6)->first();
      $attributecolor=attributevalue::where('attribute_id',6)->get();
      $attributesize=attributevalue_size::where('attribute_id',5)->get();
      return view('admin.attributes.list', compact('size', 'color','attributecolor','attributesize'));
   }

   public function create()
   {
      $attribute=attribute::all();
      return view('admin.attributes.add',compact('attribute'));
   }
   public function store(Request $request)
   {
      if($request->attribute_type==5){
        foreach($request->namesize as $item){
         $size=new attributevalue_size();
         $size->attribute_id=5;
         $size->name=$item;
         $size->save();
        }
      }else{
         foreach($request->namecolor as $key=> $item){
            $color=new attributevalue();
            $color->name=$item;
            $color->attribute_id=6;
            $color->color=$request->color[$key];
            $color->save();
           }
      }
      return redirect()->route('astributeindex');
   }
   public function show($id)
   {
      $data = $this->attribute->find($id);
      $attrivalue = $this->attributevalue->where('attribute_id', $id)->get();
      return $this->sendRespone([$data, $attrivalue], 'update');
   }
}
