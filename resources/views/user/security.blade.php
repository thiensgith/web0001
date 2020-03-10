@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card outer-card">
            <div class="card-header h5 text-dark">Security</div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card my-4">
            <div class="card-body">
                <router-view name="security"></router-view>
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
@endsection
