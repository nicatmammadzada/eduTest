@extends('back.layouts.master')
@section('title',$title)
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    @include('back.layouts.include.alert-messages')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{$title}}</h5>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Abunəlik Tarixi</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @if($subscribes->count()>0)
                        @foreach($subscribes as $key=>$subscribe)
                            <tr>
                                <td>{{++$key}}</td>
                                <td><a href="mailto:{{$subscribe->email}}">{{$subscribe->email}}</a></td>
                                <td>{{$subscribe->subscribe_created_at()}}</td>
                                <td>
                                    <a href="mailto:{{$subscribe->email}}" class="label label-info"><i class="fa fa-pencil"></i> Cavab Yaz </a>
                                    <a style="color:red;" onclick='checkDeleteConfrim("{{route('admin.subscribe.destroy',$subscribe->id)}}")'> <i class="fa fa-trash"></i> Sil</a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('foot')
    <script>
        function checkDeleteConfrim(url) {
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
