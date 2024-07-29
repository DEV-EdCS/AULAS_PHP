// Seleciona todos os checkboxes de seleção de registros
const checkboxes = document.querySelectorAll('input[name="ids[]"]');

// Seleciona o botão de deletar
const deleteButton = document.querySelector('button[type="submit"].btn-danger');

// Adiciona um evento de clique no botão de deletar
deleteButton.addEventListener('click', function(event) {
    // Verifica se pelo menos um checkbox está selecionado
    const isAnyCheckboxChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
    
    // Se nenhum checkbox estiver selecionado, previne a ação padrão do botão e exibe um alerta
    if (!isAnyCheckboxChecked) {
        event.preventDefault();
        alert('Por favor, selecione pelo menos um carro para deletar.');
    } else {
        // Se algum checkbox estiver selecionado, exibe uma confirmação de exclusão
        const confirmDeletion = confirm('Tem certeza de que deseja deletar os carros selecionados?');
        // Se o usuário não confirmar, previne a ação padrão do botão
        if (!confirmDeletion) {
            event.preventDefault();
        }
    }
});
