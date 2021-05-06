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
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('category-list');
        $data = $this->category->paginate(25);
        return view('admin.categories.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('category-add');
        $option = $this->getcate();

        return view('admin.categories.add', compact('option'));
    }

    public function getcate()
    {
        $this->authorize('category-list');
        $data = category::where('status', 1)->get();
        $recusive = new Recusive($data);
        $option = $recusive->categoryRecure();
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
        $this->authorize('category-add');
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
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
    function getcateselect($parentId, $id = 0, $text = '')
    {
        $this->authorize('category-edit');
        $data = category::all();

        foreach ($data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect .= "<option selected value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                    $this->getcateselect($parentId, $value['id'], $text . '--');
                }
            }
        }
        return $this->htmlSelect;
    }
    public function edit($id)
    {
        $this->authorize('category-edit');
        $data =  $this->category->find($id);
        $option = $this->getcateselect($data->parent_id);
        // return response()->json(['data' => $data, 'option' => $option]);
        return view('admin.categories.edit',compact('data','option'));
    }
    public function adddm()
    {
        $option = $this->getcate();
        return response()->json(['option' => $option]);
    }
    public function savedm(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $this->category->create($data);
        return response()->json(['success' => 'thêm thành công']);
    }
    public function addloai()
    {
        $option = $this->getcate();
        return response()->json(['option' => $option]);
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
        $this->authorize('category-edit');
        $category = category::find($id);
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'status' => $request->status
        ]);
        Flash::success('Cập nhật thành công.');
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('category-delete');
        $category = category::find($id);
        $num = producttype::where('categori_id', $id)->get();
        if (!empty($num[0])) {
            return response()->json([
                'code' => 500,
                'messages' => 'Có loại sản phẩm thuộc danh mục nên không thể xóa.'
            ]);
        } else {
            $category->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        }
    }
}
