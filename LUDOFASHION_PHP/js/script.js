//JS do Carrossel

// Seleciona o contêiner que envolve todos os slides
const carouselSlide = document.querySelector('.carousel-slide');

// Seleciona todas as imagens dentro do carrossel
const images = document.querySelectorAll('.carousel-slide img');

// Inicializa o contador que será usado para rastrear o slide atual
let counter = 0;

// Obtém a largura de uma imagem
const size = images[0].clientWidth;


/* Função que move o carrossel para o próximo slide */
function moveCarousel() {
    // Aumenta o contador em +1 para passar para o próximo slide
    counter++;
    // Se o contador for maior ou igual ao número de slides, reinicia o contador
    if (counter >= images.length) {
        counter = 0; // Reinicia o contador para o primeiro slide
    }

    // Move o carrossel usando transform: translateX, baseado na largura do slide
    // O valor é negativo para mover os slides para a esquerda
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

// Define um intervalo de tempo para chamar a função moveCarousel
setInterval(moveCarousel, 5000); // 5000ms = 5s


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

// Script para confirmação de exclusão dos produtos
function confirmDelete() {
    if (confirm('Tem certeza de que deseja deletar os produtos selecionados?')) {
        document.getElementById('deleteForm').submit();
    }
}