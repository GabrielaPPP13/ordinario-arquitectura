@extends('base')
@section('title', 'Responsable')
@section('body')

<div class="grid" style="margin: 20px;">
    @include('sidebar')

    <div class="col-9" style="margin-left: 220px;"> 
        <div class="col-12">
            <h5>Responsable</h5>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" onclick="createResponsableModal()">Agregar</button>
        </div>
        <div class="col-12">
            <table class="table" id="responsablesTable">
                <thead>
                    <tr>
                        <th>Municipio</th>
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
<script src="{{ asset('js/responsableIndex.js') }}" defer></script>
<script src="{{ asset('js/responsableCreateUpdate.js') }}" defer></script>
@endpush
