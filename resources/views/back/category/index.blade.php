@extends('back.layouts.master')
@section('title','course')
@section('head')

    <!-- Theme JS files -->
    <script type="text/javascript" src="/back/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/pages/datatables_responsive.js"></script>
@endsection
@section('page-header')
{{--    @include('back.layouts.include.page-header',compact('crumbs'))--}}
@endsection
@section('content')
    @include('back.layouts.include.alert-messages')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Course</h5>
            <div class="heading-elements">
                <a href="{{route('admin.category.create')}}"><span class="label label-success">YENİ Kategorya</span></a>
            </div>
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Slug</th>


                <th class="text-center">Düzəlişlər</th>
            </tr>
            </thead>
            <tbody>

            @if($categorys->count()>0)
                @foreach($categorys as $key=>$category)


                    <tr   {{session()->has('id') &&  $category->id==session('id') ? 'style=background:#38d28f;' : ''}} >
                        <td>{{++$key}}</td>


                        <td><a href="{{route('admin.category.edit',$category->id)}}">{{$category->name ?? ''}}</a></td>

                        <td><a href="{{route('admin.category.edit',$category->id)}}">{{$category->slug ?? ''}}</a></td>
{{--                        <td><span class="label label-info">{{$course->is_active==1 ? 'aktiv' : 'passiv'}}</span></td>--}}
{{--                        <td>{{$category->course_updated_at()}}</td>--}}
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('admin.category.edit',$category->id)}}"><i class="icon-database-edit2"></i> Yenilə</a></li>
                                        <li><a  onclick='checkDeleteConfrim("{{route('admin.category.destroy',$category->id)}}")'><i class="icon-database-remove"></i> Sil</a></li>
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
        function checkDeleteConfrim(url,parentId) {
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

@endsection

