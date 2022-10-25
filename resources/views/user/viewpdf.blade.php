@extends('layouts.header')
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Title Image</th>
                                        <th scope="col">Totle Rain</th>
                                        <th scope="col">Totle MUD</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($PDF_Draft as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td> <img src="{{ asset('uploads/image/' . $value->titlepageimage) }}"
                                                    width="70px" height="70px"></td>
                                            <td>{{ $value->totelrain }}</td>
                                            <td>{{ $value->totelmud }}</td>
                                            <td>
                                                <a href="{{ url('showpdf/') }}/{{ $value->id }}" class="text-white">
                                                    <i class="fa fa-eye"></i>
                                                </a>&nbsp;&nbsp;
                                                <a href="{{ url('editpdf/') }}/{{ $value->id }}" class="text-white">
                                                    <i class="fa fa-edit"></i>
                                                </a>&nbsp;&nbsp;
                                                <a href="{{ url('deletepdf/') }}/{{ $value->id }}" class="text-white">
                                                    <i class="fa fa-trash"></i>
                                                </a>&nbsp;&nbsp;
                                                <a href="{{ url('download/') }}/{{ $value->id }}" class="text-white">
                                                    <i class="fa fa-download"></i>
                                                </a>
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
