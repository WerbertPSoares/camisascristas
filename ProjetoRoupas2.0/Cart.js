// Lê o carrinho do localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Função para atualizar o carrinho na página
function updateCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');

    cartItemsContainer.innerHTML = ''; // Limpa os itens anteriores
    let total = 0;

    // Exibe os itens do carrinho
    cart.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');
        itemElement.innerHTML = `
            <p>${item.name} - R$ ${item.price.toFixed(2)} x ${item.quantity}</p>
            <button class="decrease-item" data-id="${item.id}">-</button>
            <button class="increase-item" data-id="${item.id}">+</button>
            <button class="remove-item" data-id="${item.id}">Remover</button>
        `;
        cartItemsContainer.appendChild(itemElement);
        total += item.price * item.quantity;
    });

    // Atualiza o total
    cartTotal.textContent = `Total: R$ ${total.toFixed(2)}`;
}


// Função para aumentar a quantidade de um item
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('increase-item')) {
        const itemId = e.target.getAttribute('data-id');
        const item = cart.find(item => item.id === itemId);
        
        if (item) {
            item.quantity += 1; // Aumenta a quantidade do item
            localStorage.setItem('cart', JSON.stringify(cart)); // Atualiza no localStorage
            updateCart(); // Atualiza o carrinho na página
        }
    }
});

// Função para diminuir a quantidade de um item
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('decrease-item')) {
        const itemId = e.target.getAttribute('data-id');
        const item = cart.find(item => item.id === itemId);
        
        if (item && item.quantity > 1) {
            item.quantity -= 1; // Diminui a quantidade do item, mas não permite que fique menor que 1
            localStorage.setItem('cart', JSON.stringify(cart)); // Atualiza no localStorage
            updateCart(); // Atualiza o carrinho na página
        }
    }
});


// Função para remover item do carrinho
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-item')) {
        const itemId = e.target.getAttribute('data-id');
        cart = cart.filter(item => item.id !== itemId);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    }
});

// Limpar carrinho
document.getElementById('clear-cart').addEventListener('click', function () {
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
});

// Atualiza o carrinho quando a página for carregada (caso o carrinho já tenha itens)
updateCart();

// Função para finalizar a compra
document.getElementById('finalize-purchase').addEventListener('click', function() {
    // Mostrar mensagem de sucesso
    alert("Compra concluída com sucesso!");

    // Limpar o carrinho (localStorage)
    localStorage.removeItem('cart');
    
    // Limpar o carrinho na variável cart também
    cart = [];
    
    // Atualizar o carrinho na página
    updateCart();
    
    // Redirecionar para a página inicial
    window.location.href = 'index.html'; // Substitua pelo caminho correto da página inicial
});