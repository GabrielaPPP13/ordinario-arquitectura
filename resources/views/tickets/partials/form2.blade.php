<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Formulario de Registro</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input name="curp" class="form-control" placeholder="CURP" value="{{ optional($ticket ?? null)->curp }}" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <input name="phone_1" type="number" class="form-control" placeholder="Teléfono 1" value="{{ optional($ticket ?? null)->phone_1 }}" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <input name="phone_2" type="number" class="form-control" placeholder="Teléfono 2" value="{{ optional($ticket ?? null)->phone_2 }}" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input name="name" class="form-control" placeholder="Nombre" value="{{ optional($ticket ?? null)->name }}" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input name="last_name" class="form-control" placeholder="Apellido paterno" value="{{ optional($ticket ?? null)->last_name }}" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input name="second_last_name" class="form-control" placeholder="Apellido materno" value="{{ optional($ticket ?? null)->second_last_name }}" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ optional($ticket ?? null)->email }}" /> 
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="date" name="date" class="form-control" onchange="getAvailableTimes(event)" value="{{ optional($ticket ?? null)->date }}"/>
                        </div>
                        {{-- <div class="col-md-6 mb-3">
                            <select name="time" id="availableHours" class="form-control">
                                <option>Elige un horario</option>
                            </select>
                        </div> --}}
                        <div class="col-md-6 mb-3">
                            <select name="city_id" id="citiesSelect" class="form-control" >
                                <option  selected disabled >Elige una ciudad</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="subject_id" id="subjectsSelect" class="form-control">
                                <option selected disabled>Elige un motivo</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="responsable_id" id="responsablesSelect" class="form-control">
                                <option name="responsable_id" selected disabled>Elige un responsable</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="education_level_id" id="educationLevelsSelect" class="form-control">
                                <option selected disabled>Nivel que cursa</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
