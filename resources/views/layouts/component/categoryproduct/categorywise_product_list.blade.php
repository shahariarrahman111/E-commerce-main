<!-- Shop grid section start -->
<section class="gshop-gshop-grid ptb-120">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-3">
                <div class="gshop-sidebar bg-white rounded-2 overflow-hidden">
                    <div class="sidebar-widget search-widget bg-white py-5 px-4">
                        <div class="widget-title d-flex">
                            <h6 class="mb-0 flex-shrink-0">Search Now</h6>
                            <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                        </div>
                        <form class="search-form d-flex align-items-center mt-4">
                            <input type="text" placeholder="Search...">
                            <button type="submit" class="submit-icon-btn-secondary"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="shop-grid">
                    <div
                        class="listing-top d-flex align-items-center justify-content-between flex-wrap gap-3 bg-white rounded-2 px-4 py-5 mb-6">
                        <p class="mb-0 fw-bold">Showing 1-12 of {{ $products->count() }} results</p>
                        <div class="listing-top-right text-end d-inline-flex align-items-center gap-3 flex-wrap">
                            <div class="number-count-filter d-flex align-items-center gap-3">
                                <label class="fw-bold fs-xs text-dark flex-shrink-0">Show:</label>
                                <input type="number" value="16">
                            </div>
                            <div class="select-filter d-inline-flex align-items-center gap-3">
                                <label class="fw-bold fs-xs text-dark flex-shrink-0">Sort by:</label>
                                <select class="form-select fs-xxs fw-medium theme-select select-sm">
                                    <option>News First</option>
                                    <option>Best Selling</option>
                                    <option>Best Rated</option>
                                </select>
                            </div>
                            <a href="#" class="grid-btn active">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.97196 0H1.37831C0.706579 0 0.160156 0.546422 0.160156 1.21815V5.8118C0.160156 6.48353 0.706579 7.02996 1.37831 7.02996H5.97196C6.64369 7.02996 7.19011 6.48353 7.19011 5.8118V1.21815C7.19 0.546422 6.64369 0 5.97196 0Z"
                                        fill="#FF7C08" />
                                    <path
                                        d="M14.9407 0H10.3471C9.67533 0 9.12891 0.546422 9.12891 1.21815V5.8118C9.12891 6.48353 9.67533 7.02996 10.3471 7.02996H14.9407C15.6124 7.02996 16.1589 6.48353 16.1589 5.8118V1.21815C16.1589 0.546422 15.6124 0 14.9407 0Z"
                                        fill="#FF7C08" />
                                    <path
                                        d="M5.97196 8.96973H1.37831C0.706579 8.96973 0.160156 9.51609 0.160156 10.1878V14.7815C0.160156 15.4532 0.706579 15.9996 1.37831 15.9996H5.97196C6.64369 15.9996 7.19011 15.4532 7.19011 14.7815V10.1878C7.19 9.51609 6.64369 8.96973 5.97196 8.96973Z"
                                        fill="#FF7C08" />
                                    <path
                                        d="M14.9407 8.96973H10.3471C9.67533 8.96973 9.12891 9.51615 9.12891 10.1879V14.7815C9.12891 15.4533 9.67533 15.9997 10.3471 15.9997H14.9407C15.6124 15.9996 16.1589 15.4532 16.1589 14.7815V10.1878C16.1589 9.51609 15.6124 8.96973 14.9407 8.96973Z"
                                        fill="#FF7C08" />
                                </svg>
                            </a>
                            <a href="#" class="grid-btn">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.31378 0C1.12426 0 0.160156 0.9641 0.160156 2.15359C0.160156 3.34309 1.12426 4.30722 2.31378 4.30722C3.50328 4.30722 4.46738 3.34312 4.46738 2.15359C4.46738 0.964066 3.50328 0 2.31378 0ZM2.31378 5.74293C1.12426 5.74293 0.160156 6.70706 0.160156 7.89656C0.160156 9.08608 1.12426 10.0502 2.31378 10.0502C3.50328 10.0502 4.46738 9.08608 4.46738 7.89656C4.46738 6.70706 3.50328 5.74293 2.31378 5.74293ZM2.31378 11.4859C1.12426 11.4859 0.160156 12.45 0.160156 13.6395C0.160156 14.829 1.12426 15.7931 2.31378 15.7931C3.50328 15.7931 4.46738 14.829 4.46738 13.6395C4.46738 12.45 3.50328 11.4859 2.31378 11.4859ZM8.05671 3.58933H19.5426C20.3358 3.58933 20.9783 2.94683 20.9783 2.15359C20.9783 1.36036 20.3358 0.717853 19.5426 0.717853H8.05671C7.26348 0.717853 6.62097 1.36036 6.62097 2.15359C6.62097 2.94683 7.26348 3.58933 8.05671 3.58933ZM19.5426 6.46082H8.05671C7.26348 6.46082 6.62097 7.10332 6.62097 7.89656C6.62097 8.68979 7.26348 9.3323 8.05671 9.3323H19.5426C20.3358 9.3323 20.9783 8.68979 20.9783 7.89656C20.9783 7.10332 20.3358 6.46082 19.5426 6.46082ZM19.5426 12.2038H8.05671C7.26348 12.2038 6.62097 12.8463 6.62097 13.6395C6.62097 14.4327 7.26348 15.0752 8.05671 15.0752H19.5426C20.3358 15.0752 20.9783 14.4327 20.9783 13.6395C20.9783 12.8463 20.3358 12.2038 19.5426 12.2038Z"
                                        fill="#5D6374" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="row g-4 justify-content-center">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-10">
                                <a href="">
                                    <div
                                        class="vertical-product-card rounded-2 position-relative border-0 bg-white bg-white">
                                        <div class="thumbnail position-relative text-center p-4">
                                            <img src="{{ asset('upload/admin_images/' . $product->photo) }}"
                                                alt="{{ $product->name }}" class="product-image">
                                        </div>
                                        <div class="card-content">
                                            <a href=""
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
                        <li><a href="#"><i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop grid section end -->

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
@endsection