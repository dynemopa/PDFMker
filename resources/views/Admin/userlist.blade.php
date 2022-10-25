@extends('Admin.layout.main')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="container-fluid" style="margin-top: 10%">
            <div class="row">
                <div class="col">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table align-items-center table-dark table-flush">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">name</th>
                                            <th scope="col">email</th>
                                            <th  scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <tr>
                                            @foreach ($user as $value)
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>
                                                    <a href="{{url('seepdf/')}}/{{$value->id}}"  class="text-white">
                                                        <i class="fa fa-eye"></i>
                                                      </a>&nbsp;&nbsp;
                                                      <a href="{{url('useredit/')}}/{{$value->id}}"  class="text-white">
                                                        <i class="fa fa-edit"></i>
                                                    </a>&nbsp;&nbsp;
                                                    <a href="{{url('delete/')}}/{{$value->id}}"  class="text-white">
                                                        <i class="fa fa-trash"></i>
                                                    </a>&nbsp;&nbsp;
                                                   
                                                   
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 @endsection
