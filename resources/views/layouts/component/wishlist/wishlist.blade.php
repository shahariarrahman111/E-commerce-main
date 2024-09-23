<!--wishlist section start-->
<section class="wishlist-section pt-10">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wishlist-table bg-white">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Stock Status</th>
                                <th class="text-center">Unit Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="wishlist-items">
                            <!-- Wishlist items will be dynamically inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--wishlist section end-->

<script>
    function renderWishlistItems() {
        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const wishlistItemsContainer = document.getElementById('wishlist-items');

        wishlistItemsContainer.innerHTML = ''; // Clear the container

        wishlist.forEach(item => {
            const tr = document.createElement('tr');

            tr.innerHTML = `
            <td class="text-center thumbnail">
                <img src="${item.photo}" alt="${item.name}" class="img-fluid">
            </td>
            <td>
                <h6 class="mb-1 mt-1">${item.name}</h6>
            </td>
            <td class="text-center">
                <span class="stock-status ${item.inStock ? 'text-success' : 'text-danger'} fw-bold">${item.inStock ? 'In Stock' : 'Out of Stock'}</span>
            </td>
            <td class="text-center">
                <span class="price fw-bold text-dark">TK. ${item.price}</span>
            </td>
            <td class="text-center">
                <a href="#" class="btn btn-secondary btn-sm add-to-cart" data-id="${item.id}" data-name="${item.name}" data-price="${item.price}" data-photo="${item.photo}">Add to Cart</a>
                <a href="#" class="btn btn-danger btn-sm remove-from-wishlist" data-id="${item.id}"><i class="fas fa-close"></i></a>
            </td>
        `;

            wishlistItemsContainer.appendChild(tr);
        });

        // Add event listeners to all add to cart buttons in wishlist
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default action
                addToCart(button); // Add product to cart
            });
        });

        // Add event listeners to all remove from wishlist buttons
        document.querySelectorAll('.remove-from-wishlist').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default action
                removeFromWishlist(button); // Remove product from wishlist
            });
        });
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

    // Function to handle removing product from wishlist
    function removeFromWishlist(button) {
        const id = button.dataset.id;

        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

        wishlist = wishlist.filter(item => item.id != id);

        localStorage.setItem('wishlist', JSON.stringify(wishlist));

        renderWishlistItems(); // Re-render wishlist items
    }

    // Function to handle adding product to wishlist
    function addToWishlist(button) {
        const id = button.dataset.id;
        const name = button.dataset.name;
        const price = button.dataset.price;
        const photo = button.dataset.photo;
        const inStock = button.dataset.instock === 'true'; // Ensure boolean value

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

    document.addEventListener('DOMContentLoaded', () => {
        renderWishlistItems(); // Render wishlist items on page load
        renderTotalCartItems(); // Render total cart items count on page load
    });
</script>