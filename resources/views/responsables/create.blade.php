@extends('base')
@section('body')
<div class="grid">
    <div class="col-12">
        <form action="" id="responsableForm" autocomplete="off" onsubmit="createResponsable()">
            @include('responsables.partials.form')
            <div class="text-end">
                <button type="submit" class="mt-2 btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection