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
        // $roles = DB::select('select role_id, role_name from role_module');
        // $users = DB::select('select id as user_id, name from users');
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
        //$userData = UserData::latest()
        $id_s = auth()->user()->id;
        $role_id = DB::select('select role_id from work_management where user_id = ?',[$id_s]);
        $access = DB::select('select page from role_map_page where role_id = ?',[$role_id[0]->role_id]);  
        $aaa=[];
        foreach ($access as $p) {
            array_push($aaa,$p->page);
        }
        $let = in_array('add', $aaa);
        
        if($let ==  1){
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
        //$userData = UserData::latest()
        $id_s = auth()->user()->id;
        $role_id = DB::select('select role_id from work_management where user_id = ?',[$id_s]);
        $access = DB::select('select page from role_map_page where role_id = ?',[$role_id[0]->role_id]);  
        $aaa=[];
        foreach ($access as $p) {
            array_push($aaa,$p->page);
        }
        $let = in_array('edit', $aaa);
        
        if($let ==  1){
            $userData = Work_Management::find($id);
            $roles = DB::select('select role_id, role_name from role_module');
            $users = DB::select('select id as user_id, name from users');

            return view('userData.edit',compact('userData','users','roles','id'));
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
        //$userData = UserData::latest()
        $id_s = auth()->user()->id;
        $role_id = DB::select('select role_id from work_management where user_id = ?',[$id_s]);
        $access = DB::select('select page from role_map_page where role_id = ?',[$role_id[0]->role_id]);  
        $aaa=[];
        foreach ($access as $p) {
            array_push($aaa,$p->page);
        }
        $let = in_array('edit', $aaa);
        
        if($let ==  1){

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
        //$userData = UserData::latest()
        $id_s = auth()->user()->id;
        $role_id = DB::select('select role_id from work_management where user_id = ?',[$id_s]);
        $access = DB::select('select page from role_map_page where role_id = ?',[$role_id[0]->role_id]);  
        $aaa=[];
        foreach ($access as $p) {
            array_push($aaa,$p->page);
        }
        $let = in_array('delete', $aaa);
        
        if($let ==  1){
            Work_Management::find($id)->delete();
            return redirect()->route('home')
                        ->with('success','User deleted successfully');
        }
        else{
            return redirect()->route('home')
                        ->withErrors(['msg' => 'Sorry you Donot have access to page']);
            
        }
        
            
        
       
        
    
    }

    public function add()
    {
        //
        //$userData = UserData::latest()
        $id_s = auth()->user()->id;
        $role_id = DB::select('select role_id from work_management where user_id = ?',[$id_s]);
        $access = DB::select('select page from role_map_page where role_id = ?',[$role_id[0]->role_id]);  
        $aaa=[];
        foreach ($access as $p) {
            array_push($aaa,$p->page);
        }
        $let = in_array('add', $aaa);
        
        if($let ==  1){
            $roles = DB::select('select role_id, role_name from role_module');
            $users = DB::select('select id as user_id, name from users');

            return view('userData.create',['roles' => $roles],['users' => $users]);
        }
        else{
            return redirect()->route('home')
                        ->withErrors(['msg' => 'Sorry you Donot have access to page']);
        }
        
    
    }
}
