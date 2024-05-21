let responsablesTable, responsableModal;
document.addEventListener('DOMContentLoaded', () => {
    initResponsablesTable();
});

const initResponsablesTable = () => {
    responsablesTable = $('#responsablesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('responsables.index'),
        columns: [
            {
                data: 'name'
            },
            {
                data: 'id',
                render: id =>
                (
                    `<button onclick="deleteResponsable(${id})" class="btn btn-danger">Borrar</button>
                    <button onclick="editResponsableModal(${id})" class="btn btn-primary">Editar</button>`
                )
            }
        ]
    });
}

const deleteResponsable = async id => {
    const result = await validateDelete();
    if (result.isDenied) return;

    const url = route('responsables.destroy', id);
    const init = setMethodHeaders('DELETE');
    const req = await fetch(url, init)
    if (req.ok) {
        showToast('Exito', 'Se ha eliminado', 'success');
        responsablesTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editResponsableModal = async id => {
    const url = route('responsables.edit', id);
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        responsableModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Editar responsable';
        document.getElementById('modalBody').innerHTML = view;
        responsableModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}

const createResponsableModal = async () => {
    const url = route('responsables.create');
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        responsableModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Registrar responsable';
        document.getElementById('modalBody').innerHTML = view;
        responsableModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}