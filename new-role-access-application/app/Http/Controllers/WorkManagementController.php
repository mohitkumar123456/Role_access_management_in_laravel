<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Work_Management;

class WorkManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$userData = UserData::latest()
        $users = DB::select('select work.id, work.title, work.description, usa.name, role.role_name, work.status, work.created_at, work.updated_at from work_management as work left join users as usa on usa.id = work.user_id left join role_module as role on role.role_id=work.role_id;');
        return view('home', ['todos' => $users]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('userData.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //
        $id_s = auth()->user()->id;
        $data = DB::select('select role_id from work_management where user_id = ?',[$id_s]);  
        if($data[0]->role_id < 3){
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'user_id' => 'required',
                'role_id' => 'required',
                'status' => 'required',
            ]);
    
            Work_Management::create($request->all());
    
            return redirect()->route('home')
                            ->with('success','User created successfully.');
        }
        else{
            return redirect()->route('home')
                        ->withErrors(['msg' => 'Sorry you Donot have access to page']);
        }
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
        $userData = Work_Management::find($id);
        return view('userData.show',compact('userData','id'));
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
        $id_s = auth()->user()->id;
        $data = DB::select('select role_id from work_management where user_id = ?',[$id_s]);  
        $userData = Work_Management::find($id);
        if($data[0]->role_id < 3){
            //$userData = DB::select('select work.id as id, work.title, work.description, work.user_id,usa.name, role.role_name,work.role_id, work.status, work.created_at, work.updated_at from work_management as work left join users as usa on usa.id = work.user_id left join role_module as role on role.role_id=work.role_id where work.id=?', [$id]);
            return view('userData.edit',compact('userData','id'));
        }
        else{
            return redirect()->route('home')
                        ->withErrors(['msg' => 'Sorry you Donot have access to page']);
            
        }
        
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
        $id_s = auth()->user()->id;
        $data = DB::select('select role_id from work_management where user_id = ?',[$id_s]);  
        if($data[0]->role_id < 2){
            //
            $userData = Work_Management::find($id);
            $userData->title = request('title');
            $userData->description = request('description');
            $userData->user_id = request('user_id');
            $userData->role_id = request('role_id');
            $userData->status = request('status');
            
            $userData->save();
                    $request->validate([
                        'title' => 'required',
                        'description' => 'required',
                        'user_id' => 'required',
                        'role_id' => 'required',
                        'status' => 'required',
            ]);
            $userData->update($request->all());
    
            return redirect()->route('home')
                            ->with('success','User updated successfully');
        }
        else{
            return redirect()->route('home')
                        ->withErrors(['msg' => 'Sorry you Donot have access to page']);
            
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
        $id_s = auth()->user()->id;
        $data = DB::select('select role_id from work_management where user_id = ?',[$id_s]);  
        if($data[0]->role_id < 2){
            Work_Management::find($id)->delete();
            return redirect()->route('home')
                        ->with('success','User deleted successfully');
        }
        else{
            return redirect()->route('home')
                        ->withErrors(['msg' => 'Only super admin can delete this data']);
        }
        
    
    }

    public function add()
    {
        //
        
  
        return view('userData.create');
    
    }
}
