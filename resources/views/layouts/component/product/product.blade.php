<!--shop grid section start-->
<section class="gshop-gshop-grid pt-10">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-3">
                <div class="gshop-sidebar bg-white rounded-2 overflow-hidden">
                    <div class="sidebar-widget category-widget bg-white py-5 px-4 border-top">
                        <div class="widget-title d-flex">
                            <h6 class="mb-0 flex-shrink-0">Categories</h6>
                            <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                        </div>
                        <ul class="widget-nav mt-4">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('customer.category.product', $category->id) }}"
                                        class="d-flex justify-content-between align-items-center">{{ $category->category_name }}<span
                                            class="fw-bold fs-xs total-count">{{ $category->products->count() }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="shop-grid">
                    <div
                        class="listing-top d-flex align-items-center justify-content-between flex-wrap gap-3 bg-white rounded-2 px-4 py-5 mb-6">
                        <p class="mb-0 fw-bold">Showing 1-12 of 45 results</p>
                    </div>
                    <div class="row g-4 justify-content-center">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-10">
                                <a href="{{ route('customer.product.details', $product->id) }}">
                                    <div
                                        class="vertical-product-card rounded-2 position-relative border-0 bg-white bg-white">
                                        <div class="thumbnail position-relative text-center p-4">
                                            <img src="{{ asset('upload/admin_images/' . $product->photo) }}"
                                                alt="{{ $product->name }}" class="product-image">
                                        </div>
                                        <div class="card-content">
                                            <a href="{{ route('customer.product.details', $product->id) }}"
                                                class="card-title fw-bold d-block mb-2 tt-line-clamp tt-clamp-2">{{ $product->name }}</a>
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
                                            <h6 class="price text-danger mb-4">TK. {{ $product->price }}</h6>
                                            <a href="#" class="btn btn-outline-secondary d-block btn-md add-to-cart"
                                                data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                data-price="{{ $product->price }}"
                                                data-photo="{{ asset('upload/admin_images/' . $product->photo) }}">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach

                    </div>
                    <ul class="template-pagination d-flex align-items-center mt-6">
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




</section>
<!--shop grid section end-->

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
        function addToCart(button) {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const price = button.dataset.price;
            const photo = button.dataset.photo;

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            let product = cart.find(item => item.id == id);

            if (product) {
                product.quantity += 1;
            } else {
                cart.push({ id, name, price, photo, quantity: 1 });
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

        // Add event listeners to all add to cart buttons
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default action
                addToCart(button); // Add product to cart
            });
        });

        // Render total cart items count on page load
        renderTotalCartItems();
    });

</script>