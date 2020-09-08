@extends('back.layouts.master')
@section('title',$title)
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
            <form action="{{route('admin.video.store')}}" class="form-horizontal" method="Post"
                  enctype="multipart/form-data">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>
                        <div class="heading-elements">
                            <a href="{{route('admin.video.index')}}"><span
                                    class="label label-success">Videolara QAYIT</span></a>
                        </div>
                    </div>


                    <div class="panel-body">





                        <div class="form-group">
                            <label class="col-lg-3 control-label">Text:</label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" class="form-control"
                                          name="text">{{old('text')}}</textarea>
                            </div>
                        </div>






                        <div class="form-group">
                            <label class="col-lg-3 control-label">Şəkil:</label>
                            <div class="col-lg-9">
                                <input type="file" name="photo" id="productPhoto" class="file-styled">
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Video:</label>
                            <div class="col-lg-9">
                                <input type="file" name="video" id="productPhoto" class="file-styled">
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg,mp4 Maksimum həcm 2Mb olmalıdır.</span>
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
