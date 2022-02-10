@extends('layouts.app')
  
  @section('content')
  <div class="container">
  <div class="row">
     <div class="col-xs-2 col-sm-2 col-md-2"></div>
      <div class="col-xs-8 col-sm-8 col-md-8">
          <div class="pull-left">
              <h2>Add New User</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
          </div>
      </div>
      <div class="col-xs-2 col-sm-2 col-md-2"></div>
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
  <div class="container">
      <div class="row">
      <div class="col-xs-2 col-sm-2 col-md-2">
        </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
          <form action="{{ route('userData.create') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="title">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="Description">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>User ID:</strong>
                            <input type="text" name="user_id" class="form-control" placeholder="user id">
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Role ID:</strong>
                            <input type="text" name="role_id" class="form-control" placeholder="role id">
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Status:</strong>
                            <input type="text" name="status" class="form-control" placeholder="status">
                            </div>
                    </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
        </form>   
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6"></div>
      </div>

  </div> 
  
  @endsection  