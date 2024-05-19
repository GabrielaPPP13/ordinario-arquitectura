const createEducationLevel = async () => {
    event.preventDefault();
    const url = route('education-levels.store');
    const form = document.getElementById('educationLevelForm');
    const formData = new FormData(form);
    const init = setMethodHeaders('POST', formData);
    const req = await fetch(url, init);
    if (req.ok) {
        showToast('Exito', 'Se ha guardado exitosamente', 'success');
        $('.modal').modal('hide');
        educationLevelsTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}

const editEducationLevel = async id => {
    event.preventDefault();
    const url = route('education-levels.update', id);
    const form = document.getElementById('educationLevelForm');
    const formData = new FormData(form);
    const init = setMethodHeaders('PUT', formData)
    console.log(Object.fromEntries(formData));
    const req = await fetch(url, init);
    if (req.ok) {
        $('.modal').modal('hide');
        showToast('Exito', 'Se han guardado los cambios', 'success');
        educationLevelsTable.ajax.reload();
        return;
    }
    showToast('Error', 'Ha ocurrido un error', 'error');
}