<!-- category section start -->
<section class="gshop-category-section bg-white pt-120 position-relative z-1 overflow-hidden">
    <div class="container">
        <div class="gshop-category-box border-secondary rounded-3 bg-white">
            <div class="text-center section-title">
                <h4 class="d-inline-block px-2 bg-white mb-4">Our Top Categories</h4>
            </div>
            <div class="row justify-content-center g-4">
                @foreach ($categories as $category)
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="gshop-animated-iconbox py-5 px-4 text-center border rounded-3 position-relative overflow-hidden">
                            <div class="animated-icon d-inline-flex align-items-center justify-content-center rounded-circle position-relative">
                                <img src="{{ asset('upload/admin_images/' . $category->photo) }}" alt="Category Image" class="img-fluid">
                            </div>
                            <a href="{{ route('customer.category.product', $category->id) }}" class="text-dark fs-sm fw-bold d-block mt-3">{{ $category->category_name }}</a>
                            <span class="total-count position-relative ps-3 fs-sm fw-medium doted-primary">{{ $category->products->count() }}</span>
                            <a href="{{ route('customer.category.product', $category->id) }}" class="explore-btn position-absolute"><i class="fa-solid fa-arrow-up"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section> <!-- category section end -->