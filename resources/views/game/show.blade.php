@extends('layouts.app')

@push('styles')
<style type="text/css">
    @keyframes rotate {
        from{
            transform: rotate(0deg);
        }
        to{
            transform: rotate(360deg);
        }
    }
    .refresh{
        animation: rotate 1.5s linear infinite;
        animation-fill-mode: forwards;
    }

</style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Game') }}</div>

                    <div class="card-body">
                        <div class="text-center">
                            <img id="circle" class="refresh" height="250px" width="250px" src="{{asset('images/circle.png')}}"/>
                            <p id="winner" class="display-1 d-none text-primary"></p>
                        </div>
                        <hr>
                        <div class="text-center">
                            <label class="font-weight-bold h5">Your bet</label>
                            <select id="bet" class="custom-select col-auto">
                                <option selected> Not in</option>
                                @foreach(range(1,12) as $number)
                                    <option>{{$number}}</option>
                                @endforeach
                            </select>
                            <hr>
                            <p class="font-weight-bold h5 ">Remaining time</p>
                            <p id="timer" class="h5 text-danger">Waiting to start</p>
                            <hr>
                            <p id="result" class="h1"></p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
<script>
    let bet = $("#bet");
    let circle = $("#circle");
    let timer = $("#timer");
    let winner = $("#winner");
    let result = $("#result");

    Echo.channel('game')
        .listen("RemainingTimeChanged",(event)=>{

            timer.text(event.time)
            circle.addClass("refresh")
            winner.addClass("d-none")
            result.text('')
            result.removeClass("text-success");
            result.removeClass("text-danger");

        }).listen("WinnerNumberGenerated",(event)=>{
            circle.removeClass("refresh")
            winner.text(event.number)
            winner.removeClass("d-none")

            let betSelected = bet.children("option").filter(":selected").text();
            if(betSelected === winner){
                result.text("You  WIN")
                result.addClass("text-success")
            }
            else{
                result.text("You  LOSE")
                result.addClass("text-danger")
            }
        })
</script>


@endpush

