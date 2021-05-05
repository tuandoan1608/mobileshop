<?php

namespace App\Http\Controllers;

use App\attributevalue;
use App\attributevalue_size;
use App\category;
use App\Components\Recusive;
use App\product;
use App\product_spetification;
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
{
    private $product;
    private $htmlSelect;
    public function __construct(product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('product-list');
        $product = product::all();
        return view('admin.products.list', compact('product'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('product-add');
        $color = attributevalue::all();
        $size = attributevalue_size::all();
        $category = $this->getcate();
        $protype = producttype::all();
        $spe = specification::where('status', 1)->get();
        return view('admin.products.add', compact('color', 'category', 'protype',  'size', 'spe'));
    }
    public function getcate()
    {
        $data = category::all();
        $recusive = new Recusive($data);
        $option = $recusive->categoryRecure();
        return $option;
    }
    function getd($parentId, $id = 0, $text = '')
    {
        $data = category::all();

        foreach ($data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect .= "<option selected value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                    $this->getd($parentId, $value['id'], $text . '--');
                }
            }
        }
        return $this->htmlSelect;
    }
    public function loaisp(Request $request)
    {
        if ($request->ajax()) {
            $data = producttype::where('categori_id', $request->id)->select('id', 'name')->get();

            return response()->json($data);
        }
    }
    public function getsize(Request $request)
    {
        if ($request->ajax()) {
            $outcolor = '';
            $out = '';
            $outsize = '';
            //color
            $color = $request->color;
            $color = substr($color, 1);
            $idcolor = explode('/', $color);
            //size
            $size = $request->size;
            $size = substr($size, 1);
            $idsize = explode('/', $size);

            foreach ($idcolor as $key => $item) {
                $datacolor = attributevalue::find($item);
                $outcolor .=
                    '
                            <tr>
                                <td>   <lable>' . $datacolor->name . '</lable><input style="   visibility: hidden;" name="color[]" readonly value="' . $datacolor->id . '" type="text" class="form-control"></td>
                                <td>   <input type="number" required name="quantity[]" class="form-control"></td>
                                <td>    <input type="file" required name="image[]" class="form-control"></td>
                                <td>  <input style="   visibility: hidden;" name="color_id[]" value="' . $item . '" > </td>
                            </tr> 
                     ';
            }
            foreach ($idsize as $keys => $items) {
                $datasize = attributevalue_size::find($items);
                $outsize .=
                    '
                    <tr>
                        <td>   <lable>' . $datasize->name . '</lable><input style="   visibility: hidden;" name="size[]" readonly value="' . $datasize->id . '" type="text" class="form-control"></td>
                        <td>   <input type="number" required name="import_price[]" class="form-control"></td>
                        <td>   <input type="number" required name="export_price[]" class="form-control"></td>
                    
                    </tr> 
               ';
            }
            return response(['outcolor' => $outcolor, 'outsize' => $outsize,]);
        }
    }

    public function getspe()
    {
        $output = '';
        $data = specification::where('status', 1)->get();
        foreach ($data as $key => $item) {
            if ($item->default == 1) {
                $output .= '
            <li><input type="checkbox" name="spe[]" checked id="checkbox' . $key . '" value="' . $item->id . '"><label class="uppercase" for="checkbox' . $key . '">' . $item->name . '</label></li>
            ';
            } else {
                $output .= '
            <li><input name="spe[]"  type="checkbox" id="checkbox' . $key . '" value="' . $item->id . '"><label class="uppercase" for="checkbox' . $key . '">' . $item->name . '</label></li>
            ';
            }
        }
        return response($output);
    }
    public function addspe(Request $request)
    {
        $output = '';
        $spe = $request->spe;
        $spe = substr($spe, 1);
        $idspe = explode('/', $spe);
        foreach ($idspe as $key => $item) {
            $data = specification::find($item);
            $output .=
                '<tr>
                    <td>   <lable>' . $data->name . '</lable><input style="   visibility: hidden;" name="speid[]" readonly value="' . $data->id . '" type="text" class="form-control"></td>
                    <td>    <input type="text" name="specontent[]" required class="form-control"></td>        
                </tr>';
        }
        return response($output);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('product-add');


        if ($request->hasFile('feature_image_path')) {
            $file = $request->feature_image_path;

            $filenamehash = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('feature_image_path')->storeAs('public/productimg/' . Auth::user()->id, $filenamehash);
        } else {
        }
        $data = new product();
        $data->name = $request->name;
        $data->lower_name = Str::lower($request->name);
        $data->slug = Str::slug($request->name);
        $data->price = $request->price;
        if (isset($request->discount) && isset($request->startdate) && isset($request->enddate)) {
            $old_datestart = explode('/', $request->startdate);
            $new_datastart = $old_datestart[2] . '-' . $old_datestart[0] . '-' . $old_datestart[1];
            $old_dateend = explode('/', $request->enddate);
            $new_dataend = $old_dateend[2] . '-' . $old_dateend[0] . '-' . $old_dateend[1];
            $data->discount = $request->discount;
            $data->startdate = $new_datastart;
            $data->enddate =  $new_dataend;
        }
        $data->category_id = $request->category_id;
        $data->producttype_id = $request->producttype_id;
        $data->content = $request->content;
        $data->image = $path;
        $data->status = $request->status;
        $data->save();

        //luu attribute sp
        if ($request->attribute == 1) {
            if (isset($request->size)) {
                foreach ($request->size as $key => $item) {
                    foreach ($request->color as $key1 => $items) {
                        $productattribute = new productAttribute();
                        $productattribute->product_id = $data->id;
                        $productattribute->attributevaluesize_id = $item;
                        $productattribute->attributevalue_id = $items;
                        $productattribute->import_price = $request->import_price[$key];
                        $productattribute->export_price = $request->export_price[$key];
                        $productattribute->quantity = $request->quantity[$key1];
                        $productattribute->save();
                    }
                }
                foreach ($request->image  as $key => $items) {
                    $fileNameHashs = Str::random(10) . '.' . $items->getClientOriginalExtension();
                    $paths = $items->storeAs('public/productimageattribute/' . auth()->id(), $fileNameHashs);
                    $productimage = new productImage();
                    $productimage->product_id = $data->id;
                    $productimage->image = $paths;
                    $productimage->color_id = $request->color_id[$key];
                    $productimage->save();
                }
            }
        } else {
            $productattribute = new productAttribute();
            $productattribute->product_id = $data->id;
            $productattribute->import_price = $request->import_price;
            $productattribute->export_price = $request->export_price;
            $productattribute->quantity = $request->quantity;
            $productattribute->save();
        }
        //luu specification
        if (!empty($request->speid)) {
            foreach ($request->speid  as $key => $item) {
                $prospe = new product_spetification();
                $prospe->product_id = $data->id;
                $prospe->spetification_id = $item;
                $prospe->content = $request->specontent[$key];
                $prospe->save();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('product-edit');
        
        $size = attributevalue_size::all();
     
        $protype = producttype::all();
        $product = product::find($id);
        $category = $this->getd($product->category_id);
        $protype = producttype::all();
        $color_id=productAttribute::where('product_id',$id)->select('attributevalue_id')->get();
        $size_id=productAttribute::where('product_id',$id)->select('attributevaluesize_id')->get();
        $speci = product_spetification::where('product_id', $id)
        ->select('product_spetification.id as idspe', 'product_spetification.product_id', 'product_spetification.spetification_id', 'product_spetification.content')->get();
        $color = attributevalue::all();
        $product_img = productImage::where('product_id', $id)->get();
        $spe = specification::where('status', 1)->get();
        $productattribute = productAttribute::where('product_id', $id)->get();
        return view('admin.products.edit', compact('product', 'speci', 'category', 'spe', 'protype', 'color', 'size', 'productattribute', 'product_img','color_id','size_id'));
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
        $this->authorize('product-edit');
        $data =  product::find($id);
        if (isset($request->feature_image_path)) {
            $file = $request->feature_image_path;

            $filenamehash = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('feature_image_path')->storeAs('public/productimg/' . Auth::user()->id, $filenamehash);
            unlink($data->image);
            $data->image = $path;
        }
        $data->name = $request->name;
        $data->lower_name = Str::lower($request->name);
        $data->slug = Str::slug($request->name);
        $data->price = $request->price;
        if (isset($request->discount) && isset($request->startdate) && isset($request->enddate)) {
            $old_datestart = explode('/', $request->startdate);
            $new_datastart = $old_datestart[2] . '-' . $old_datestart[0] . '-' . $old_datestart[1];
            $old_dateend = explode('/', $request->enddate);
            $new_dataend = $old_dateend[2] . '-' . $old_dateend[0] . '-' . $old_dateend[1];
            $data->discount = $request->discount;

            $data->startdate = $new_datastart;
            $data->enddate =  $new_dataend;
        }
        $data->category_id = $request->category_id;
        $data->producttype_id = $request->producttype_id;
        $data->content = $request->content;
        $data->status = $request->status;
        $data->save();

        //update attribute sp

        if (isset($request->product_attribute)) {
            foreach ($request->product_attribute as $key => $item) {

                $productattribute = productAttribute::find($item);
                $productattribute->product_id = $data->id;
                $productattribute->import_price = $request->import_price[$key];
                $productattribute->export_price = $request->export_price[$key];
                $productattribute->quantity = $request->quantity[$key];
                $productattribute->save();
            }
            if ($request->hasFile('img')) {
                foreach ($request->image  as $key => $items) {
                    $fileNameHashs = Str::random(10) . '.' . $items->getClientOriginalExtension();
                    $paths = $items->storeAs('public/productimageattribute/' . auth()->id(), $fileNameHashs);
                    $productimage = new productImage();
                    $productimage->product_id = $data->id;
                    $productimage->image = $paths;
                    $productimage->color_id = $request->color_id[$key];
                    $productimage->save();
                    $img = productImage::where('product_id', $id)->where('color_id', $request->color_img[$key])->first();
                    unlink($img->image);
                }
            }
        } else {
            dd($request->all());
            $productattribute = productAttribute::find($id);
            $productattribute->product_id = $data->id;
            $productattribute->import_price = $request->import_price;
            $productattribute->export_price = $request->export_price;
            $productattribute->quantity = $request->quantity;
            $productattribute->save();
        }
        //luu specification
        $product_spes = product_spetification::where('product_id', $id)->get();
        if (!empty($product_spes)) {
            foreach ($product_spes as $item) {
                product_spetification::where('id', $item->id)->delete();
            }
        }
        if (!empty($request->speid)) {
            foreach ($request->speid  as $key => $item) {
                $prospe = new product_spetification();
                $prospe->product_id = $data->id;
                $prospe->spetification_id = $item;
                $prospe->content = $request->specontent[$key];
                $prospe->save();
            }
        }

        return redirect('/admin/product');
    }

    public function updateqty(Request $request,$id)
    {
        $product=productAttribute::find($id);
        $product->quantity=$request->quantity+$product->quantity;
        $product->save();
        return redirect('admin/dashboard/danh-sach');
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
        $this->authorize('product-delete');
        $data = productAttribute::find($id);
        $count = productAttribute::where('product_id', $data->product_id)->where('attributevalue_id', $data->attributevalue_id)->count();
        if ($count == 1) {
            $data->delete();
            productImage::where('color_id', $data->attributevalue_id)->where('product_id', $data->product_id)->delete();
        } else {
            $data->delete();
        }
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ]);
    }
}
