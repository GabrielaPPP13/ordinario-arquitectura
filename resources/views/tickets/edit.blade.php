@extends('base')
@section('title', 'Registrar Ticket')
@section('body')
<nav class="navbar">
    <div class="navbar-brand"></div>
    <a href="{{ route('ticket.ticketIndex') }}" class="btn btn-primary btn-lg" style="margin-right: 15px;">Inicio</a>
</nav>
<form class="row" id="ticketForm" onsubmit="editTicket();">

    @include('tickets.partials.form2')
    <div class="col-12 d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-success  btn-lg">Guardar Edición</button>
        <button type="submit" class="btn btn-danger btn-lg">Eliminar</button>
    </div>
</form>


@endsection
@push('scripts')
<script src="{{ asset('js/ticketCreate.js') }}" defer></script>
@endpush