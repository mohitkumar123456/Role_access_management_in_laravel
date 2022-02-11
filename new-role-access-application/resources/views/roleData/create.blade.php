@extends('layouts.app')
  
  @section('content')
  <div class="container">
  <div class="row">
     <div class="col-xs-2 col-sm-2 col-md-2"></div>
      <div class="col-xs-8 col-sm-8 col-md-8">
          <div class="pull-left">
              <h2>Assign Role to Page</h2>
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
          <form action="{{ route('roleData.create') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Role ID:</strong>
                            <!-- <input type="text" name="role_id" class="form-control" placeholder="role id"> -->
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach ($roles as $role)
                                    <option value=" {{ $role->role_id }}"> {{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Page:</strong>
                        <input type="text" name="page" class="form-control" placeholder="page">
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