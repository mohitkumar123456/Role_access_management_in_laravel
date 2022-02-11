<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\RoleMapPage;

class RoleMapPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$userData = UserData::latest()
        $users = DB::select('select map.id, role_module.role_name, map.page, map.created_at, map.updated_at from role_map_page as map left join role_module on role_module.role_id=map.role_id');
        return view('roleData.index', ['role_map' => $users]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roleData.create');
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
            $request->validate([
                'role_id' => 'required',
                'page' => 'required',
                
            ]);
    
            RoleMapPage::create($request->all());
    
            return redirect()->route('roleData.index')
                            ->with('success','Role access created successfully.');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     $userData = Work_Management::find($id);
    //     return view('userData.show',compact('userData','id'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roleData = RoleMapPage::find($id);
        $roles = DB::select('select role_id, role_name from role_module');
        return view('roleData.edit',compact('roleData','roles','id'));
        
        
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
            $roleData = RoleMapPage::find($id);
            $roleData->role_id = request('role_id');
            $roleData->page = request('page');
            $roleData->save();
                    $request->validate([
                        'role_id' => 'required',
                        'page' => 'required',
                        
            ]);
            $roleData->update($request->all());
    
            return redirect()->route('roleData.index')
                            ->with('success','User updated successfully');
        
        
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
        RoleMapPage::find($id)->delete();
            return redirect()->route('roleData.index')
                        ->with('success','User deleted successfully');
        
    }

    public function add()
    {   
        $roles = DB::select('select role_id, role_name from role_module');
        return view('roleData.create',['roles' => $roles]);
    
    }
}
