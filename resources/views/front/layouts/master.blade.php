<!DOCTYPE html>
<html lang="en">

@include('front.layouts.include.head')

<body>


@include('front.layouts.include.header')

@yield('content')




@include('front.layouts.include.footer')
@yield('foot')



<script src="/front/assets/js/vendors.bundle.js"></script>
<script src="/front/assets/js/scripts.js"></script>
<script src="/front/assets/js/sweetalert.js"></script>



</body>

<!-- Mirrored from echotheme.com/educati/index-udemy.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Aug 2020 16:27:42 GMT -->
</html>



<script>
    function checkDeleteConfrim(url,parentId) {
        //    alert()
        swal({
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
</script>
