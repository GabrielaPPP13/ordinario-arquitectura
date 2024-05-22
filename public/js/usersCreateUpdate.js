const createUser = async () => {
    event.preventDefault();
    const url = route('users.store');
    const form = document.getElementById('usersForm');
    const formData = new FormData(form);
    const init = setMethodHeaders('POST', formData);
    const req = await fetch(url, init);
    if (req.ok) {
        showToast('Exito', 'Se ha guardado exitosamente', 'success');
        usersTable.ajax.reload();
        usersModal.toggle();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editUser = async id => {
    event.preventDefault();
    const url = route('users.update', id);
    const form = document.getElementById('userForm');
    const formData = new FormData(form);
    const init = setMethodHeaders('PUT', formData)
    console.log(Object.fromEntries(formData));
    const req = await fetch(url, init);
    if (req.ok) {
        $('.modal').modal('hide');
        showToast('Exito', 'Se han guardado los cambios', 'success');
        usersTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}