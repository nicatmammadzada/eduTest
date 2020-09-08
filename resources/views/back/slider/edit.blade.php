@extends('back.layouts.master')
@section('title','slider')
@section('head')
    <script type="text/javascript" src="/back/ckeditor/ckeditor.js"></script>
@endsection
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('back.layouts.include.alert-messages')
        <!-- Basic layout-->
            <form action="{{route('admin.slider.store')}}" class="form-horizontal" method="Post"
                  enctype="multipart/form-data">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>
                        <div class="heading-elements">
                            <a href="{{route('admin.post')}}"><span
                                    class="label label-success">POSTLARA QAYIT</span></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">text:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="text1"
                                       value="{{old('text1',$slider->text1)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">text:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="text2"
                                       value="{{old('text2',$slider->text2)}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">text:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="text3"
                                       value="{{old('text3',$slider->text3)}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">text:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="text4"
                                       value="{{old('text4',$slider->text4)}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">text:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="text5"
                                       value="{{old('text5',$slider->text5)}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">text:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="text6"
                                       value="{{old('text6',$slider->text6)}}">
                            </div>
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Əlavə et <i
                                    class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /basic layout -->
        </div>

    </div>
@endsection
