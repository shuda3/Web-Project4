const formCheckout = document.querySelector('.form-checkout');


const showModalMessage = (title, message) => {
    const modalTitle = document.querySelector('#mainModalLabel');
    const modalBody = document.querySelector('#mainModalBody');

    modalTitle.textContent = title;
    modalBody.textContent = message;

    $('#mainModal').modal("show");
}

formCheckout.addEventListener('submit', (e) => {
    e.preventDefault();

    const products = JSON.parse(localStorage.getItem('cart'));

    const orderTotal = products.reduce((acc, curr) => {
        acc += curr.price;

        return acc;
    }, 0);


    const billing = {
        street: formCheckout.street.value,
        city: formCheckout.city.value,
        state: formCheckout.state.value,
        zipcode: formCheckout.zipcode.value,
        phone: formCheckout.phone.value,
        country: formCheckout.country.value,
        cardName: formCheckout.card_name.value,
        cardNumber: formCheckout.card_number.value,
        cardExpiration: formCheckout.card_expiration.value,
        cardCVV: formCheckout.card_cvv.value,
        totalOrder: orderTotal
    };
    

    let payload = {
        billing: billing,
        cart: products
    }

    fetch('save_order.php', {
        method: 'POST',
        body: JSON.stringify(payload),
        headers: {
            "Content-Type" : " application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        //console.log(data);

        showModalMessage('Online Transaction', data.message);
    })
    .catch(err => console.log(err));


});

document.addEventListener('DOMContentLoaded', () => {
    const btnMainModalClose = document.querySelector('#mainModalClose');
    const cardNumberHelpBlock = document.querySelector('#cardNumberHelpBlock');
    /*
        Amex : 34...
        Visa : 4...
        Diners : 300...
        Mastercard : 51....
        JCB : 35...
        Discover : 6011
    */

    let cleave = new Cleave('#card_number', {
        creditCard: true,
        delimiter: '-',
        onCreditCardTypeChanged: function(type){

            if (type == 'unknown') {
                cardNumberHelpBlock.textContent = 'Invalid card number';

                const cardBranches = document.querySelector('.card-branches');

                cardBranches.querySelectorAll('.fab').forEach(item => {
                    item.classList.add('fa-disabled');
                });
            } else {

                const cardBranches = document.querySelector('.card-branches');
                cardBranches.querySelectorAll('.fab').forEach(item => {

                    if (item.classList.toString().includes(type)) {
                        item.classList.remove('fa-disabled');

                    } else {
                        item.classList.add('fa-disabled');
                    }
                });                

                cardNumberHelpBlock.textContent = "";
            }            
        }
    });

    btnMainModalClose.addEventListener('click', () => {               
        $('#mainModal').modal("hide");
        // redirect to home page
    });

});



