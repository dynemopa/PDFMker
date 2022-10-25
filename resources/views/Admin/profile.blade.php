@extends('Admin.layout.main')
@section('content')
    <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="row">
                    <div col-md-4></div>
                    <div col-md-8>
                        <div class="form-outline mb-4">
                            <input type="hidden" name="name" id="name" class="form-control"
                                value="{{ $all->id }}" />
                            <label class="form-label" for="form2Example1">Name</label>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $all->name }}" />
                            <label class="form-label" for="form2Example1">Name</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $all->email }}" />
                            <label class="form-label" for="form2Example2">Email</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update profile</button>
        </div>
    </form>
@endsection
