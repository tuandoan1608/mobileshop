<?php

namespace App\Http\Controllers;

use App\attributevalue;
use App\attributevalue_size;
use App\category;
use App\Components\Recusive;
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
{
    private $product;
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
        $product = product::all();


        return view('admin.products.list', compact('product'));
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
        $color = attributevalue::all();
        $size = attributevalue_size::all();
        $category = $this->getcate();
        $protype = producttype::all();
        $speci = DB::table('specifications')
            ->select('Band', 'Chip')
            ->groupBy('Chip', 'Band')->get();
        return view('admin.products.add', compact('color', 'category', 'protype', 'speci', 'size'));
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
        $data = $this->category->all();

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
            $output = '';
            $out = '';
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
                foreach ($idsize as $keys => $items) {
                    $datasize = attributevalue_size::find($items);

                    $output .=

                        '<tr>
           
                                <td>   <lable>' . $datasize->name . 'GB</lable><input style="   visibility: hidden;" name="size[]" readonly value="' . $datasize->id . '" type="text" class="form-control"></td>
                                <td>  <lable>' . $datacolor->name . 'GB</lable><input  style="   visibility: hidden;" name="color[]" readonly value="' . $datacolor->id . '" type="text" class="form-control"></td>
                                <td>   <input type="number" name="import_price[]" class="form-control"></td>
                                <td>   <input type="number" name="export_price[]" class="form-control"></td>
                                <td>   <input type="number" name="quantity[]" class="form-control"></td>
                         
            
          
                        </tr>  ';
                }
            }
            foreach ($idcolor as $key => $item) {
                $datacolor = attributevalue::find($item);


                $out .=
                    '<table>
                        <tr>
           
                                
                                <td>  <lable>' . $datacolor->name . '</lable><input  style="   visibility: hidden;" name="colorid[]" readonly value="' . $datacolor->id . '" type="text" class="form-control"></td>
                               
                              
                                <td>   <input type="file" name="image[]" class="form-control"></td>
                         
            
          
                        </tr> </table> ';
            }

            return response(['output' => $output, 'out' => $out]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
            if ($request->hasFile('feature_image_path')) {
                $file = $request->feature_image_path;

                $filenamehash = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $request->file('feature_image_path')->storeAs('public/productimg/' . Auth::user()->id, $filenamehash);
            }
            $data = new product();
            $data->name = $request->name;
            $data->slug = Str::slug($request->name);
            $data->price = $request->price;
            $data->discount = $request->discount;
            $data->category_id = $request->category_id;
            $data->producttype_id = $request->producttype_id;
            $data->content = $request->content;
            $data->image = $path;
            $data->save();

            //luu specification
            $specification = new specification();
            $specification->product_id = $data->id;
            $specification->Display = $request->display;
            $specification->Operating = $request->operating;
            $specification->Memory = $request->memory;
            $specification->Chip = $request->chip;
            $specification->Ram = $request->ram;
            $specification->Sim = $request->sim;
            $specification->Battery = $request->battery;
            $specification->Camera_front = $request->camera_front;
            $specification->Camera_rear = $request->camera_rear;
            $specification->Design = $request->design;
            $specification->Mass = $request->mass;
            $specification->Wifi = $request->wifi;
            $specification->Security = $request->security;
            $specification->Band = $request->band;
            $specification->save();

            foreach ($request->size as $key => $item) {
                $productattribute = new productAttribute();
                $productattribute->product_id = $data->id;
                $productattribute->attributevaluesize_id = $item;
                $productattribute->attributevalue_id = $request->color[$key];
                $productattribute->import_price = $request->import_price[$key];
                $productattribute->export_price = $request->export_price[$key];
                $productattribute->quantity = $request->quantity[$key];
                $productattribute->save();
            }
            foreach ($request->image  as $key => $items) {


                $fileNameHashs = Str::random(10) . '.' . $items->getClientOriginalExtension();
                $paths = $items->storeAs('public/productimageattribute/' . auth()->id(), $fileNameHashs);
                $productimage = new productImage();
                $productimage->product_id = $data->id;
                $productimage->image = $paths;

                $productimage->color_id = $request->colorid[$key];
                $productimage->save();
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
        $product = product::find($id);
        $category = category::all();
        $protype = producttype::all();

        $speci = specification::where('product_id', $id);
        $product_attribute = productAttribute::where('product_id', $id)->get();
        $color = attributevalue::all();
        return view('admin.products.edit', compact('product', 'product_attribute', 'speci', 'category', 'protype', 'color'));
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
        $data = new product();
        if ($request->hasFile('feature_image_path')) {
            $file = $request->feature_image_path;
            Storage::delete($data->image);
            $filenamehash = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('feature_image_path')->storeAs('public/productimg/' . Auth::user()->id, $filenamehash);
            $data->image = $path;
        } else {
            $data->name = $request->name;
            $data->slug = Str::slug($request->name);
            $data->price = $request->price;
            $data->discount = $request->discount;
            $data->category_id = $request->category_id;
            $data->producttype_id = $request->producttype_id;
            $data->content = $request->content;
            $data->update();
        }



        //update specification
        $specification = new specification();
        $specification->product_id = $data->id;
        $specification->Display = $request->display;
        $specification->Operating = $request->operating;
        $specification->Memory = $request->memory;
        $specification->Chip = $request->chip;
        $specification->Ram = $request->ram;
        $specification->Sim = $request->sim;
        $specification->Battery = $request->battery;
        $specification->Camera_front = $request->camera_front;
        $specification->Camera_rear = $request->camera_rear;
        $specification->Design = $request->design;
        $specification->Mass = $request->mass;
        $specification->Wifi = $request->wifi;
        $specification->Security = $request->security;
        $specification->Band = $request->band;
        $specification->update();

        foreach ($request->astributevalue_id as $key => $item) {
            $productattribute = new productAttribute();
            $productattribute->product_id = $data->id;
            $productattribute->attributevalue_id = $item;
            $productattribute->import_price = $request->import_price[$key];
            $productattribute->export_price = $request->export_price[$key];
            $productattribute->quantity = $request->quantity[$key];
            $productattribute->save();

            $image = 'image' . $key;
            if (!empty($image)) {
                foreach ($request->$image  as $items) {


                    $fileNameHashs = Str::random(10) . '.' . $items->getClientOriginalExtension();
                    $paths = $items->storeAs('public/productimageattribute/' . auth()->id(), $fileNameHashs);
                    $productimage = new productImage();
                    $productimage->productattribute_id = $productattribute->id;
                    $productimage->image = $paths;
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
        $data = productAttribute::find($id);
        $data->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ]);
    }
}
