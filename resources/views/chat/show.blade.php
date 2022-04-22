@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Chat') }}</div>

                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12 border rounded-lg p-3">
                                        <ul id="messages" class="list-unstyled overflow-auto" style="height: 45vh">
                                            <li>Test1: Helo</li>
                                            <li>Test2: Helo there</li>
                                        </ul>
                                    </div>
                                </div>
                                <form>
                                    <div class="row py-3">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="message">
                                        </div>
                                        <div class="col-2">
                                            <button id="send" type="submit" class="btn btn-primary btn-block ">Send</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="col-2">
                                <p><strong>Online Now</strong></p>
                                <ul id="users" class="list-unstyled overflow-auto text-info" style="height: 45vh">
                                    {{--<li>Test1</li>
                                    <li>Test2</li>--}}
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script>
        const usersElement = $("#users")

        Echo.join('asd')
        .here((users)=>{
            console.log('here: ',users)
            users.forEach((user,index) =>{
                usersElement.append(`<li id="${user.id}"> ${user.name} </li>`)
            })
        })
        .joining((user)=>{
            usersElement.append(`<li id="${user.id}"> ${user.name} </li>`)
        })
        .leaving((user)=>{
            $(`#${user.id}`)?.remove();
        })

    </script>
@endpush
