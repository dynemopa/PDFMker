@extends('Admin.layout.main')
@section('content')
@foreach($user as $value)
    <form action="{{url('edituser')}}/{{$value->id}}" method="get">
         @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" value="{{$value->email}}">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">name</label>
        <input type="text" class="form-control" name="name" value={{$value->name}} >
        </div>
        
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>
  @endforeach
  @endsection