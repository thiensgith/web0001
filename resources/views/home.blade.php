@extends('layouts.web')

@section('style')
<style>
    

    #bg {
    background-position: center top;
    }

    #title-container {
    position: relative;
    }

    #title-bg {
    /* Absolutely position it, but stretch it to all four corners, then put it just behind #title's z-index */
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    z-index: 99;
    /* Pull the background 70px higher to the same place as #bg's */
    background-position: center -70px;

    -webkit-filter: blur(10px);
    filter: url('/media/blur.svg#blur');
    filter: blur(10px);
    }

    #title {
    /* Put this on top of the blurred layer */
    position: relative;
    z-index: 100;
    padding: 20px;
    background: rgb(34,34,34); /* for IE */
    background: rgba(34,34,34,0.75);
    }

    @media (max-width: 600px ) {
    #bg { padding: 10px; }
    #title-bg { background-position: center -10px; }
    }

    #title h1, #title h5, #title h5 a,p { text-align: center; color: #fefefe; font-weight: normal; }
</style>
    
@endsection

@section('content')
<div class="container-fluid pt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div id="bg">
                    <div id="title-container">
                        {{-- <div id="title-bg"></div> --}}
                        <div id="title">
                        <h1 class="mt-5">Love plants ?</h2>
                        <h1 class="mb-5">You are in love with life !</h2>
                        <div class="row p-2 text-center">
                            @foreach ([
                                [
                                'title' => 'Species diversity',
                                'content' => 'More than 500,000 species of plants, including seedlings, moss, ferns and nearby ferns are currently present',
                                ],
                                [
                                'title' => 'Importance',
                                'content' => 'Photosynthesis provides oxygen for life, the starting source of food for all living things'
                                ],
                                [
                                'title' => 'Range',
                                'content' => 'Plants are everywhere on earth, sometimes they can live in the harshest places'
                                ]
                            ] as $item)
                            <div class="card border-light bg-transparent m-4 col-md col-sm-12">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item['title']}}</h5>
                                        <p class="card-text">{{$item['content']}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h5 class="mt-5"><a href="#">Discover »</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection