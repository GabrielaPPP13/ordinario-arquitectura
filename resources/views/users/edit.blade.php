@extends('base')
@section('body')
<div class="grid">
    <div class="col-12">
        <form action="" id="userForm" autocomplete="off" onsubmit="editUser({{ $user->id }})">
            @include('users.partials.form')
            <div class="text-end">
                <button type="submit" class="mt-2 btn btn-primary">Guardar</button>
                {{-- <button onclick="editUser({{ $user->id }})" class="mt-2 btn btn-primary">Guardar</button> --}}

            </div>
        </form>
    </div>
</div>
@endsection