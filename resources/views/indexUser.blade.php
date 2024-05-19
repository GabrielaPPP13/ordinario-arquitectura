@extends('base')

@section('title', 'Inicio')

@section('body')

@endsection
<nav class="navbar">
    <div class="navbar-brand"></div>
    <a href="{{ route('login') }}" class="admin-button">Administración</a>
</nav>
<div class="container">
    <form class="ticket-form">
        <div class="form-group">
            <label for="curp">CURP</label>
            <input id="curp" class="form-control" name="curp" placeholder="CURP" />
        </div>
        <div class="form-group">
            <label for="ticket">Folio</label>
            <input id="folio" name="ticket" class="form-control mt-2" placeholder="Folio del ticket" />
        </div>
        <button type="submit" class="view-ticket-button" onclick="searchTicket()">Buscar Ticket</button>
        <a href="{{ route('tickets.create') }}" class="register-ticket-button">Registrar Ticket</a>
        
    </form>
</div>
@push('scripts')
@endpush

<style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    height: 100vh;
}

.navbar {
    background-color: #333;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
}

.navbar-brand {
    font-size: 1.5rem;
    color: white;
}

.admin-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
    font-size: 1rem;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    text-decoration: none ;
    margin-right: 1%;
}

.admin-button:hover {
    background-color: #0056b3;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-grow: 1;
}

.ticket-form {
    background-color: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
}

.view-ticket-button, .register-ticket-button {
    width: 100%;
    padding: 0.75rem;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 0.5rem;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.view-ticket-button {
    background-color: #28a745;
    color: white;
}

.view-ticket-button:hover {
    background-color: #218838;
}

.register-ticket-button {
    background-color: #ffc107;
    color: white;
}

.register-ticket-button:hover {
    background-color: #e0a800;
}

</style>

@push('scripts')
<script src="{{ asset('js/ticketCreate.js') }}" defer></script>
@endpush