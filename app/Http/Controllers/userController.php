<?php

namespace App\Http\Controllers;

use App\roles;
use App\roles_id;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    public function __construct(User $user)
    {
        $this->user=$user;
    }
    public function index()
    {
        $this->authorize('accout-list');
        $data=User::all();
        return view('admin.members.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('accout-add');
        $role=roles::all();
        return view('admin.members.add',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('accout-add');
            $user=$this->user->create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone'=>$request->phone,
            'address'=>$request->address,

        ]);
       
        $user->roles()->attach($request->role);
       return redirect('/admin/user');
        
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
        $this->authorize('accout-edit');
        $user=User::find($id);
        $role=roles::all();
        $userrole=$user->roles;
      
       return view('admin.members.edit',compact('user','role','userrole'));

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
        $this->authorize('accout-edit');
        try{
            
            DB::beginTransaction();
            $data=[
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                
                'phone'=>$request->phone,
                'address'=>$request->address,
            ];
            if(isset($request->password)){
                $data['password']=bcrypt($request->password);
            }
            $this->user->find($id)->update($data);
            $user=$this->user->find($id);
            $user->roles()->sync($request->role);
            DB::commit();
            return redirect('/admin/user');
        }catch(\Exception $exception){
            DB::rollBack();
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
        $this->authorize('accout-delete');
    }
}
