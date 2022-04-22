@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        <ul id="users">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
<script>
    window.axios.get("/api/users").then((response)=>{
        const usersElement = $("#users")
        const users = response.data
        users.forEach((user,index) =>{
            usersElement.append(`<li id="${user.id}"> ${user.name} </li>`)
        })
    })
</script>
<script>
    Echo.channel('users').listen('UserCreated',(event)=>{
        $("#users")?.append(`<li id="${event.user.id}">${event.user.name}</li>`)
    }).listen('UserUpdated',(event)=>{
        $(`#${event.user.id}`)?.text(event.user.name)
    }).listen('UserDeleted',(event)=>{
        //const element = document.getElementById(event.user.id)
        //element.parentNode.removeChild(element)
        $(`#${event.user.id}`)?.remove();
    })
</script>


@endpush

