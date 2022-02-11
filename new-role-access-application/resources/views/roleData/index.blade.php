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
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
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

                    
                </div>
                <div class="card-body">
                    <a href="{{ route('roleData.create') }}" class="btn btn-success">Add</a>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Page</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        

                        <tbody>
                        @foreach ($role_map as $user)
                        <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->role_name }}</td>
                        <td>{{ $user->page }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><a href="{{ route('roleData.edit',$user->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a><br><a href="{{ route('roleData.destroy',$user->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
