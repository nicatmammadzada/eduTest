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
            <form action="{{route('admin.pandemia.update')}}" class="form-horizontal" method="Post"
                  enctype="multipart/form-data">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Title:</label>
                            <div class="col-lg-10">
                                <textarea class="ckeditor" name="title" id="editor-readonly" rows="5" cols="5">
                                        {{old('title',$pandemia->title ?? '')}}

                                                                   </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Content:</label>
                            <div class="col-lg-10">
                                <textarea class="ckeditor" name="text" id="editor-readonly" rows="5" cols="5">
                                        {{old('text',$pandemia->text ?? '')}}
                                </textarea>
                            </div>
                        </div>


                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Yenilə <i
                                    class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /basic layout -->
        </div>

    </div>
@endsection
