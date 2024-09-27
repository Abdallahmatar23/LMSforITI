@extends('layouts.layout')
@section('other')

<h3 class="card-title">{{$title}}</h3>

@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


@if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error :</strong>{{Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif


<form @if(empty($subadmindata->id)) action="{{url('admin/adminEdit-admin')}}" @else action="{{url('admin/adminEdit-admin',$subadmindata->id)}}" @endif method="POST" enctype="multipart/form-data"  name="subadminform" id="subadminform" >
    @csrf
        <label for="name">Name*</label>
        <input type="text" class="form-control" value="{{$subadmindata->name ?? ""}}" id="name" name="name" placeholder="Enter Name">
        <br/>

        <label for="email">Email*</label>
        <input style="background-color: #666666" type="email" @if($subadmindata->id !="") disabled="" @else required @endif  class="form-control" value="{{$subadmindata->email ?? ""}}"  id="email" name="email" placeholder="email">
        <br/>

        <label for="mobile">Phone</label>
        <input type="text" class="form-control" value="{{$subadmindata->phone ?? ""}}" id="mobile" name="phone" placeholder="Enter Meta mobile">
        <br/>

        <label for="mobile">City</label>
        <input type="text" class="form-control" value="{{$subadmindata->city ?? ""}}" id="mobile" name="city" placeholder="Enter Meta mobile">
        <br/>

        <label for="password">Password</label>
        <input type="password" class="form-control" value="{{$subadmindata->password ?? ""}}" id="password" name="password" placeholder="Enter Meta Description">
        <br/>

        @if(!empty($subadmindata->image))
        <br/>
        <img src="{{asset('storage/'.$subadmindata->image)}}" class="img-thumbnail" width="200px" height="200px" alt="...">

        <br/>
        <input type="hidden" value="{{$subadmindata->image}}" name="currentadminimage">
        @endif

        <br/>
        <label for="image">Photo</label>
        <input type="file"  class="form-control" id="admin_photo"  name="image">

        <br/>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>



    @endsection
