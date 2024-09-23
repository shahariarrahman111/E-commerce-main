<!-- Checkout Section Start -->
<div class="checkout-section ptb-120">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-8">
                <!-- Address Section -->
                <div class="checkout-steps">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-5">Shipment Address</h4>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addAddressModal" class="fw-semibold">
                            <i class="fas fa-plus me-1"></i> Add Address
                        </a>
                    </div>

                    <div class="row g-4">
                        @foreach ($addresses as $address)
                            <div class="col-lg-6 col-sm-6">
                                <div class="tt-address-content">
                                    <input type="radio" class="tt-custom-radio" name="shipment_address"
                                        id="shipment-address-{{ $loop->index }}" value="{{ $address->id }}" {{ $loop->first ? 'checked' : '' }}>
                                    <label for="shipment-address-{{ $loop->index }}"
                                        class="tt-address-info bg-white rounded p-4 pb-10 position-relative"
                                        data-address-id="{{ $address->id }}">
                                        <strong>{{ $address->division }}, {{ $address->city }}</strong>
                                        <address class="fs-sm mb-0">
                                            Road No: {{ $address->road_no }}<br>
                                            House No: {{ $address->house_no }}
                                        </address>
                                        <a href="#" class="tt-edit-address checkout-radio-link position-absolute"
                                            data-address="{{ json_encode($address) }}">Edit</a>
                                        <a href="#"
                                            class="tt-delete-address checkout-radio-link position-absolute text-danger"
                                            data-address-id="{{ $address->id }}">Delete</a>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Add Address Modal -->
                <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAddressModalLabel">Add New Address</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('address.add') }}" method="POST" id="addAddressForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname"
                                            value="{{ $profileData->firstname }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname"
                                            value="{{ $profileData->lastname }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $profileData->phone }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $profileData->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="division" class="form-label">Division</label>
                                        <input type="text" class="form-control" id="division" name="division" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="road_no" class="form-label">Road No</label>
                                        <input type="text" class="form-control" id="road_no" name="road_no" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="house_no" class="form-label">House No</label>
                                        <input type="text" class="form-control" id="house_no" name="house_no" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Address</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Address Modal -->
                <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST" id="editAddressForm">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" id="edit_address_id" name="id">
                                    <div class="mb-3">
                                        <label for="edit_firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="edit_firstname" name="firstname"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="edit_lastname" name="lastname"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="edit_phone" name="phone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="edit_email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_division" class="form-label">Division</label>
                                        <input type="text" class="form-control" id="edit_division" name="division"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="edit_city" name="city" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_road_no" class="form-label">Road No</label>
                                        <input type="text" class="form-control" id="edit_road_no" name="road_no"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_house_no" class="form-label">House No</label>
                                        <input type="text" class="form-control" id="edit_house_no" name="house_no"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Address</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="checkout-sidebar">
                    <div class="sidebar-widget checkout-sidebar py-6 px-4 bg-white rounded-2">
                        <div class="widget-title d-flex">
                            <h5 class="mb-0 flex-shrink-0">Order Summary</h5>
                            <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                        </div>
                        <table class="sidebar-table w-100 mt-5">
                            <tr>
                                <td id="total-cart-items">Items(0):</td>
                                <td id="total-item-price" class="text-end">TK. 0.00</td>
                            </tr>
                            <tr>
                                <td>Delivery Charge:</td>
                                <td class="text-end" id="delivery-charge">TK. 0.00</td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <td class="text-end" id="grand-total">TK. 0.00</td>
                            </tr>
                        </table>
                        <span class="sidebar-spacer d-block my-4 opacity-50"></span>

                        <!-- Order Form Integration -->
                        <form action="{{ route('order.store') }}" method="POST" id="orderForm">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="address_id" id="address_id" value="">
                            <input type="hidden" name="total_price" id="total_price" value="">
                            <input type="hidden" id="payment_method" name="payment_method" value="cashondelivery">

                            <!-- Dynamic Items -->
                            <div id="dynamic-items"></div>

                            <div class="mb-4">
                                <h5>Select Payment Method</h5>
                                <div>
                                    <input type="radio" id="cashondelivery" name="payment_method" value="cashondelivery"
                                        checked>
                                    <label for="cashondelivery">Cash on Delivery</label>
                                </div>
                                <div>
                                    <input type="radio" id="sslcommerz" name="payment_method" value="sslcommerz">
                                    <label for="sslcommerz">Online Payment</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-md rounded mt-6 w-100">Place Order</button>
                            <p class="mt-3 mb-0 fs-xs">By placing your order you agree to our company <a
                                    href="#">Privacy-policy</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout Section End -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const orderForm = document.getElementById('orderForm');

        function calculateTotals() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let totalItems = 0;
            let totalItemPrice = 0;

            cart.forEach(item => {
                totalItems += parseInt(item.quantity);
                totalItemPrice += parseFloat(item.price) * parseInt(item.quantity);
            });

            const deliveryCharge = 120;

            document.getElementById('total-cart-items').textContent = `Items(${totalItems}):`;
            document.getElementById('total-item-price').textContent = `TK. ${totalItemPrice.toFixed(2)}`;
            document.getElementById('delivery-charge').textContent = `TK. ${deliveryCharge.toFixed(2)}`;
            const grandTotal = totalItemPrice + deliveryCharge;
            document.getElementById('grand-total').textContent = `TK. ${grandTotal.toFixed(2)}`;
            document.getElementById('total_price').value = grandTotal.toFixed(2);
        }

        function populateDynamicItems() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const dynamicItemsContainer = document.getElementById('dynamic-items');
            dynamicItemsContainer.innerHTML = '';

            cart.forEach((item, index) => {
                const productIdField = document.createElement('input');
                productIdField.type = 'hidden';
                productIdField.name = `items[${index}][product_id]`;
                productIdField.value = item.id;

                const quantityField = document.createElement('input');
                quantityField.type = 'hidden';
                quantityField.name = `items[${index}][quantity]`;
                quantityField.value = item.quantity;

                const unitPriceField = document.createElement('input');
                unitPriceField.type = 'hidden';
                unitPriceField.name = `items[${index}][unit_price]`;
                unitPriceField.value = item.price;

                const productNameField = document.createElement('input');
                productNameField.type = 'hidden';
                productNameField.name = `items[${index}][product_name]`;
                productNameField.value = item.name;

                const productCategoryField = document.createElement('input');
                productCategoryField.type = 'hidden';
                productCategoryField.name = `items[${index}][product_category]`;
                productCategoryField.value = item.category || 'General';

                dynamicItemsContainer.appendChild(productIdField);
                dynamicItemsContainer.appendChild(quantityField);
                dynamicItemsContainer.appendChild(unitPriceField);
                dynamicItemsContainer.appendChild(productNameField);
                dynamicItemsContainer.appendChild(productCategoryField);
            });
        }

        document.querySelectorAll('input[name="shipment_address"]').forEach(radio => {
            radio.addEventListener('change', function () {
                document.getElementById('address_id').value = this.value;
            });
        });

        const initialSelectedAddress = document.querySelector('input[name="shipment_address"]:checked');
        if (initialSelectedAddress) {
            document.getElementById('address_id').value = initialSelectedAddress.value;
        }

        populateDynamicItems();
        calculateTotals();

        orderForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            document.getElementById('payment_method').value = paymentMethod;

            if (paymentMethod === 'sslcommerz') {
                fetch('{{ route('pay.sslcommerz') }}', {
                    method: 'POST',
                    body: new FormData(orderForm),
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.redirect_url) {
                            window.location.href = data.redirect_url;
                        } else {
                            alert('Failed to initiate payment: ' + (data.message || 'Unknown error'));
                        }
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                        alert('An error occurred. Please try again.');
                    });
            } else {
                orderForm.submit();
            }
        });
    });
</script>