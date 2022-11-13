@extends('layouts.master')
 
@section('content')
<div class="container col-md-11">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>Gas Cylinder Admins</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admins.create') }}"> Create New admin</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Devices</th>
            <th>Location</th>
            <th>Device_Number</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->phone }}</td>
            <td>{{ $admin->device }}</td>
            <td>{{ $admin->location }}</td>
            <td>{{ $admin->dev_info }}</td>
 
            <td>
                <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('admins.show',$admin->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('admins.edit',$admin->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  </div>
    {!! $admins->links() !!}
      
@endsection