@extends('base')
@section('body')
<div class="grid">
    <div class="col-12">
        <form id="ticketForm" autocomplete="off" onsubmit="return handleFormSubmit({{ $ticket->id }});">
            @include('tickets.partials.form2')
            <div class="text-end">
      
                <button type="button" onclick="editTicket({{ $ticket->id }})" class="mt-2 btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/ticketCreate.js') }}" defer></script>
<script src="{{ asset('js/ticketIndex.js') }}" defer></script>
@endpush
