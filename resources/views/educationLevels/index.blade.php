@extends('base')
@section('title', 'Niveles educativos')
@section('body')

<div class="grid" style="margin: 20px;">
    @include('sidebar')

    <div class="col-9" style="margin-left: 220px;">
        <div class="col-12">
            <h5>Niveles educativos</h5>
            <button class="btn btn-primary" onclick="createEducationLevelModal()">Agregar</button>
        </div>
        <div class="col-12">
            <table id="educationLevelsTable">
                <thead>
                    <tr>
                        <th>Nivel</th>
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
<script src="{{ asset('js/educationLevelsIndex.js') }}" defer></script>
<script src="{{ asset('js/educationLevelsCreateUpdate.js') }}" defer></script>
@endpush
