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
                                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
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
                    
                    <form action="{{ route('userData.update',$userData->id) }}" method="POST">
                        {{ csrf_field() }}
                        
                            <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    <input type="text" name="title" value="{{ $userData->title }}" class="form-control" placeholder="title">
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <input type="text" name="description" value="{{ $userData->description }}" class="form-control" placeholder="description">
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>User ID:</strong>
                                    <input type="text" name="user_id" value="{{ $userData->user_id }}" class="form-control" placeholder="User ID">
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>Role ID:</strong>
                                    <input type="text" name="role_id" value="{{ $userData->role_id }}" class="form-control" placeholder="role id">
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <strong>Status:</strong>
                                    <input type="text" name="status" value="{{ $userData->status }}" class="form-control" placeholder="status">
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