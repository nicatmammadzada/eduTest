@extends('front.layouts.master')
@section('title','home')
@section('content')
    <div class="padding-y-60 bg-cover" data-dark-overlay="6"
         style="background:url(/front/assets/img/breadcrumb-bg.jpg) no-repeat">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 my-2 text-white">
                    <ol class="breadcrumb breadcrumb-double-angle bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Courses</a></li>
                        <li class="breadcrumb-item">All Courses</li>
                    </ol>
                    <h2 class="h1">
                        All Courses Gird
                    </h2>
                    <p class="lead">
                        <span class="text-primary">6,178</span> courses found
                    </p>
                </div>
                <form class="col-lg-5 my-2 ml-auto">
                    <div class="input-group bg-white rounded p-1">
                        <input type="text" class="form-control border-white" placeholder="What do you want to learn?"
                               required="">
                        <div class="input-group-append">
                            <button class="btn btn-info rounded" type="submit">
                                Search
                                <i class="ti-angle-right small"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <section class="py-3 position-relative shadow-v1">
        <div class="container">
            <form class="row">
                <div class="col-md-6 my-2">
                    <ul class="list-inline">
                        <li class="list-inline-item my-2">
                            <select class="form-control">
                                <option selected>Select Category</option>
                                @foreach($categorys as $category)
                                    <option>{{$category->name}}</option>
                                @endforeach

                            </select>
                        </li>
                        <li class="list-inline-item my-2">
                            <select class="form-control">
                                <option selected>Filter</option>
                                <option>Best selling</option>
                                <option>Newest</option>
                                <option>Top rated</option>
                                <option>Low price</option>
                                <option>High price</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 my-2 text-md-right">
                    <div class="d-inline-flex justify-md-content-end">
                        <select class="form-control my-2">
                            <option selected default>items per page</option>
                            <option>8</option>
                            <option>12</option>
                            <option>16</option>
                            <option>20</option>
                            <option>24</option>
                        </select>
                        <div class="d-flex rounded border ml-3 px-2 my-2">
                            <a href="page-sp-all-courcess.html" class="active btn px-1">
                                <ti class="ti-layout-grid2"></ti>
                            </a>
                            <a href="page-sp-all-courcess-list.html" class="btn px-1">
                                <ti class="ti-view-list"></ti>
                            </a>
                        </div>
                    </div>
                </div>
            </form> <!-- END row-->
        </div> <!-- END container-->
    </section>




    <section class="padding-y-60 bg-light-v2">
        <div class="container">
            <div class="row">

                @if($courses->count()>0)
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 marginTop-30">
                            <div href="page-course-details.html" class="card height-100p text-gray shadow-v1">
                                <img class="card-img-top" style="height: 220px;width: 360px;"
                                     src="{{asset('uploads/course/').'/'.$course->photo}}" alt="">
                                <div class="card-body">
                                    {{--           <span class="badge position-absolute top-0 bg-danger text-white" data-offset-top="-13">--}}
                                    {{--             Trending--}}
                                    {{--           </span>--}}
                                    <a href="{{route('course.detail',$course->slug)}}" class="h5">
                                        Visual Basic Essential Training For Begainers
                                    </a>
                                    {{--                            <p class="my-3">--}}
                                    {{--                                <i class="ti-user mr-2"></i>--}}
                                    {{--                                Andrew Mead, John Doe--}}
                                    {{--                            </p>--}}
                                    {{--                            <p class="mb-0">--}}
                                    {{--                                <i class="fas fa-star text-warning"></i>--}}
                                    {{--                                <i class="fas fa-star text-warning"></i>--}}
                                    {{--                                <i class="fas fa-star text-warning"></i>--}}
                                    {{--                                <i class="fas fa-star text-warning"></i>--}}
                                    {{--                                <i class="fas fa-star text-warning"></i>--}}
                                    {{--                                <span class="text-dark">5</span>--}}
                                    {{--                                <span>(4578)</span>--}}
                                    {{--                            </p>--}}
                                </div>
                                <div class="card-footer media align-items-center justify-content-between">
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-1">
                                            <i class="ti-headphone small mr-2"></i>
                                            {{$course->lectures ?? ''}} lectures
                                        </li>
                                        <li class="mb-1">
                                            <i class="ti-time small mr-2"></i>
                                            {{$course->hours ?? ''}} hours
                                        </li>
                                        <li class="btn btn-primary mb-1" style="width: 100%"
                                            onclick="addCart({{$course->id}})">
                                            <i class="ti-shopping-cart small mr-2"></i>

                                            Add to cart
                                        </li>
                                    </ul>
                                    <h4 class="h5 text-right">
                                        @if($course->discountprice)
                                            <span class="text-primary">{{$course->discountprice}}</span>
                                            <span class="d-block text-gray"><s>${{$course->price}}</s></span>
                                        @else
                                            <span class="text-primary">${{$course->price}}</span>
                                        @endif
                                    </h4>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif


                <div class="col-12 marginTop-70">
                    <ul class="pagination pagination-primary justify-content-center">
                        {{$courses->links()}}
                    </ul>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>




@endsection
@section('foot')


    <script>


        function addCart(id) {
            var url = "/basket/add";
            var qty = 1;
            // var qty = document.getElementById('quantity').value

            $.ajax({
                url: url,
                data: {"_token": "{{ csrf_token() }}", id: id, qty: qty},
                type: 'POST',
                success: function (response) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Məhsul səbətə əlavə olundu',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    location.reload()


                }
            });

        }


        function showProduct(id) {


            var url = "/basket/show-product";
            var id = id;
            $.ajax({
                url: url,
                data: {"_token": "{{ csrf_token() }}", id: id},
                type: 'POST',
                success: function (response) {


                    document.getElementById('sebet').innerHTML = response

                    $('#sebet').modal();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Məhsul səbətə əlavə olundu',
                        showConfirmButton: false,
                        timer: 1500
                    })


                }
            });
        }


    </script>





@endsection
