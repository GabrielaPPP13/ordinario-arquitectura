let educationLevelsTable, educationLevelModal;

document.addEventListener('DOMContentLoaded', () => {
    initEducationLevelsTable();
});

const initEducationLevelsTable = async () => {
    educationLevelsTable = $('#educationLevelsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('education-levels.index'),
        columns: [
            {
                data: 'level'
            }, 
            {
                data: 'id',
                render: id =>
                (
                    `<button onclick="deleteEducationLevel(${id})" class="btn btn-danger">Borrar</button>
                    <button onclick="editEducationLevelModal(${id})" class="btn btn-primary">Editar</button>`
                )
            }
        ]
    })
}

const createEducationLevelModal = async () => {
    const url = route('education-levels.create');
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        educationLevelModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Registrar nivel educativo';
        document.getElementById('modalBody').innerHTML = view;
        educationLevelModal.toggle();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const deleteEducationLevel = async id => {
    const result = await validateDelete();
    if (result.isDenied) return;

    const url = route('education-levels.destroy', id);
    const init = setMethodHeaders('DELETE');
    const req = await fetch(url, init)
    if (req.ok) {
        showToast('Exito', 'Se ha eliminado', 'success');
        educationLevelsTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editEducationLevelModal = async id => {
    const url = route('education-levels.edit', id);
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        educationLevelModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Editar nivel educativo';
        document.getElementById('modalBody').innerHTML = view;
        educationLevelModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}