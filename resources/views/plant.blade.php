@extends('layouts.web')



@section('content')
<div class="container-fluid pt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                <div class="col-md-6 p-lg-5 my-5">
                    <h1 class="display-4 font-weight-normal">{{$data->plant_name}}</h1>
                    <p class="lead font-weight-normal">Description of plant</p>
                <a class="btn btn-outline-secondary" href="{{ route('home')}}">Coming soon</a>
                </div>
                <div class="col-md-6 p-lg-5 my-5">
                    <img class="rounded img-fluid img-thumbnail"src="{{asset('storage/lg_'.$data->plant_image)}}" alt="Plant Image">
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection