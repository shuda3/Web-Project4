const removeAllChildNodes = (parent) => {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
};

const createSampleData = () => {
    let products = [
        {
            product: 'Product 1',
            price: 10.99,
            quantity: 1
        },

        {
            product: 'Product 2',
            price: 29.99,
            quantity: 1
        },

        {
            product: 'Product 3',
            price: 9.99,
            quantity: 1
        },
    ];

    localStorage.setItem('cart', JSON.stringify(products) );
};

const removeItemFromCart = (item) => {
    const products = JSON.parse(localStorage.getItem('cart'));
    products.splice(item, 1);

    localStorage.setItem('cart', JSON.stringify(products) );
    loadSavedCartItems();
}

const loadSavedCartItems = () => {
    const products = JSON.parse(localStorage.getItem('cart'));
    const totalItems = document.querySelector('#total_items');
    const cartBody = document.querySelector('#cart_body');
    const totalPrice = document.querySelector('#total_price');

    let subTotal = 0;
    totalItems.textContent = products.length;

    removeAllChildNodes(cartBody);

    products.forEach((item, index) => {
        const tr = document.createElement('tr');

        const product = document.createElement('td');
        const price = document.createElement('td');
        const quantity = document.createElement('td');
        const totalprice = document.createElement('td');
        const deleteItem = document.createElement('td');

        
        product.textContent = item.product;
        price.textContent = item.price;
        quantity.textContent = item.quantity;
        totalprice.textContent = item.price * item.quantity;
        deleteItem.innerHTML = '<i class="fas fa-minus-circle"></i>';

        if (item.price < 0) {
            product.classList.add('text-success');
            price.classList.add('text-success');
            quantity.classList.add('text-success');
            totalprice.classList.add('text-success');
        }
        
        deleteItem.addEventListener('click', () => {
            removeItemFromCart(index);
        })

        tr.appendChild(product);
        tr.appendChild(price);
        tr.appendChild(quantity);
        tr.appendChild(totalprice);
        tr.appendChild(deleteItem);

        subTotal += item.price * item.quantity;

        cartBody.appendChild(tr);
    });

    totalPrice.textContent = `\$${subTotal}`;
}

const showModalMessage = (title, message) => {
    const modalTitle = document.querySelector('#mainModalLabel');
    const modalBody = document.querySelector('#mainModalBody');

    modalTitle.textContent = title;
    modalBody.textContent = message;

    $('#mainModal').modal("show");
}

const getRedeemCodes = () => {
    promoCodes = [
        {
            code: 'DISC',
            description: 'Super Discount',
            amount: -1.99
        }
    ]

    return promoCodes;
}

const applyReeemCode = () => {
    const promoCode = document.querySelector('#promo_code');
    const products = JSON.parse(localStorage.getItem('cart'));    
    const redeemCodes = getRedeemCodes();

    redeemCodes.forEach(item => {
        if (promoCode.value == item['code']) {
            const cart = products.filter(item => item.product == promoCode.value);

            if (cart.length == 0) {
                products.push({
                    product: promoCode.value,
                    price: item['amount'],
                    quantity: 1
                });
    
                localStorage.setItem('cart', JSON.stringify(products) );
                loadSavedCartItems();        
            }
        }
    });

    promoCode.value = "";
}

document.addEventListener('DOMContentLoaded', () => {

    const btnCheckout = document.querySelector('#btnCheckout');
    const btnRedeem = document.querySelector('#btn_redeem');
    const btnMainModalClose = document.querySelector('#mainModalClose');
        
    createSampleData();     // function used for testing purpose only
    loadSavedCartItems();

    btnCheckout.addEventListener('click', () => {

        const products = JSON.parse(localStorage.getItem('cart'));

        if (products.length == 0) {
            showModalMessage('Empty cart', 'You cart is empty. You cannot proceed with an empty cart');            
        } else {
            window.location.replace('checkout.html');

        }
    }); 
    
    btnMainModalClose.addEventListener('click', () => {               
        $('#mainModal').modal("hide");
    });

    btnRedeem.addEventListener('click', () => {
        applyReeemCode();
    })
});
