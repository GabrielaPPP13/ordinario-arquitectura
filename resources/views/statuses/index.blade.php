@extends('base')
@section('title', 'Status')
@section('body')

<div class="grid" style="margin: 20px;">
    @include('sidebar')

    <div class="col-9" style="margin-left: 220px;"> 
        <div class="col-12">
            <h5>Estatus</h5>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" onclick="createStatusModal()">Agregar</button>
        </div>
        <div class="col-12">
            <table class="table" id="statusesTable">
                <thead>
                    <tr>
                        <th>Estatus</th>
                        <th></th>
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
<script src="{{ asset('js/statusIndex.js') }}" defer></script>
<script src="{{ asset('js/statusCreateUpdate.js') }}" defer></script>
@endpush
