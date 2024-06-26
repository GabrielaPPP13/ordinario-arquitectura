@extends('base')
@section('title', 'Tickets')
@section('body')
<div class="grid" style="margin: 20px;">
    @include('sidebar')

    <div class="col-9" style="margin-left: 220px;">
        <div class="col-12">
            <h5>Tickets</h5>
        </div>
        <div class="col-12">
            {{-- <button class="btn btn-primary" onclick="createTicketModal()">Agregar</button> --}}
          
            {{-- <a href="{{ route('tickets.create') }}" target="blank" class="btn btn-primary">Registrar ticket</a>  --}}
            

            <div id="ticketModal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="col-12">
                            <iframe id="ticketFrame" name="ticketFrame" src="{{ route('tickets.create') }}" style="width: 100%; height: 700px; border: none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" onclick="openTicketModal()">Agregar</button>

        </div>
        <div class="col-12">
            <table class="table" id="ticketsTable">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>CURP</th>
                        <th>Name</th>
                        <th>Last name</th>
                        <th>Second last name</th>
                        <th>City</th>
                        <th>Education level</th>
                        <th>Email</th>
                        <th>Phone 1</th>
                        <th>Phone 2</th>
                        <th>Status</th>
                        <th>Responsable</th>
                        <th>Subject</th>
                        <th>Date</th> <!-- Nueva columna de fecha -->
                        <th>Time</th> <!-- Nueva columna de hora -->
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/ticketCreate.js') }}" defer></script>
<script src="{{ asset('js/ticketIndex.js') }}" defer></script>
@endpush
