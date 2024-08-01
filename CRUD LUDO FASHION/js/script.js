// Script para confirmação de exclusão de registros
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-danger');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const confirmDelete = confirm('Tem certeza de que deseja excluir os registros selecionados?');
            if (!confirmDelete) {
                event.preventDefault(); // Cancela a ação se o usuário não confirmar
            }
        });
    });
});
