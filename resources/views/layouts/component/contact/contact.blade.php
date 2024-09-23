<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!--contact us section start-->
<section class="contact-us-section position-relative overflow-hidden z-1 pt-80 pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="breadcrumb-content">
                    <h2 class="mb-2 text-center">Get In Touch</h2>
                    <nav>
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item fw-bold" aria-current="page"><a
                                    href="{{ route('customer.index') }}">Home</a></li>
                            <li class="breadcrumb-item fw-bold" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="contact-box rounded-2 bg-white overflow-hidden mt-8">
            <div class="container">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="contact-left-box position-relative overflow-hidden z-1 bg-primary p-6 d-flex flex-column h-100"
                            data-background={{ asset('backend/assets/images/shapes/circle-half-fill.png') }}>
                            <img src={{ asset('backend/assets/images/shapes/texture-overlay.png') }} alt="texture"
                                class="position-absolute w-100 h-100 start-0 top-0 z--1">
                            <h3 class="text-white mb-3">Contact Details</h3>
                            <p class="fs-sm text-white"><strong>Office Address-1:</strong> Kallyanpur, Dhaka, Bangladesh
                                - 2542 </p>
                            <p class="fs-sm text-white mb-0"><strong>Office Address-2:</strong> Mirpur-1, Dhaka,
                                Bangladesh - 2542</p>
                            <span class="spacer my-5"></span>
                            <ul class="contact-list">
                                <li class="d-flex align-items-center gap-3 flex-wrap">
                                    <span
                                        class="icon d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </span>
                                    <div class="info">
                                        <span class="fw-medium text-white fs-xs">Emergency Call</span>
                                        <h5 class="mb-0 mt-1 text-white">+8801788888888</h5>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-3 flex-wrap mt-3">
                                    <span
                                        class="icon d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                                        <i class="fa-regular fa-envelope"></i>
                                    </span>
                                    <div class="info">
                                        <span class="fw-medium text-white fs-xs">General Communication</span>
                                        <p class="mb-0 mt-1 text-white fw-medium">medicine@gmail.com</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="mt-5">
                                <span class="fw-bold text-white mb-3 d-block">Social Share:</span>
                                <div class="social-links d-flex align-items-center gap-2">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                    <a href="#"><i class="fab fa-discord"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--contact us section end-->