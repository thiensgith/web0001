@extends('layouts.web')

@section('style')
<style>
    h1{
      font-size: 4rem;  
    }
    .card{
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
                    <div class="card-tille">CATEGORIES</div>
                </div>
                <div class="card-body row p-0">
                    @foreach ($data as $index=>$item)
                    <a href="{{route('home')."/".$item->category_slug}}" class="card col-md-6 text-center 
                        @if($index % 2 == 0)
                            border-right
                        @endif
                        @if(sizeof($data) % 2 == 0)
                            @if(!((sizeof($data) == $index+1) ||  (sizeof($data)-1 == $index+1) ))
                            border-bottom
                            @endif
                        @elseif(!(sizeof($data) == $index+1))
                            border-bottom
                        @endif">
                        <div class="card-body">
                        {{$item->category_name}}
                        </div>
                    </a> 
                    @endforeach
                    
                </div>
            </div>
        </div>
</div>
@endsection