@extends('base')

@section('title', 'Registrar Ticket')

@section('body')
<nav class="navbar">
    <div class="navbar-brand"></div>
    <a href="{{ route('indexUser') }}" class="btn btn-primary btn-lg" style="margin-right: 15px;">Inicio</a>
</nav>
<form class="row" id="ticketForm" onsubmit="createTicket();">
    @include('tickets.partials.form')
    <div class="col-12 d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-success btn-lg">Registrar</button>
    </div>
</form>
@endsection

@push('scripts')
<script src="{{ asset('js/ticketCreate.js') }}" defer></script>
@endpush
