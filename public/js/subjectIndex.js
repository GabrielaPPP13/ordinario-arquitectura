let subjectsTable, subjectModal;
document.addEventListener('DOMContentLoaded', () => {
    initCitiesTable();
});

const initCitiesTable = () => {
    subjectsTable = $('#subjectsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('subjects.index'),
        columns: [
            {
                data: 'subject'
            },
            {
                data: 'id',
                render: id =>
                (
                    `<button onclick="deleteSubject(${id})" class="btn btn-danger">Borrar</button>
                    <button onclick="editSubjectModal(${id})" class="btn btn-primary">Editar</button>`
                )
            }
        ]
    });
}

const deleteSubject = async id => {
    const result = await validateDelete();
    if (result.isDenied) return;

    const url = route('subjects.destroy', id);
    const init = setMethodHeaders('DELETE');
    const req = await fetch(url, init)
    if (req.ok) {
        showToast('Exito', 'Se ha eliminado', 'success');
        subjectsTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editSubjectModal = async id => {
    const url = route('subjects.edit', id);
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        subjectModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Editar municipio';
        document.getElementById('modalBody').innerHTML = view;
        subjectModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}

const createSubjectModal = async () => {
    const url = route('subjects.create');
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        subjectModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Registrar municipio';
        document.getElementById('modalBody').innerHTML = view;
        subjectModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}