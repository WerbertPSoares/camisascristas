// Inicializando o carrinho com o localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Função para adicionar o produto ao carrinho
function addToCart(event) {
    const productCard = event.target.closest('.product-card');
    const productId = productCard.getAttribute('data-id');
    const productName = productCard.getAttribute('data-name');
    const productPrice = parseFloat(productCard.getAttribute('data-price'));

    // Adicionando ou incrementando o item no carrinho
    const existingItemIndex = cart.findIndex(item => item.id === productId);
    if (existingItemIndex !== -1) {
        // Se já estiver no carrinho, aumenta a quantidade
        cart[existingItemIndex].quantity += 1;
    } else {
        // Caso contrário, adiciona o novo item
        cart.push({
            id: productId,
            name: productName,
            price: productPrice,
            quantity: 1
        });
    }

    // Atualiza o carrinho no localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Log para verificar se o item está sendo adicionado
    console.log('Carrinho atualizado:', cart);

    // Feedback visual: mudar a cor do botão
    const addToCartButton = event.target;
    addToCartButton.style.backgroundColor = '#4CAF50'; // Cor de confirmação (verde)
    addToCartButton.textContent = 'Adicionado!';

    setTimeout(() => {
        addToCartButton.style.backgroundColor = '#00bcd4'; // Azul original
        addToCartButton.textContent = 'Adicionar ao Carrinho';
    }, 500);

    // Mostrar mensagem de confirmação
    showConfirmationMessage(`${productName} foi adicionado ao carrinho!`);

    // Atualiza o carrinho na página
    updateCart();
}

// Função para mostrar mensagem de confirmação
function showConfirmationMessage(message) {
    const confirmationMessageElement = document.createElement('div');
    confirmationMessageElement.classList.add('confirmation-message');
    confirmationMessageElement.textContent = message;
    document.body.appendChild(confirmationMessageElement);

    setTimeout(() => {
        confirmationMessageElement.remove();
    }, 2000);
}

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
            <button class="remove-item" data-id="${item.id}">Remover</button>
        `;
        cartItemsContainer.appendChild(itemElement);
        total += item.price * item.quantity;
    });

    // Atualiza o total
    cartTotal.textContent = `Total: R$ ${total.toFixed(2)}`;
}

// Adicionar evento de clique nos botões de "Adicionar ao Carrinho"
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', addToCart);
});

