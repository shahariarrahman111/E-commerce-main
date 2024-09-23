<!-- Related product slider start -->
@foreach ($categories as $category)
    @if ($category->products->isNotEmpty())
        <section class="related-product-slider pb-120">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-8">
                        <div class="section-title text-center text-sm-start">
                            <h2 class="mb-0">{{ $category->category_name }}</h2>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="rl-slider-btns text-center text-sm-end mt-3 mt-sm-0">
                            <button class="rl-slider-btn slider-btn-prev"><i class="fas fa-arrow-left"></i></button>
                            <button class="rl-slider-btn slider-btn-next ms-3"><i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="rl-products-slider swiper mt-8">
                    <div class="swiper-wrapper">
                        @foreach ($category->products as $product)

                            <a href="{{ route('customer.product.details', $product->id) }}">
                                <div class="vertical-product-card rounded-2 position-relative swiper-slide">
                                    <div class="thumbnail position-relative text-center p-4">
                                        <img src="{{ asset('upload/admin_images/' . $product->photo) }}" alt="{{ $product->name }}"
                                            class="product-image">
                                        <div class="product-btns position-absolute d-flex gap-2 flex-column">
                                            <a href="#" class="rounded-btn"><i class="fa-regular fa-heart"></i></a>
                                            <a href="#" class="rounded-btn">
                                                <svg width="14" height="11" viewBox="0 0 14 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.705 0.201222C10.4317 0.469526 10.4317 0.904522 10.705 1.17283L11.6101 2.06107H7.70001C6.15364 2.06107 4.90001 3.29144 4.90001 4.80917V5.49619C4.90001 5.87564 5.21341 6.18322 5.60001 6.18322C5.98662 6.18322 6.30001 5.87564 6.30001 5.49619V4.80917C6.30001 4.0503 6.92679 3.43512 7.70001 3.43512H11.6101L10.705 4.32337C10.4317 4.59166 10.4317 5.02668 10.705 5.29496C10.9784 5.56325 11.4216 5.56325 11.695 5.29496L13.795 3.2339C14.0683 2.96559 14.0683 2.5306 13.795 2.26229L11.695 0.201222C11.4216 -0.0670741 10.9784 -0.0670741 10.705 0.201222ZM8.40001 4.80917C8.0134 4.80917 7.70001 5.11675 7.70001 5.49619V6.18322C7.70001 6.9421 7.07323 7.55726 6.30001 7.55726H2.38995L3.29498 6.66901C3.56835 6.40073 3.56835 5.9657 3.29498 5.69742C3.02161 5.42914 2.5784 5.42914 2.30503 5.69742L0.205023 7.75849C-0.0683411 8.02678 -0.0683411 8.4618 0.205023 8.73008L2.30503 10.7912C2.5784 11.0594 3.02161 11.0594 3.29498 10.7912C3.56835 10.5229 3.56835 10.0878 3.29498 9.81957L2.38995 8.93131H6.30001C7.84638 8.93131 9.10001 7.70092 9.10001 6.18322V5.49619C9.10001 5.11675 8.78662 4.80917 8.40001 4.80917Z"
                                                        fill="#AEB1B9"></path>
                                                </svg>
                                            </a>
                                            <a href="#" class="rounded-btn"><i class="fa-regular fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <a href="#"
                                            class="mb-2 d-inline-block text-secondary fw-semibold fs-xxs">{{ $category->category_name }}</a>
                                        <a href="#" class="card-title fw-bold d-block mb-2">{{ $product->name }}</a>
                                        <div class="pricing mb-2 d-flex gap-2">
                                            <del class="mb-0 h6 text-gray">TK {{ $product->price + 100 }}</del>
                                            <h6 class="price text-danger mb-0">TK {{ $product->price }}</h6>
                                        </div>
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
                                        <a href="#" class="btn btn-outline-secondary d-block btn-md add-to-cart"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            data-photo="{{ asset('upload/admin_images/' . $product->photo) }}">
                                            Add to Cart
                                        </a>
                                    </div>
                                </div>
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Related products slider end -->
    @endif
@endforeach

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
            if (totalItemsSpan) {
                totalItemsSpan.textContent = totalQuantity;
            }
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

        // Add event listeners to all add-to-cart buttons
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