<!--product details start-->
<section class="product-details-area pt-10">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-9">
                <div class="product-details">
                    <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                        <div class="row align-items-center g-4">
                            <div class="col-xl-6 align-self-end">
                                <div class="quickview-double-slider">
                                    <div class="quickview-product-slider swiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide text-center">
                                                <img src="{{ asset('upload/admin_images/' . $product->photo) }}"
                                                    alt="{{ $product->name }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="product-info">
                                    <h4 class="mt-1 mb-3">{{ $product->name }}</h4>
                                    <div class="d-flex align-items-center flex-nowrap star-rating fs-xxs mb-2">
                                        <ul class="d-flex align-items-center me-2">
                                            <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                            <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                            <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                            <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                            <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                        </ul>
                                        <span class="flex-shrink-0">(5.2k Reviews)</span>
                                    </div>
                                    <div class="pricing mt-2">
                                        <span class="fw-bold fs-xs text-danger">TK {{ $product->price }}</span>
                                        <span class="fw-bold fs-xs deleted ms-1">TK {{ $product->price + 100 }}</span>
                                    </div>
                                    <div class="widget-title d-flex mt-4">
                                        <h6 class="mb-1 flex-shrink-0">Description</h6>
                                        <span
                                            class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                                    </div>
                                    <p>{{ $product->description }}</p>
                                    <h6 class="fs-md mb-2 mt-3">Quantity:</h6>
                                    <div class="d-flex align-items-center gap-4 flex-wrap">
                                        <div class="product-qty d-flex align-items-center">
                                            <button class="decrease">-</button>
                                            <input type="text" value="1" class="quantity">
                                            <button class="increase">+</button>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center gap-4 flex-wrap pt-3">
                                        <a href="#" class="btn btn-secondary btn-md d-block add-to-cart"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            data-photo="{{ asset('upload/admin_images/' . $product->photo) }}">
                                            Add to Cart
                                        </a>
                                        <a href="#" class="btn btn-outline-secondary d-block btn-md add-to-wishlist"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            data-photo="{{ asset('upload/admin_images/' . $product->photo) }}"
                                            data-instock="{{ $product->stock > 0 ? 'true' : 'false' }}">
                                            Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-8">
                <div class="gshop-sidebar">
                    <div class="sidebar-widget info-sidebar bg-white rounded-3 py-3">
                        <div class="sidebar-info-list d-flex align-items-center gap-3 p-4 border-top">
                            <span
                                class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                            </span>
                            <div class="info-right">
                                <h6 class="mb-1 fs-md">100% Money Back</h6>
                                <span class="fw-medium fs-xs">Guaranteed Product Warranty</span>
                            </div>
                        </div>
                        <div class="sidebar-info-list d-flex align-items-center gap-3 p-4 border-top">
                            <span
                                class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <div class="info-right">
                                <h6 class="mb-1 fs-md">Safety & Secure</h6>
                                <span class="fw-medium fs-xs">Call us Anytime & Anywhere</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--product details end-->

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Function to render total cart items count
        function renderTotalCartItems() {
            const totalItemsSpan = document.getElementById('total-items');
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let totalQuantity = 0;

            // Calculate total quantity
            cart.forEach(item => {
                totalQuantity += parseInt(item.quantity);
            });

            // Update total cart items count in the header
            totalItemsSpan.textContent = totalQuantity;
        }

        // Function to handle adding product to cart
        function addToCart(button, quantity = 1) {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const price = button.dataset.price;
            const photo = button.dataset.photo;

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            let product = cart.find(item => item.id == id);

            if (product) {
                product.quantity += quantity;
            } else {
                cart.push({ id, name, price, photo, quantity });
            }

            localStorage.setItem('cart', JSON.stringify(cart));

            // Change the button text after adding to cart
            button.textContent = 'Added to Cart';
            button.style.backgroundColor = '#28a745'; // Bootstrap success color: green
            button.style.borderColor = '#28a745'; // Bootstrap success color: green
            button.style.color = '#fff'; // White text color

            // Optionally, revert the button text back to "Add to Cart" after a few seconds
            setTimeout(() => {
                button.textContent = 'Add to Cart';
                button.style.backgroundColor = ''; // Reverting to default background color
                button.style.borderColor = ''; // Reverting to default border color
                button.style.color = ''; // Reverting to default text color
            }, 2000); // 2 seconds delay

            // Render total cart items count
            renderTotalCartItems();
        }

        // Function to handle adding product to wishlist
        function addToWishlist(button) {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const price = button.dataset.price;
            const photo = button.dataset.photo;
            const inStock = button.dataset.instock === 'true'; // Assuming you have a data attribute for stock status

            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

            if (!wishlist.find(item => item.id == id)) {
                wishlist.push({ id, name, price, photo, inStock });
            }

            localStorage.setItem('wishlist', JSON.stringify(wishlist));

            // Change the button text after adding to wishlist
            button.textContent = 'Added to Wishlist';
            button.style.backgroundColor = '#ffc107'; // Bootstrap warning color: yellow
            button.style.borderColor = '#ffc107'; // Bootstrap warning color: yellow
            button.style.color = '#fff'; // White text color

            // Optionally, revert the button text back to "Add to Wishlist" after a few seconds
            setTimeout(() => {
                button.textContent = 'Add to Wishlist';
                button.style.backgroundColor = ''; // Reverting to default background color
                button.style.borderColor = ''; // Reverting to default border color
                button.style.color = ''; // Reverting to default text color
            }, 2000); // 2 seconds delay
        }

        // Function to update product quantity
        function updateQuantity(input, isIncrease) {
            let quantity = parseInt(input.value);
            if (isIncrease) {
                quantity += 1;
            } else {
                quantity = quantity > 1 ? quantity - 1 : 1;
            }
            input.value = quantity;
            return quantity;
        }

        document.querySelectorAll('.increase').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default action
                const input = button.closest('.product-qty').querySelector('.quantity');
                const quantity = updateQuantity(input, true); // Increase quantity
                button.closest('.product-qty').querySelector('.add-to-cart').dataset.quantity = quantity;
            });
        });

        document.querySelectorAll('.decrease').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default action
                const input = button.closest('.product-qty').querySelector('.quantity');
                const quantity = updateQuantity(input, false); // Decrease quantity
                button.closest('.product-qty').querySelector('.add-to-cart').dataset.quantity = quantity;
            });
        });

        // Add event listeners to all add to cart buttons
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default action
                const quantity = parseInt(button.closest('.product-info').querySelector('.quantity').value);
                addToCart(button, quantity); // Add product to cart with specified quantity
            });
        });

        // Add event listeners to all add to wishlist buttons
        document.querySelectorAll('.add-to-wishlist').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default action
                addToWishlist(button); // Add product to wishlist
            });
        });

        // Render total cart items count on page load
        renderTotalCartItems();
    });
</script>