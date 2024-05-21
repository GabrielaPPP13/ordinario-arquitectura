const createResponsable = async () => {
    event.preventDefault();
    const url = route('responsables.store');
    const form = document.getElementById('responsableForm');
    const formData = new FormData(form);
    const init = setMethodHeaders('POST', formData);
    const req = await fetch(url, init);
    if (req.ok) {
        showToast('Exito', 'Se ha guardado exitosamente', 'success');
        $('.modal').modal('hide');
        responsablesTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editResponsable = async id => {
    event.preventDefault();
    const url = route('responsables.update', id);
    const form = document.getElementById('responsableForm');
    const formData = new FormData(form);
    const init = setMethodHeaders('PUT', formData)
    console.log(Object.fromEntries(formData));
    const req = await fetch(url, init);
    if (req.ok) {
        $('.modal').modal('hide');
        showToast('Exito', 'Se han guardado los cambios', 'success');
        responsablesTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}