@extends('back.layouts.master')
@section('title',$title)
@section('head')
@endsection
@section('page-header')
    @include('back.layouts.include.page-header',compact('crumbs'))
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('back.layouts.include.alert-messages')
        <!-- Basic layout-->
            <form action="{{route('admin.config.update',$config->id)}}" class="form-horizontal" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$title}}</h5>

                    </div>

                    <div class="panel-body">


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ünvan:</label>
                            <div class="col-lg-9">
                                <textarea rows="3" cols="3" class="form-control" name="location" >{{$config->location ?? ''}}</textarea>
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label class="col-lg-3 control-label">Lat:</label>--}}
{{--                            <div class="col-lg-9">--}}
{{--                                <input type="text" class="form-control" name="lat" value="{{$config->lat ?? ''}}">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="col-lg-3 control-label">Long:</label>--}}
{{--                            <div class="col-lg-9">--}}
{{--                                <input type="text" class="form-control" name="long" value="{{$config->long ?? ''}}">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="email" value="{{$config->email ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Telefon:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="phone" value="{{$config->phone ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Facebook:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="facebook" value="{{$config->facebook ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">İnstagram:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="instagram" value="{{$config->instagram ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Twitter:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="twitter" value="{{$config->twitter ?? ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Youtube:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="youtube" value="{{$config->youtube ?? ''}}">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label">Logo:</label>
                            <div class="col-lg-9">
                                <div class="thumbnail" style="width: 30%">
                                    <div class="thumb">
                                        <img src="{{asset("uploads/photo").'/'.$config->logo ?? ''}}" alt="">
                                        <div class="caption-overflow">
										<span>
											<a href="{{asset("uploads/photo").'/'.$config->logo ?? ''}}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
										</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-9">
                                <input type="file" name="logo" id="productPhoto" class="file-styled" >
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-lg-3 control-label">Reklam:</label>
                            <div class="col-lg-9">
                                <div class="thumbnail" style="width: 30%">
                                    <div class="thumb">
                                        <img src="{{asset("uploads/photo").'/'.$config->reklam ?? ''}}" alt="">
                                        <div class="caption-overflow">
										<span>
											<a href="{{asset("uploads/photo").'/'.$config->reklam ?? ''}}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
										</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-9">
                                <input type="file" name="reklam" id="productPhoto" class="file-styled" >
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label">Reklam2:</label>
                            <div class="col-lg-9">
                                <div class="thumbnail" style="width: 30%">
                                    <div class="thumb">
                                        <img src="{{asset("uploads/photo").'/'.$config->reklam2 ?? ''}}" alt="">
                                        <div class="caption-overflow">
										<span>
											<a href="{{asset("uploads/photo").'/'.$config->reklam2 ?? ''}}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
										</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-9">
                                <input type="file" name="reklam2" id="productPhoto" class="file-styled" >
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Reklam3:</label>
                            <div class="col-lg-9">
                                <div class="thumbnail" style="width: 30%">
                                    <div class="thumb">
                                        <img src="{{asset("uploads/photo").'/'.$config->reklam3 ?? ''}}" alt="">
                                        <div class="caption-overflow">
										<span>
											<a href="{{asset("uploads/photo").'/'.$config->reklam3 ?? ''}}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
										</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-9">
                                <input type="file" name="reklam3" id="productPhoto" class="file-styled" >
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Reklam footer:</label>
                            <div class="col-lg-9">
                                <div class="thumbnail" style="width: 30%">
                                    <div class="thumb">
                                        <img src="{{asset("uploads/photo").'/'.$config->reklam4 ?? ''}}" alt="">
                                        <div class="caption-overflow">
										<span>
											<a href="{{asset("uploads/photo").'/'.$config->reklam4 ?? ''}}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
										</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-9">
                                <input type="file" name="reklam4" id="productPhoto" class="file-styled" >
                                <span class="help-block">Qəbul edilən uzantılar: gif, png, jpg, jpeg. Maksimum həcm 2Mb olmalıdır.</span>
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
