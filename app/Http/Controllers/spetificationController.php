<?php

namespace App\Http\Controllers;

use App\specification;
use Illuminate\Http\Request;

class spetificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spe = specification::all();
        return view('admin.specification.list', compact('spe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spe = specification::all();
        return view('admin.specification.add', compact('spe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        foreach ($request->name as $key => $item) {
            $spe = new specification();
            $spe->name = $item;
            $spe->default = $request->default[$key];
            $spe->status = $request->status[$key];
            $spe->save();
        }

        return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = specification::find($id);
        $cout = $data->getspes;
        if (!empty($cout)) {
            return response()->json([
                'code' => 500,
                'messages' => 'Có loại sản phẩm thuộc danh mục nên không thể xóa.'
            ]);
        } else {
            $data->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        }
    }
}
