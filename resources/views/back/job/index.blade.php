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
                <a href="{{route('admin.job.create')}}"><span class="label label-success">YENİ Vakansiya</span></a>
            </div>
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>

                <th></th>
                <th>LOGO</th>
                <th >Customer</th>

                <th>Name</th>
                <th>Salary</th>

                <th>Tecrube</th>

                <th>Education</th>
                <th>Age</th>
                <th>Work time</th>
                <th>updated_at</th>
                <th class="text-center">Düzəlişlər</th>

            </tr>
            </thead>
            <tbody>
            @if($jobs->count()>0)
                @foreach($jobs as $key=>$job)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            <a href="{{route('admin.job.edit',$job->id)}}">
                                <img style="width: 50px;" src="{{asset("uploads/job/").'/'.$job->logo}}" alt="">
                            </a>
                        </td>

                        <td ><a href="{{route('admin.job.edit',$job->id)}}">{{$job->customer ?? ''}}</a></td>
                        <td ><a href="{{route('admin.job.edit',$job->id)}}">{{$job->name ?? ''}}</a></td>
                        <td ><a href="{{route('admin.job.edit',$job->id)}}">{{$job->salary ?? ''}}</a></td>
                        <td ><a href="{{route('admin.job.edit',$job->id)}}">{{$job->experience ?? ''}}</a></td>
                        <td ><a href="{{route('admin.job.edit',$job->id)}}">{{$job->education ?? ''}}</a></td>
                        <td ><a href="{{route('admin.job.edit',$job->id)}}">{{$job->age ?? ''}}</a></td>
                        <td ><a href="{{route('admin.job.edit',$job->id)}}">{{$job->work_time ?? ''}}</a></td>
                        <td ><a href="{{route('admin.job.edit',$job->id)}}">{{$job->job_updated_at() ?? ''}}</a></td>



                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('admin.job.edit',$job->id)}}"><i
                                                    class="icon-database-edit2"></i> Yenilə</a></li>
                                        <li>
                                            <a onclick='checkDeleteConfrim("")'><i
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




@endsection


