@extends('back.layouts.master')
@section('title',$title)
@section('head')

    <!-- Theme JS files -->
    <script type="text/javascript" src="/back/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript"
            src="/back/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/pages/datatables_responsive.js"></script>
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
                <a href="{{route('admin.video.create')}}"><span class="label label-success">YENİ Video</span></a>
            </div>
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>
                <th>No</th>
                <th>Şəkil</th>
                <th>Text</th>
                <th>Yenilənmə Tarixi</th>
                <th class="text-center">Düzəlişlər</th>
            </tr>
            </thead>
            <tbody>
            @if($videos->count()>0)
                @foreach($videos as $key=>$video)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            <a href="{{asset("uploads/videos").'/'.$video->video}}">
                                <img style="width: 50px;" src="{{asset("uploads/videos").'/'.$video->photo}}" alt="">
                            </a>
                        </td>


                        <td><a href="{{route('admin.video.edit',$video->id)}}">{{$video->text}}</a></td>

                        <td>{{$video->video_updated_at()}}</td>


                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('admin.video.edit',$video->id)}}"><i
                                                    class="icon-database-edit2"></i> Yenilə</a></li>
                                        <li>
                                            <a onclick='checkDeleteConfrim("{{route('admin.video.destroy',$video->id)}}")'><i
                                                    class="icon-database-remove"></i> Sil</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
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
            if (event.checked) {
                var value = 1;
            } else {
                var value = 0;
            }


            var url = '{{route('admin.post.choose1')}}';
            $.ajax({
                url: url,
                data: {"_token": "{{ csrf_token() }}", id: id, value: value},
                type: 'POST',
                success: function (response) {

                }
            })
        }
    </script>


    <script>
        function choose2(id, event) {
            if (event.checked) {
                var value = 1;
            } else {
                var value = 0;
            }

            var url = '{{route('admin.post.choose2')}}';
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

