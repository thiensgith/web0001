@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header h5 bg-dark text-light"><a class="btn btn-light text-dark btn-sm mr-2" href="#" onclick="openNav()"><i class="fas fa-bars"></i></a>Plants</div>

                <div class="card-body table-responsive text-center">
                        <router-view name="plantsIndex"></router-view>
                        <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection