@extends('Admin.layout.main')
@section('content')
   
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th scope="col">Title</th>
                <th scope="col">Title Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all as $value)
            <?php
            if(count($value->PDF_Draft)==0)
            {
               ?>
               <tr>
                <th  colspan="3"><center>NO Rrcord found</center></th>
               </tr>
               <?php
            }
            else
            {
            ?>
            @foreach ($value->PDF_Draft as $item)
            <tr>
               
                <td>{{ $item->title }}</td>
                <td> <img src="{{ asset('uploads/image/' . $item->titlepageimage) }}" width="70px" height="70px"></td>
                <td>
                    <a class="btn btn-primary" href="{{ url('showpdf/') }}/{{ $item->id }}" role="button">SHOW PDF</a>
                </td>
            </tr>
        @endforeach
            <?php   
            }
            ?>
        @endforeach
           
        </tbody>
    </table>
@endsection
