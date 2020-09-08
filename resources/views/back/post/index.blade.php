@extends('back.layouts.master')
@section('title',$title)
@section('head')

    <!-- Theme JS files -->
    <script type="text/javascript" src="/back/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript"
            src="/back/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/pages/datatables_responsive.js"></script>

    <style>
        .bbb{
            width: 100px!important;
        }
    </style>
@endsection
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    @include('back.layouts.include.alert-messages')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{$title}}</h5>
            <div class="heading-elements">
                <a href="{{route('admin.post.create')}}"><span class="label label-success">YENİ POST</span></a>
            </div>
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>

                <th></th>
                <th>Şəkil</th>
                <th class="bbb">title</th>
                <th class="text-center">Düzəlişlər</th>
                <th>Yenilənmə Tarixi</th>

            </tr>
            </thead>
            <tbody>
            @if($posts->count()>0)
                @foreach($posts as $key=>$post)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            <a href="{{route('admin.post.edit',$post->slug)}}">
                                <img style="width: 50px;" src="{{asset("uploads/post").'/'.$post->photo}}" alt="">
                            </a>
                        </td>
                        <td class="bbb"><a href="{{route('admin.post.edit',$post->slug)}}">{{$post->title}}</a></td>












                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('admin.post.edit',$post->slug)}}"><i
                                                    class="icon-database-edit2"></i> Yenilə</a></li>
                                        <li>
                                            <a onclick='checkDeleteConfrim("{{route('admin.post.destroy',$post->slug)}}")'><i
                                                    class="icon-database-remove"></i> Sil</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                        <td>{{$post->post_updated_at()}}</td>



                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection

@section('foot')
    <script>
        function checkDeleteConfrim(url, parentId) {
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

    <script>
        function choose1(id, event) {
            var url = '{{route('admin.post.choose1')}}';
            checked(id, event, url)
        }
    </script>

    <script>
        function choose2(id, event) {
            var url = '{{route('admin.post.choose2')}}';
            checked(id, event, url)
        }
    </script>

    <script>
        function eventt(id, event) {
            var url = '{{route('admin.post.event')}}';
            checked(id, event, url)
        }
    </script>


    <script>
        function sem(id, event) {
            var url = '{{route('admin.post.sem')}}';
            checked(id, event, url)
        }
    </script>


    <script>
        function analitika1(id, event) {
            var url = '{{route('admin.post.analitika1')}}';
            checked(id, event, url)
        }
    </script>
    <script>
        function analitika2(id, event) {
            var url = '{{route('admin.post.analitika2')}}';
            checked(id, event, url)
        }
    </script>
    <script>
        function mobile(id, event) {
            var url = '{{route('admin.post.mobile')}}';
            checked(id, event, url)
        }
    </script>
    <script>
        function checked(id, event, route) {
            if (event.checked) {
                var value = 1;
            } else {
                var value = 0;
            }
            var url = route;
            $.ajax({
                url: url,
                data: {"_token": "{{ csrf_token() }}", id: id, value: value},
                type: 'POST',
                success: function (response) {

                }
            })
        }
    </script>
@endsection


