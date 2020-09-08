@extends('front.layouts.master')
@section('title','home')
@section('content')

    <div class="py-5 bg-light-v2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Shop</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Shop</a>
                        </li>
                        <li class="breadcrumb-item">
                            Single
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>






    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mr-auto mt-4">
                    <div class="border border-light p-5">
                        <img class="w-100" src="{{asset('uploads/course/').'/'.$course->photo}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 mt-4">
                    <h2>The Self-Taought Programmer</h2>
                    <p>by <a href="#" class="text-dark">Cory Althoff</a></p>
                    <ul class="list-inline">
                        <li class="list-inline-item pr-3 border-right">
                            <ul class="list-unstyled ec-review-rating font-size-12">
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                                <li class="active"><i class="fas fa-star"></i></li>
                            </ul>
                        </li>
                        <li class="list-inline-item">3 customer reviews</li>
                    </ul>
                    <h4 class="mb-3">
                        @if($course->discountprice)
                            <span class="text-primary">${{$course->discountprice}}</span>
                            <span class="text-gray"><s>${{$course->price}}</s></span>
                        @else
                            <span class="text-primary">${{$course->price}}</span>
                        @endif
                    </h4>
                    <p><i class="fas fa-check-circle text-success mr-2"></i>Available on stock</p>
                    <div class="mb-2">
                        <h4>Key Features</h4>
                        <ul class="list-unstyled list-style-icon list-icon-bullet mt-3">
                            <li>The dos and don'ts of storing passwords in a database</li>
                            <li>Exchange Rates and the Currency Conversion Tool</li>
                            <li>Building a Web Messenger with Microservices</li>
                            <li>Extending TempMessenger with a User Authentication Microservice</li>
                        </ul>
                    </div>

                    <div class="d-md-flex">
                        <div class="input-group ec-touchspin mb-2 mr-3 width-10rem">
                            <div class="ec-touchspin__minus input-group-prepend">
                                <span class="input-group-text ti ti-minus bg-white"></span>
                            </div>
                            <input class="ec-touchspin__result form-control bg-white text-center" type="text" value="1">
                            <div class="input-group-append">
                                <span class="ec-touchspin__plus input-group-text ti-plus bg-white"></span>
                            </div>
                        </div>
                        <button class="btn btn-primary mb-2 mr-3">Buy Now</button>
                        <button class="btn btn-outline-primary btn-icon mb-2 mr-3"><i class="ti-shopping-cart mr-2"></i>
                            Add to card
                        </button>
                    </div>
                    <ul class="list-inline my-3">
                        <li class="list-inline-item">Payment:</li>
                        <li class="list-inline-item"><img src="assets/img/shop/payment/paypal.jpg" alt=""></li>
                        <li class="list-inline-item"><img src="assets/img/shop/payment/mastro.jpg" alt=""></li>
                        <li class="list-inline-item"><img src="assets/img/shop/payment/mastercard.jpg" alt=""></li>
                        <li class="list-inline-item"><img src="assets/img/shop/payment/visa.jpg" alt=""></li>
                        <li class="list-inline-item"><img src="assets/img/shop/payment/ae.jpg" alt=""></li>
                    </ul>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>





    <section class="padding-y-100 bg-light-v2">
        <div class="container">
            <div class="list-card p-4 shadow-v1">
                <div class="col-12">
                    <ul class="nav justify-content-center tab-line tab-line tab-line--3x border-bottom mb-4"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#Tabs_4-1" role="tab"
                               aria-selected="true">
                                Product Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Tabs_4-2" role="tab" aria-selected="true">
                                Reviews
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Tabs_4-1" role="tabpanel">
                            <h4 class="mb-3">Details</h4>
                            <p>
                                Investig ationes demons travge vunt lectores legee lrus quodk legunt saepius claritas
                                est conctetur adip sicing. Dummy text of the printing was and typesetting industry.
                                Lorem Ipsum has been the industry standad dummy text ever since the 1500s, when an
                                unknown printer took galley of type and scrambled it make type specimen book. It has
                                survived not only five centuries also the leap into electronic typesetting remaining
                                essentially unchanged centuries also the leap into electronic.
                            </p>
                            <h4 class="mt-4 mb-3">Key Features:</h4>
                            <ul class="list-unstyled list-style-icon list-icon-bullet mt-3">
                                <li>The dos and don'ts of storing passwords in a database</li>
                                <li>Exchange Rates and the Currency Conversion Tool</li>
                                <li>Building a Web Messenger with Microservices</li>
                                <li>Extending TempMessenger with a User Authentication Microservice</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="Tabs_4-2" role="tabpanel">

                            <div class="row px-0 align-items-center border p-4">
                                <div class="col-md-4 text-center">
                                    <h1 class="display-4 text-primary mb-0">
                                        4.70
                                    </h1>
                                    <p class="my-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </p>
                                    <p class="mb-0">
                                        Average Rating
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="width-7rem text-light d-none d-sm-block mr-3">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <div class="progress flex-auto mr-3" style="height:10px">
                                            <div class="progress-bar bg-primary" style="width:100%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="20" aria-valuemax="100"></div>
                                        </div>
                                        <span>90%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="width-7rem text-light d-none d-sm-block mr-3">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress flex-auto mr-3" style="height:10px">
                                            <div class="progress-bar bg-primary" style="width:80%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="20" aria-valuemax="100"></div>
                                        </div>
                                        <span>87%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="width-7rem text-light d-none d-sm-block mr-3">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress flex-auto mr-3" style="height:10px">
                                            <div class="progress-bar bg-primary" style="width:60%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="20" aria-valuemax="100"></div>
                                        </div>
                                        <span>34%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="width-7rem text-light d-none d-sm-block mr-3">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress flex-auto mr-3" style="height:10px">
                                            <div class="progress-bar bg-primary" style="width:40%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="20" aria-valuemax="100"></div>
                                        </div>
                                        <span>12%</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="width-7rem text-light d-none d-sm-block mr-3">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="progress flex-auto mr-3" style="height:10px">
                                            <div class="progress-bar bg-primary" style="width:10%" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="20" aria-valuemax="100"></div>
                                        </div>
                                        <span>2%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row border-bottom mx-0 py-4 mt-4">
                                <div class="col-md-4 my-2 media">
                                    <img class="iconbox iconbox-xl" src="assets/img/avatar/4.jpg" alt="">
                                    <div class="media-body ml-4">
                                        <small class="text-gray">7 min ago</small>
                                        <h6>
                                            Anthony Forsey
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-8 my-2">
                                    <p>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </p>
                                    <p>
                                        Investig ationes demons travge vunt lectores legee lrus quodk legunt saepius was
                                        claritas kesty they conctetur they kedadip lectores legee sicing.
                                    </p>
                                </div>
                            </div> <!-- END row-->

                            <div class="row border-bottom mx-0 py-4 mt-4">
                                <div class="col-md-4 my-2 media">
                                    <img class="iconbox iconbox-xl" src="assets/img/avatar/5.jpg" alt="">
                                    <div class="media-body ml-4">
                                        <small class="text-gray">1 mon ago</small>
                                        <h6>
                                            Justin Nam
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-8 my-2">
                                    <p class="text-light">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                    <p>
                                        Investig ationes demons travge vunt lectores legee lrus quodk legunt saepius was
                                        claritas kesty.
                                    </p>
                                </div>
                            </div> <!-- END row-->

                            <div class="row border-bottom mx-0 py-4 mt-4">
                                <div class="col-md-4 my-2 media">
                                    <div class="iconbox iconbox-xl border">
                                        MD
                                    </div>
                                    <div class="media-body ml-4">
                                        <small class="text-gray">3 Mon ago</small>
                                        <h6>
                                            Murir Dokan
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-8 my-2">
                                    <p>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </p>
                                    <p>
                                        Investig ationes demons travge vunt lectores legee lrus quodk legunt saepius was
                                        claritas kesty they conctetur they kedadip lectores legee sicing.
                                    </p>
                                </div>
                            </div> <!-- END row-->

                            <div class="text-center mt-5">
                                <a href="#" class="btn btn-primary btn-icon">
                                    <i class="ti-reload mr-2"></i>
                                    Load More
                                </a>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12">
                                    <h4>Leave Review</h4>
                                    <ul class="list-inline mt-3">
                                        <li class="list-inline-item">
                                            Rating
                                        </li>
                                        <li class="list-inline-item">
                                            <ul class="list-unstyled ec-rating" data-state-class="text-warning">

                                                <li class="text-warning active">
                                                    <i class="fas fa-star"></i>
                                                </li>

                                                <li class="active">
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>

                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>

                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label>Subject</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-12 mt-3">
                                    <label>Comment</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                    <button class="btn btn-primary mt-4">Publish Review</button>
                                </div>
                            </div>
                        </div>  <!-- END tab-pane -->
                    </div> <!-- END tab-content-->
                </div> <!-- END col-12 -->
            </div> <!-- END list-card-->
        </div> <!-- END container-->
    </section>




    <section class="padding-y-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 text-center">
                    <h4>Related Products</h4>
                </div>
                <div class="col-lg-3 col-md-6 marginTop-30 wow fadeIn">
                    <div class="card text-center height-100p border border-light">
                        <span class="badge badge-pill badge-primary position-absolute top-20 left-10">-20%</span>
                        <div class="card-header">
                            <img class="w-100" src="assets/img/shop/products/1.jpg" alt="">
                        </div>
                        <div class="card-body px-3 py-0">
                            <a href="#" class="h6">Bootstrap Referance Guide</a>
                            <p class="text-gray">
                                Thomas Rang
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-semiBold">
                                    <span class="text-primary">$65.45</span>
                                    <span class="text-gray"><s>$80.45</s></span>
                                </p>
                                <ul class="list-unstyled ec-review-rating font-size-12">
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top-0">
                            <button class="btn btn-outline-primary mx-1">Buy Now</button>
                            <button class="btn btn-outline-light mx-1"
                                    data-container="body"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-skin="light"
                                    title="Add to card">
                                <i class="ti-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 marginTop-30 wow fadeIn">
                    <div class="card text-center height-100p border border-light">
                        <div class="card-header">
                            <img class="w-100" src="assets/img/shop/products/2.jpg" alt="">
                        </div>
                        <div class="card-body px-3 py-0">
                            <a href="#" class="h6">Beginning C++ Through example</a>
                            <p class="text-gray">
                                Micheal Dawson
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-semiBold">
                                    <span class="text-primary">$199.00</span>
                                </p>
                                <ul class="list-unstyled ec-review-rating font-size-12">
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star-half-alt"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top-0">
                            <button class="btn btn-outline-primary mx-1">Buy Now</button>
                            <button class="btn btn-outline-light mx-1"
                                    data-container="body"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-skin="light"
                                    title="Add to card">
                                <i class="ti-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 marginTop-30 wow fadeIn">
                    <div class="card text-center height-100p border border-light">
                        <div class="card-header">
                            <img class="w-100" src="assets/img/shop/products/4.jpg" alt="">
                        </div>
                        <div class="card-body px-3 py-0">
                            <a href="#" class="h6">The Self-Taought Programmer</a>
                            <p class="text-gray">
                                Alex Lebby
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-semiBold">
                                    <span class="text-primary">$99.45</span>
                                </p>
                                <ul class="list-unstyled ec-review-rating font-size-12">
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="far fa-star"></i></li>
                                    <li class="active"><i class="far fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top-0">
                            <button class="btn btn-outline-primary mx-1">Buy Now</button>
                            <button class="btn btn-outline-light mx-1"
                                    data-container="body"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-skin="light"
                                    title="Add to card">
                                <i class="ti-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 marginTop-30 wow fadeIn">
                    <div class="card text-center height-100p border border-light">
                        <div class="card-header">
                            <img class="w-100" src="assets/img/shop/products/3.jpg" alt="">
                        </div>
                        <div class="card-body px-3 py-0">
                            <a href="#" class="h6">Beginning C++ Through example</a>
                            <p class="text-gray">
                                Micheal Dawson
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-semiBold">
                                    <span class="text-primary">$199.00</span>
                                </p>
                                <ul class="list-unstyled ec-review-rating font-size-12">
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star"></i></li>
                                    <li class="active"><i class="fas fa-star-half-alt"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top-0">
                            <button class="btn btn-outline-primary mx-1">Buy Now</button>
                            <button class="btn btn-outline-light mx-1"
                                    data-container="body"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-skin="light"
                                    title="Add to card">
                                <i class="ti-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@endsection
