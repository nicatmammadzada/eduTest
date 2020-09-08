
@php $baskets = \Gloudemans\Shoppingcart\Facades\Cart::content();

@endphp

<header class="site-header bg-dark text-white-0_5">
    <div class="container">
        <div class="row align-items-center justify-content-between mx-0">
            <ul class="list-inline d-none d-lg-block mb-0">
                <li class="list-inline-item mr-3">
                    <div class="d-flex align-items-center">
                        <i class="ti-email mr-2"></i>
                        <a href="mailto:support@educati.com">support@educati.com</a>
                    </div>
                </li>
                <li class="list-inline-item mr-3">
                    <div class="d-flex align-items-center">
                        <i class="ti-headphone mr-2"></i>
                        <a href="tel:+8801740411513">+8801740411513</a>
                    </div>
                </li>
            </ul>
            <ul class="list-inline mb-0">
                <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
                    <a href="#"><i class="ti-facebook"></i></a>
                </li>
                <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                    <a href="#"><i class="ti-twitter"></i></a>
                </li>
                <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                    <a href="#"><i class="ti-vimeo"></i></a>
                </li>
                <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                    <a href="#"><i class="ti-linkedin"></i></a>
                </li>
            </ul>
            <ul class="list-inline mb-0">
                <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">
                    <a href="{{route('login')}}">Login</a>
                </li>
                <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-white-0_1">
                    <a href="{{route('register')}}">Register</a>
                </li>
            </ul>
        </div> <!-- END END row-->
    </div> <!-- END container-->
</header><!-- END site header-->


<nav class="ec-nav sticky-top bg-white">
    <div class="container">
        <div class="navbar p-0 navbar-expand-lg">
            <div class="navbar-brand">
                <a class="logo-default" href="{{route('home')}}"><img alt="" src="/front/assets/img/logo-black.png"></a>
            </div>
            <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible"
                  data-toggle="collapse">
        <div class="hamburger hamburger--spin js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </span>
            <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
                <ul class="nav navbar-nav ec-nav__navbar ml-auto">

                    <li class="nav-item nav-item__has-megamenu megamenu-col-2">
                        <a class="nav-link " href="{{route('home')}}" >Home</a>

                    </li>

                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link " href="{{route('blog.index')}}" > About </a>
                    </li>

                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Courses</a>
                        <ul class="dropdown-menu">
                            <li><a href="" class="nav-link__list">All Courses</a></li>
                            @foreach($categorys as $category)
                                <li><a href="{{route('course.index',$category->slug)}}"
                                       class="nav-link__list">{{$category->name ?? ''}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </li>



                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Services</a>
                        <ul class="dropdown-menu">
                            <li><a href="" class="nav-link__list">All Courses</a></li>
                            @foreach($categorys as $category)
                                <li><a href="{{route('course.index',$category->slug)}}"
                                       class="nav-link__list">{{$category->name ?? ''}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </li>




                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link " href="{{route('blog.index')}}" > Blog </a>
                    </li>



                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link " href="{{route('post.index')}}" > News </a>
                    </li>


                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Lang </a>
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                @foreach($langs as $lang)
                                    <li>
                                        <a class="nav-link__list"
                                           href="{{route('choose.lang',$lang->dil)}}"> {{$lang->dil}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </li>


                    <li class="nav-item nav-item__has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Contact</a>

                    </li>
                </ul>
            </div>
            <div class="nav-toolbar">
                <ul class="navbar-nav ec-nav__navbar">
                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link dropdown-toggle no-caret" href="{{route('basket.index')}}"
                           data-toggle="dropdown"><i
                                class="ti-shopping-cart"></i></a>
                        <ul class="dropdown-menu dropdown-cart" aria-labelledby="navbarDropdown">

                            @if($baskets && count($baskets)>0)
                                @foreach($baskets as $course)
                                    <li class="dropdown-cart__item">
                                        <div class="media">
                                            <img class="dropdown-cart__img" src="{{asset('uploads/course/').'/'.$course->options->photo}}"
                                                 alt="">
                                            <div class="media-body pl-3">
                                                <a href="#" class="h6">{{$course->name}}</a>
                                                <span class="text-primary">${{$course->price}}</span>
                                            </div>
                                        </div>
                                        <a href="#" class="dropdown-cart__item-remove">
                                            <i class="ti-close"></i>
                                        </a>
                                    </li>
                                @endforeach
                            @endif

                            <li class="px-2 py-4 text-center">
                                Subtotal: <span class="text-primary font-weight-semiBold"> $145</span>
                            </li>
                            <li class="px-2 pb-4 text-center">
                                <a href="{{route('basket.index')}}" class="btn btn-outline-primary mx-1">View Cart</a>
                                <button class="btn btn-primary mx-1">Checkout</button>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link site-search-toggler" href="#">
                            <i class="ti-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <!-- END container-->
</nav> <!-- END ec-nav -->

<div class="site-search">
    <div class="site-search__close bg-black-0_8"></div>
    <form class="form-site-search" action="#" method="POST">
        <div class="input-group">
            <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
            </div>
        </div>
    </form>
</div> <!-- END site-search-->
