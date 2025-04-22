document.addEventListener('DOMContentLoaded', function() {
    // Add to Cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productSlug = this.dataset.productSlug;
            
            fetch('/api/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    product_slug: productSlug,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    Swal.fire({
                        title: 'تم!',
                        text: 'تم إضافة المنتج للسلة بنجاح',
                        icon: 'success',
                        confirmButtonText: 'حسناً'
                    });
                    // Update cart counter if exists
                    if (document.querySelector('.cart-count')) {
                        document.querySelector('.cart-count').textContent = data.cartCount;
                    }
                } else {
                    throw new Error(data.message);
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'خطأ!',
                    text: error.message || 'حدث خطأ أثناء إضافة المنتج للسلة',
                    icon: 'error',
                    confirmButtonText: 'حسناً'
                });
            });
        });
    });

    // Add to Wishlist functionality
    document.querySelectorAll('.add-to-wishlist').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productSlug = this.dataset.productSlug;
            
            fetch('/api/wishlist/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    product_slug: productSlug
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Toggle heart icon class
                    this.querySelector('i').classList.toggle('fa-regular');
                    this.querySelector('i').classList.toggle('fa-solid');
                    
                    Swal.fire({
                        title: 'تم!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'حسناً'
                    });
                } else {
                    throw new Error(data.message);
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'خطأ!',
                    text: error.message || 'حدث خطأ أثناء إضافة المنتج للمفضلة',
                    icon: 'error',
                    confirmButtonText: 'حسناً'
                });
            });
        });
    });

    // Quick View functionality
    document.querySelectorAll('.quick-view').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productSlug = this.dataset.productSlug;
            
            fetch(`/api/products/${productSlug}/quick-view`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Populate and show quick view modal
                        const modal = document.querySelector('#QuickView');
                        if (modal) {
                            // Update modal content with product data
                            modal.querySelector('.product-title').textContent = data.product.name;
                            modal.querySelector('.product-price').innerHTML = data.product.discounted_price ? 
                                `<del>${data.product.price} ج.م</del> ${data.product.discounted_price} ج.م` : 
                                `${data.product.price} ج.م`;
                            modal.querySelector('.product-description').textContent = data.product.description;
                            modal.querySelector('.product-image').src = data.product.image;
                            
                            // Show modal
                            const modalInstance = new bootstrap.Modal(modal);
                            modalInstance.show();
                        }
                    } else {
                        throw new Error(data.message);
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'خطأ!',
                        text: error.message || 'حدث خطأ أثناء تحميل بيانات المنتج',
                        icon: 'error',
                        confirmButtonText: 'حسناً'
                    });
                });
        });
    });
});