@extends('back.layouts.master')
@section('title',$title)
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('back.layouts.include.alert-messages')
        <!-- Basic layout-->
            <form action="{{route('admin.user.update',$user->id)}}" class="form-horizontal" method="Post">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>
                        <div class="heading-elements">
                            <a href="{{route('admin.user')}}"><span class="label label-success">ADMİNLƏRƏ QAYIT</span></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ad Soayad:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="fullname" value="{{old('fullname',$user->fullname)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Şifrə:</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" name="password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Təkrar Şifrə:</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Aktivlik:</label>
                            <div class="col-lg-1">
                                <input type="checkbox" class="form-control" name="is_active" {{$user->is_active==1 ? 'checked' : ''}}>
                            </div>
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Yenilə <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /basic layout -->
        </div>

    </div>
@endsection
