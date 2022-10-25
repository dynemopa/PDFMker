
@extends('Admin.layout.main')
@section('content')


<div class="main">
        <div class="container-fluid" style="width: 100%" >
            <div class="row" style="margin-right: 40px;margin-left: -44px;">

                <div class=" col-md-3">
                    <div class="card " style="width:400px; ">
                        <div class="card-body bg-danger text-white m-4 ">
                        <h4 class="card-title">Totel User</h4>
                        <h1 class="card-text text-black">{{$user}}</h1>
                        <a href="" class="btn btn-primary">See All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class=" col-md-3">
                    <div class="card " style="width:400px;  ">
                        <div class="card-body bg-info text-white  m-4" >
                        <h4 class="card-title">Totel PDF</h4>
                        <h1 class="card-text text-black">{{$PDF_Draft}}</h1>
                        <a href="" class="btn btn-primary">See All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

@endsection