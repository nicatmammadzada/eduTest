@extends('front.layouts.master')
@section('title','home')


@section('content')




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
                            Cart
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>






    <section class="padding-y-150">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($courses as $course)
                                <tr>
                                    <td class="p-4">
            <span class="d-inline-block width-7rem border p-3 mr-3">
             <img src="{{asset('uploads/course/').'/'.$course->options->photo}}" alt="">
            </span>
                                        <a href="#">{{$course->name}}</a>
                                    </td>
                                    <td>${{$course->price}}</td>
                                    <td class="text-center">
                                        <div class="input-group ec-touchspin width-7rem mx-auto">
                                            <div data-id="{{$course->rowId}}" onclick="update(this.dataset.id)"
                                                 class="ec-touchspin__minus input-group-prepend">
                                                <span class="input-group-text ti ti-minus bg-white p-2"></span>
                                            </div>
                                            <input data-id="{{$course->rowId}}" id="{{$course->rowId}}"
                                                   class="ec-touchspin__result form-control bg-white text-center p-1"
                                                   type="text" value="{{$course->qty}}"
                                                   onblur="update(this.dataset.id)">
                                            <div data-id="{{$course->rowId}}" onclick="update(this.dataset.id)"
                                                 class="input-group-append">
                                                <span
                                                    class="ec-touchspin__plus input-group-text ti-plus bg-white p-2"></span>
                                            </div>


                                        </div>
                                    </td>
                                    <td>${{$course->subtotal}}</td>
                                    <td class="text-center">
                                        <a href="{{route('basket.destroy',$course->id)}}" ><i
                                                class="ti-close"></i></a>
                                    </td>
                                </tr>
                            @endforeach


                            <tr>
                                <td colspan="3" class="p-4">
                                    <form class="form-inline">
                                        <input type="text" class="form-control" placeholder="Promocode" required>
                                        <button type="submit" class="btn btn-primary ml-2">Submit</button>
                                    </form>
                                </td>
                                <td colspan="3">
                                    Total: <span class="font-weight-semiBold font-size-18">$500.00</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- END col-12 -->

                <div class="col-md-6 mt-4">
                    <a href="shop.html" class="btn btn-outline-light btn-icon"> <i
                            class="ti-angle-double-left mr-2"></i> Back to shopping</a>
                </div> <!-- END col-md-6 -->
                <div class="col-md-6 mt-4 text-right">
                    <button href="shop.html" class="btn btn-outline-light">Update cart</button>
                    <button href="shop.html" class="btn btn-primary ml-3">Checkout</button>
                </div> <!-- END col-md-6 -->
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>





@endsection

@section('foot')

    <script src="/back/assets/js/sweetalert.js"></script>

    <script>

        // swal({
        //     title: "Silmək istədiynizdən əminsizmi?",
        //     text: "Silinəndən sonra bu əməliyyatı bərpa edə bilməyəcəksiniz!",
        //     icon: "warning",
        //     buttons: true,
        //     dangerMode: true,
        // })
        //     .then((willDelete) => {
        //         if (willDelete) {
        //             location.href = url;
        //         } else {
        //             swal("Heç bir əməliyyat aparılmadı");
        //         }
        //     });


        function checkDeleteConfrim(url, parentId) {

            Swal({
                title: "Silmək istədiynizdən əminsizmi?",
                text: "Silinəndən sonra bu əməliyyatı bərpa edə bilməyəcəksiniz!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        location.href = url;
                    } else {
                        swal("Heç bir əməliyyat aparılmadı");
                    }
                });


        }


        function update(id) {
            var url = "/basket/update";
            var qty = document.getElementById(id).value;
            $.ajax({
                url: url,
                data: {"_token": "{{ csrf_token() }}", id: id, qty: qty},
                type: 'POST',
                success: function (response) {
                    // sweetAlert()
                    location.reload()
                }
            });

        }
    </script>
@endsection
