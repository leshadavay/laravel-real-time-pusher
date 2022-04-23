@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center mb-4">{{ __('Welcome to Real Time Apps!') }}</h3>
            <h6 class="text-center mb-3">Enjoy websocket based applications below</h6>
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6 p-5">
                            <div class="card ">
                                <div class="card-header text-center text-capitalize">the bet game</div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="/game" class="d-flex justify-content-center">
                                            <img class="w-75" src="{{asset('images/game.JPG')}}"  />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-5">
                            <div class="card ">
                                <div class="card-header text-center text-capitalize">chat application</div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="/game" class="d-flex justify-content-center">
                                            <img class="w-75" src="{{asset('images/chat.JPG')}}"  />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
