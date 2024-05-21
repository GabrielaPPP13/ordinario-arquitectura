@extends('base')
@section('title', 'Asuntos')
@section('body')

<div class="grid" style="margin: 20px;">
    @include('sidebar')

    <div class="col-9" style="margin-left: 220px;"> 
        <div class="col-12">
            <h5>Asuntos</h5>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" onclick="createSubjectModal()">Agregar</button>
        </div>
        <div class="col-12">
            <table class="table" id="subjectsTable">
                <thead>
                    <tr>
                        <th>Asunto</th>
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
<script src="{{ asset('js/subjectIndex.js') }}" defer></script>
<script src="{{ asset('js/subjectCreateUpdate.js') }}" defer></script>
@endpush
