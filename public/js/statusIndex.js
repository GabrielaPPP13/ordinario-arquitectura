let statusesTable, statusModal;
document.addEventListener('DOMContentLoaded', () => {
    initStatusesTable();
});

const initStatusesTable = () => {
    statusesTable = $('#statusesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('statuses.index'),
        columns: [
            {
                data: 'status'
            },
            {
                data: 'id',
                render: id =>
                (
                    `<button onclick="deleteStatus(${id})" class="btn btn-danger">Borrar</button>
                    <button onclick="editStatusModal(${id})" class="btn btn-primary">Editar</button>`
                )
            }
        ]
    });
}

const deleteStatus = async id => {
    const result = await validateDelete();
    if (result.isDenied) return;

    const url = route('statuses.destroy', id);
    const init = setMethodHeaders('DELETE');
    const req = await fetch(url, init)
    if (req.ok) {
        showToast('Exito', 'Se ha eliminado', 'success');
        statusesTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editStatusModal = async id => {
    const url = route('statuses.edit', id);
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        statusModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Editar status';
        document.getElementById('modalBody').innerHTML = view;
        statusModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}

const createStatusModal = async () => {
    const url = route('statuses.create');
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        statusModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Registrar status';
        document.getElementById('modalBody').innerHTML = view;
        statusModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}