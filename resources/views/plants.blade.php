@extends('layouts.web')

@section('style')
<style>
    h1{
      font-size: 4rem;  
    }
    .card, img.plant_img{
        border-radius: 20px;
        overflow: hidden;
    }
    a.card , a#discover
    {
        border: 0;
        border-radius: 0;
        color: #000000;
        text-decoration: none;
        font-weight: bold;
    }
    .card-header{
        color: #000000;
        background: #ffffff;
    }
    a.card:hover
    {
        color: #b3ffb3;
        background: #5D8A4B;
        transition: 0.3s;
    }
    .fa-shopping-basket, .fa-lightbulb, .fa-info-circle{
        font-size: 3.5rem;
    }
</style>
    
@endsection

@section('content')
<div class="container-fluid pt-4">
        <div class="row justify-content-center">
            <div class="card col-md-10 p-0">
                <div class="card-header text-center">
                    <div class="card-tille">PLANTS</div>
                </div>
                <div class="card-body row p-0">
                    @if ($data->isNotEmpty())
                    @foreach ($data as $index=>$item)
                    <a href="{{url()->current()."/".$item->plant_slug}}" class="card col-md-6 text-center 
                        @if( ($index+1) % 2 != 0)
                        border-right
                        @endif
                        ">
                        <div class="card-body">
                            <img class="align-self-center plant_img" height="128" width="128" src="{{asset('storage/sm_'.$item->plant_image)}}" alt="{{$item->plant_slug}}">
                            <h5 class="card-title my-2">{{$item->plant_name}}</h5>
                            
                        </div>
                    </a> 
                    @endforeach
                    @else
                    <div class="col-12 text-center" role="Nodata">
                        <h4 class="alert-heading my-2">No data</h4>
                        <a href="{{route('home')}}" class="btn btn-outline-primary btn-md my-2" role="button" aria-pressed="true"><i class="fas fa-chevron-left"></i> Go homepage</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
</div>
@endsection