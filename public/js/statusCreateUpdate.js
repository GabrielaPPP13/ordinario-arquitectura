const createStatus = async () => {
    event.preventDefault();
    const url = route('statuses.store');
    const form = document.getElementById('statusForm');
    const formData = new FormData(form);
    const init = setMethodHeaders('POST', formData);
    const req = await fetch(url, init);
    if (req.ok) {
        showToast('Exito', 'Se ha guardado exitosamente', 'success');
        $('.modal').modal('hide');
        statusesTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editStatus = async id => {
    event.preventDefault();
    const url = route('statuses.update', id);
    const form = document.getElementById('statusForm');
    const formData = new FormData(form);
    const init = setMethodHeaders('PUT', formData)
    console.log(Object.fromEntries(formData));
    const req = await fetch(url, init);
    if (req.ok) {
        $('.modal').modal('hide');
        showToast('Exito', 'Se han guardado los cambios', 'success');
        statusesTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}