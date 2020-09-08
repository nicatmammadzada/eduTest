@extends('back.layouts.master')
@section('title',$title)
@section('head')

    <!-- Theme JS files -->
    <script type="text/javascript" src="/back/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="/back/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
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
        </div>

        <table class="table datatable-responsive-row-control">
            <thead>
            <tr>
                <th></th>
                <th>Ad</th>
                <th>Email</th>
                <th>Message</th>
                <th>Cavabla</th>
                <th>Göndərilmə Tarixi</th>
                <th class="text-center"></th>
            </tr>
            </thead>
            <tbody>
            @if($contacts->count()>0)
                @foreach($contacts as $key=>$contact)
                    <tr>
                        <td></td>
                        <td><a href="mailto:{{$contact->email}}">{{$contact->name}}</a></td>
                        <td><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
                        <td>{{$contact->message}}</td>
                        <td><a href="mailto:{{$contact->email}}" class="label label-info"><i class="fa fa-pencil"></i> Cavab Yaz</a></td>
                        <td>{{$contact->contact_created_at()}}</td>
                        <td class="text-center">
                            <a style="color:red;" onclick='checkDeleteConfrim("{{route('admin.contact.destroy',$contact->id)}}")'><i class="fa fa-trash"></i> Sil</a>
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

