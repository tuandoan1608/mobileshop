<?php

namespace App\Http\Controllers;

use App\attribute;
use App\attributevalue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class attributeController extends Controller
{
    private $attribute;
    private $attributevalue;
    public function __construct(attribute $attribute,attributevalue $attributevalue)
    {
        $this->attribute=$attribute;
        $this->attributevalue=$attributevalue;
    }
  public function index()
  {
      $attribute=$this->attribute->first();
      $attributevalue= DB::table('attribute')
      ->join('attribute_value','attribute.astributeID','=','attribute_value.attribute_id')
    
      ->get();
      
     return view('admin.attributes.list',compact('attribute','attributevalue'));
  }

  public function create()
  {
     return view('admin.attributes.add');
  }
  public function store(Request $request)
  {

    
   
    $at= new attribute();
    $at->name=$request->attribute;
    $at->save();
    $datas=[  'attribute_id'=>$at->id];
      
        
    
    foreach($request->namecolor as $key=>$item){
       $datas['name']=$item;
       $datas['color']=$request->color[$key];
       $this->attributevalue->create($datas);
    }
    return redirect()->route('astributeindex');
  }
  public function show($id)
  {
     $data= $this->attribute->find($id);
    $attrivalue=$this->attributevalue->where('attribute_id',$id)->get();
    return $this->sendRespone([$data,$attrivalue],'update');
  }
}
