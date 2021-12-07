document.addEventListener('DOMContentLoaded', () => {
    const carType = document.querySelector('#car_type');
    const formRental = document.querySelector('.form-rental');

    carType.addEventListener('change', (e) => {
        const carPrice = document.querySelector('#price');
        carPrice.value = `\$ ${e.target.value}`;
        
    });

    formRental.addEventListener('submit', (e) => {
        e.preventDefault();

        const carType = document.querySelector('#car_type');

        // create product 
        let product = {
            product: `Car Rental (${carType.options[carType.selectedIndex].textContent})` ,
            price: formRental.car_type.value,
            quantity: 1, 
            pickup: formRental.pickup_date.value,    
            return: formRental.return_date.value,
        }

        // add to shopping cart
        if (localStorage.getItem('cart') == null) {
            localStorage.setItem('cart', JSON.stringify([product]));

        } else {
            const products = JSON.parse(localStorage.getItem('cart'));
            products.push(product);

            localStorage.setItem('cart', JSON.stringify(products) );
        }

        // redirect page to home page
        window.location.replace('user_dashboard.php');

    });
});