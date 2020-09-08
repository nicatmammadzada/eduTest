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
            <form action="{{route('admin.post.update',$post->slug)}}" class="form-horizontal" method="Post"
                  enctype="multipart/form-data">
                @csrf


                <div class="row">
                    <div class="">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">..<a class="heading-elements-toggle"><i
                                            class="icon-more"></i></a></h6>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse" class=""></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body" style="display: block;">
                                <div class="tabbable">


                                    <div class="tab-content">
                                        <div class="tab-pane active" id="centered-tab1">

                                            <div class="panel-heading">
                                                <h5 class="panel-title">{{$title}}</h5>
                                                <div class="heading-elements">
                                                    <a href="{{route('admin.post')}}"><span class="label label-success">Xəbərlərə QAYIT</span></a>
                                                </div>
                                            </div>


                                            <div class="panel-body">




                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Ad:</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="title"
                                                               value="{{old('title',$post->title)}}">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Kiçik Mətn:</label>
                                                    <div class="col-lg-9">
                                                        <textarea rows="5" cols="5" class="form-control"
                                                                  name="small_text">{{old('small_text',$post->small_text)}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Post:</label>
                                                    <div class="col-lg-9">
                                <textarea class="ckeditor" name="description" id="editor-readonly" rows="5" cols="5">
                                        {{old('description',$post->description)}}
                                </textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Şəkil:</label>
                                                    <div class="col-lg-9">
                                                        <input type="file" name="photo" id="productPhoto"
                                                               class="file-styled">
                                                        <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Author:</label>
                                                    <select class="control-label col-lg-3" name="author_id">
                                                        @foreach($users as $user)
                                                            <option
                                                                {{$user->id==$post->author_id ?  'selected' : ''}}  value="{{$user->id}}">{{$user->fullname ?? ''}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary">Update <i
                                                            class="icon-arrow-right14 position-right"></i></button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </form>
            <!-- /basic layout -->
        </div>

    </div>
@endsection
