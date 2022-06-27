const deleteForms = document.querySelectorAll('.form-delete');

deleteForms.forEach(form => {
    form.addEventListener('submit', (e) => {
        const confirmed = confirm(`Queres eliminar el producto seleccionado ?`);
        if(!confirmed) {
            e.preventDefault();
        }
    })
})