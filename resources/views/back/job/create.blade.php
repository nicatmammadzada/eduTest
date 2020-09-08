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
            <form action="{{route('admin.job.store')}}" class="form-horizontal" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>
                        <div class="heading-elements">
                            <a href="{{route('admin.job.index')}}"><span class="label label-success">Vakansiyalara QAYIT</span></a>
                        </div>
                    </div>

                    <div class="panel-body">




                        <div class="form-group">
                            <label class="col-lg-3 control-label">Customer:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="customer" value="{{old('customer')}}">
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-lg-3 control-label">Vakansiya name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Şəhər:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="location" value="{{old('location')}}">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">İş təcrübəsi:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="experience" value="{{old('experience')}}">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Təhsil:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="education" value="{{old('education')}}">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Maaş:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="salary" value="{{old('salary')}}">

                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label">Yaş:</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="work_time" value="{{old('work_time')}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Description:</label>
                            <div class="col-lg-9">
                                <textarea class="ckeditor" name="description" id="editor-readonly" rows="5" cols="5">
                                        {{old('description')}}
                                </textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label">Şəkil:</label>
                            <div class="col-lg-9">
                                <input type="file" name="photo" id="productPhoto" class="file-styled" >
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Logo:</label>
                            <div class="col-lg-9">
                                <input type="file" name="logo" id="productPhoto" class="file-styled" >
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                            </div>
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Əlavə et <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /basic layout -->
        </div>

    </div>
@endsection
