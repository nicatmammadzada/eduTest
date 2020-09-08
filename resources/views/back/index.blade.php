@extends('back.layouts.master')
@section('title','Əsas Səhifə')
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Postlar</div>
                <div class="panel-body">
                    <h4>{{$posts->count()}}</h4>
                    <a href="{{route('admin.post')}}">Daha Çox</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Mesajlar</div>
                <div class="panel-body">
                    <h4>{{$contacts->count()}}</h4>
                    <a href="{{route('admin.contact')}}">Daha Çox</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Abunələr</div>
                <div class="panel-body">
                    <h4>{{$subscribes->count()}}</h4>
                    <a href="{{route('admin.subscribe')}}">Daha Çox</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Adminlər</div>
                <div class="panel-body">
                    <h4>{{$users->count()}}</h4>
                    <a href="{{route('admin.user')}}">Daha Çox</a>
                </div>
            </div>
        </div>
    </section>
@endsection