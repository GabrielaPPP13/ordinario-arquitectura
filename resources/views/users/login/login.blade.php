@extends('base')
@section('title', 'Inicia sesion')
@section('body')
<nav class="navbar">
    <div class="navbar-brand"></div>
    <a href="{{ route('ticket.ticketIndex') }}" class="btn btn-primary btn-lg" style="margin-right: 15px;">Inicio</a>
</nav>
<div class="grid">
    <div style="height: 100vh;" class="col-12 d-flex align-items-center justify-content-center">
        <div class="card w-25">
            <form id="userForm" onsubmit="login()" class="card-body">
                <h5 class="text-center">Inicia sesion</h5>
                <input class="form-control" name="email" placeholder="Email" />
                <input name="password" class="form-control mt-2" type="password" placeholder="Contraseña" />
                <button type="submit" class="btn btn-primary mt-2 w-100">Iniciar sesion</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/usersIndex.js') }}" defer> </script>
@endpush