document.querySelectorAll('.qty-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.dataset.action;
                const input = this.parentElement.querySelector('.qty-input');
                let value = parseInt(input.value);

                if (action === 'increase' && value < 99) {
                    value++;
                } else if (action === 'decrease' && value > 1) {
                    value--;
                }

                input.value = value;
                updateSubtotal(input);
            });
        });

        // Update subtotal on quantity change
        document.querySelectorAll('.qty-input').forEach(input => {
            input.addEventListener('change', function() {
                updateSubtotal(this);
            });
        });

        function updateSubtotal(input) {
            const quantity = parseInt(input.value);
            const price = parseFloat(input.dataset.price);
            const subtotal = quantity * price;
            
            const cartItem = input.closest('.cart-item');
            const subtotalElement = cartItem.querySelector('.subtotal-amount');
            subtotalElement.textContent = '₹' + subtotal.toLocaleString('en-IN');
            subtotalElement.dataset.subtotal = subtotal;

            // Update cart totals
            updateCartTotals();
        }

        function updateCartTotals() {
            const subtotals = document.querySelectorAll('.subtotal-amount');
            let total = 0;

            subtotals.forEach(el => {
                total += parseFloat(el.dataset.subtotal);
            });

            const tax = total * 0.18;
            const grandTotal = total + tax;

            document.querySelector('.summary-subtotal').textContent = '₹' + total.toLocaleString('en-IN');
            document.querySelector('.summary-tax').textContent = '₹' + tax.toLocaleString('en-IN');
            document.querySelector('.summary-total-amount').textContent = '₹' + grandTotal.toLocaleString('en-IN');
        }