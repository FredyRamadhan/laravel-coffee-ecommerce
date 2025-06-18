import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Product page functionality
document.addEventListener('DOMContentLoaded', function() {
    // Quantity controls
    const quantityInput = document.getElementById('quantity');
    const decreaseBtn = document.getElementById('decrease-qty');
    const increaseBtn = document.getElementById('increase-qty');
    const totalPriceElement = document.getElementById('total-price');

    if (quantityInput && decreaseBtn && increaseBtn && totalPriceElement) {
        const maxStock = parseInt(quantityInput.getAttribute('max'));
        const unitPrice = parseInt(quantityInput.dataset.price || 0);

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value);
            const total = quantity * unitPrice;
            totalPriceElement.textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        decreaseBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateTotalPrice();
            }
        });

        increaseBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue < maxStock) {
                quantityInput.value = currentValue + 1;
                updateTotalPrice();
            }
        });

        quantityInput.addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value < 1) this.value = 1;
            if (value > maxStock) this.value = maxStock;
            updateTotalPrice();
        });
    }

    // Add to cart form submission
    const addToCartForm = document.getElementById('add-to-cart-form');
    if (addToCartForm) {
        addToCartForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Menambahkan...';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showNotification('Produk berhasil ditambahkan ke keranjang!', 'success');
                } else {
                    showNotification(data.message || 'Terjadi kesalahan', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Terjadi kesalahan saat menambahkan ke keranjang', 'error');
            })
            .finally(() => {
                // Restore button state
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });
    }

    // Notification function
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            'bg-blue-500 text-white'
        }`;
        notification.textContent = message;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Cart page functionality
    const cartIncreaseButtons = document.querySelectorAll('.cart-increase-btn');
    const cartDecreaseButtons = document.querySelectorAll('.cart-decrease-btn');
    const cartRemoveButtons = document.querySelectorAll('.cart-remove-btn');

    cartIncreaseButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.itemId;
            const maxStock = parseInt(this.dataset.maxStock);
            const quantityElement = document.querySelector(`.cart-quantity[data-item-id="${itemId}"]`);
            const currentQuantity = parseInt(quantityElement.textContent);

            if (currentQuantity >= maxStock) {
                showNotification('Stok tidak mencukupi', 'error');
                return;
            }

            updateCartItem(itemId, 'increase');
        });
    });

    cartDecreaseButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.itemId;
            updateCartItem(itemId, 'decrease');
        });
    });

    cartRemoveButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.dataset.itemId;
            if (confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                updateCartItem(itemId, 'remove');
            }
        });
    });

    function updateCartItem(itemId, action) {
        const formData = new FormData();
        formData.append('item_id', itemId);
        formData.append('action', action);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        fetch('/cart/update', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.action === 'removed') {
                    // Remove the item from the DOM
                    const itemElement = document.querySelector(`[data-item-id="${itemId}"]`).closest('.flex.items-center.space-x-4');
                    itemElement.remove();

                    // Check if cart is now empty
                    const remainingItems = document.querySelectorAll('.cart-quantity').length;
                    if (remainingItems === 0) {
                        location.reload(); // Reload to show empty cart message
                    }
                } else {
                    // Update quantity and subtotal
                    const quantityElement = document.querySelector(`.cart-quantity[data-item-id="${itemId}"]`);
                    const subtotalElement = document.querySelector(`.cart-subtotal[data-item-id="${itemId}"]`);

                    quantityElement.textContent = data.item.count;
                    subtotalElement.textContent = data.item.formatted_subtotal;
                }

                // Update total
                document.getElementById('cart-total').textContent = data.formatted_total;
                showNotification(data.message, 'success');
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Terjadi kesalahan saat memperbarui keranjang', 'error');
        });
    }
});
