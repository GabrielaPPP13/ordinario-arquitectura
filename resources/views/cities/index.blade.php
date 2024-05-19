@extends('base')
@section('title', 'Municipios')
@section('body')

<div class="grid" style="margin: 20px;">
    @include('sidebar')

    <div class="col-9" style="margin-left: 220px;"> <!-- Ajusta el margen izquierdo para que coincida con el ancho del sidebar -->
        <div class="col-12">
            <h5>Municipios</h5>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" onclick="createCityModal()">Agregar</button>
        </div>
        <div class="col-12">
            <table class="table" id="citiesTable">
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
<script src="{{ asset('js/cityIndex.js') }}" defer></script>
<script src="{{ asset('js/cityCreateUpdate.js') }}" defer></script>
@endpush
