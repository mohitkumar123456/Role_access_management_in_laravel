@extends('layouts.app')
   
   @section('content')
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 ">
                            <div class="pull-left">
                                <h2>Edit User</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('roleData.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('roleData.update',$roleData->id) }}" method="POST">
                        {{ csrf_field() }}
                        
                            <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <strong>Role ID:</strong>
                                        <!-- <input type="text" name="role_id" class="form-control" placeholder="role id"> -->
                                        <select name="role_id" id="role_id" class="form-control">
                                            @foreach ($roles as $role)
                                                @if ( $role->role_id ==$roleData->role_id)
                                                    <option value=" {{ $role->role_id }}" selected> {{ $role->role_name }}</option>
                                                @endif
                                                <option value=" {{ $role->role_id }}"> {{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>Page:</strong>
                                    <input type="text" name="page" value="{{ $roleData->page }}" class="form-control" placeholder="page">
                                </div>
                            </div>
                            
                            <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>


       
   @endsection 