let ticketsTable, ticketModal;

document.addEventListener('DOMContentLoaded', () => {
    initTicketsTable();
});


const initTicketsTable = async () => {
    ticketsTable = $('#ticketsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('tickets.index'),
        columns: [
            {
                data: 'folio'
            },
            {
                data: 'curp'
            },
            {
                data: 'name'
            },
            {
                data: 'last_name'
            },
            {
                data: 'second_last_name'
            },
            {
                data: 'city.city'
            },
            {
                data: 'education_level.level'
            },
            {
                data: 'email'
            },
            {
                data: 'phone_1'
            },
            {
                data: 'phone_2'
            },
            {
                data: 'status.status'
            },
            {
                data: 'responsable.name'
            },
            {
                data: 'subject.subject'
            },
            {
                data: 'date',  // Agrega la columna de fecha
                render: data => data ? new Date(data).toLocaleDateString() : ''
            },
            {
                data: 'time',  // Agrega la columna de hora
                render: data => data ? data.substr(0, 5) : ''
            },
            {
                data: 'created_at'
            },
            {
                data: 'id',
                render: id => 
                (
                    `<button onclick="deleteTicket(${id})" class="btn btn-danger">Borrar</button>
                    <button onclick="editTicketModal(${id})" class="btn btn-primary">Editar</button>`
                )
            }
        ]
    });
}

const deleteTicket = async id => {
    const result = await validateDelete();
    if (result.isDenied) return;

    const url = route('tickets.destroy', id);
    const init = setMethodHeaders('DELETE');
    const req = await fetch(url, init)
    if (req.ok) {
        showToast('Exito', 'Se ha eliminado', 'success');
        ticketsTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editTicketModal = async id => {
    const url = route('tickets.edit', id);
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        ticketModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Editar ticket';
        document.getElementById('modalBody').innerHTML = view;
        ticketModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}

const createTicketModal = async () => {
    const url = route('tickets.create');
    const req = await fetch(url);
    if (req.ok) {
        const view = await req.text();
        ticketModal = new bootstrap.Modal(document.getElementById('modal'));
        document.getElementById('modalTitle').innerHTML = 'Registrar ticket';
        document.getElementById('modalBody').innerHTML = view;
        ticketModal.toggle();
        return;
    }

    showToast('Error', 'Ha ocurrido un error', 'error');
}


