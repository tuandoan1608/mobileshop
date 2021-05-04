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
      return view('admin.attributes.add');
   }
   public function store(Request $request)
   {



      $at = new attribute();
      $at->name = $request->attribute;
      $at->save();
      $datas = ['attribute_id' => $at->id];



      foreach ($request->namecolor as $key => $item) {
         $datas['name'] = $item;
         $datas['color'] = $request->color[$key];
         $this->attributevalue->create($datas);
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
