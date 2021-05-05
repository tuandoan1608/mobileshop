<?php

namespace App\Http\Controllers;

use App\permission;
use App\permission_roles;
use App\roles;
use Illuminate\Http\Request;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=roles::all();
        return view('admin.roles.list',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission=permission::where('parent_id',0)->get();
        return view('admin.roles.add',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $role=new roles();
        $role->name=$request->name;
        $role->display_name=$request->displayname;
        $role->save();
        $role->permissions()->attach($request->permission_id);
        return redirect('/admin/roles');
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
        $role=roles::find($id);
        $permission=permission::where('parent_id',0)->get();
        $permissionid=permission_roles::where('role_id',$role->id)->select('permission_id','id')->get();
        
        return view('admin.roles.edit',compact('permission','role','permissionid'));
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
        $role=roles::find($id);
        $role->name=$request->name;
        $role->display_name=$request->displayname;
        $role->save();
        
        $role->permissions()->sync($request->permission_id);
        return redirect('/admin/roles');
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
}
