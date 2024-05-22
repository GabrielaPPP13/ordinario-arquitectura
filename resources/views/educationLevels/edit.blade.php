@extends('base')
@section('body')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="" id="educationLevelForm" autocomplete="off" onsubmit="editEducationLevel({{ $educationLevel->id }})">
                @include('educationLevels.partials.form')
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
