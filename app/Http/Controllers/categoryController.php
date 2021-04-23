<?php

namespace App\Http\Controllers;
use App\category;
use App\Components\Recusive;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\StorecategoryRequest;
use App\producttype;
use Laracasts\Flash\Flash;

class categoryController extends Controller
{
    private $category;
 private $htmlSelect;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(category $category)
    {
        $this->category=$category;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->category->paginate(25);
        return view('admin.categories.list',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $option=$this->getcate();
    
        return view('admin.categories.add',compact('option'));
    }

    public function getcate()
    {
        $data=category::where('status',1)->get();
        $recusive=new Recusive($data);
        $option=$recusive->categoryRecure();
        return $option;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $data['slug']=Str::slug($request->name);
        $this->category->create($data);
        Flash::success('Thêm danh mục thành công.');
      
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   
        return view('admin.categories.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function getcateselect($parentId, $id =0, $text = '')
    {
        $data=$this->category->all();

        foreach ($data as $value) {
            if ($value['parent_id'] == $id) {
                if(!empty($parentId)&& $parentId==$value['id']){
                    $this->htmlSelect .= "<option selected value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                }
                $this->htmlSelect .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";

                $this->getcateselect($parentId,$value['id'], $text . '--');
            }
        }
        return $this->htmlSelect;
    }
    public function edit($id)
    {
        $data=  $this->category->find($id);
        $option=$this->getcateselect($data->parent_id);
        return response()->json(['data'=>$data,'option'=>$option]);
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
      $category=category::find($id);
      $category->update([
        'name' => $request->name,
        'parent_id' => $request->parent_id,
        'slug' => Str::slug($request->name),
        'status' => $request->status
      ]);
       Flash::success('Cập nhật thành công.');
       return response()->json(['success'=>'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $num=producttype::where('categori_id',$id)->get();
        if(!empty($num[0])){
          return response()->json([ 'code'=>500,
          'messages'=>'Có loại sản phẩm thuộc danh mục nên không thể xóa.']);
        }else{
          $category->delete();
          return response()->json([ 'code'=>200,
          'message'=>'success']);
        }
       
    }
}
