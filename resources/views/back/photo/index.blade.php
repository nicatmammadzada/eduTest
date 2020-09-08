@extends('back.layouts.master')
@section('title','photos')
@section('content')


    <div class="content">
@include('back.layouts.include.alert-messages')
        <!-- Image grid -->
        <h6 class="content-group text-semibold">
            Image grid

        </h6>


        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <form action="{{route('admin.photo.create')}}" class="form-horizontal" method="Post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="thumbnail">
                        <div class="thumb">
             <input type="file" name="photo[]" value="photo add" multiple>
                        </div>

                        <div class="caption">
                            <h6 class="no-margin-top text-semibold"><a href="#" class="text-default"></a> <a href="#"
                                                                                                             class="text-muted"><i
                                        class="icon-download pull-right"></i></a></h6>
                            <input value="əlavə et" type="submit" href="" class="btn btn-primary" style=" width: 100%;">
                        </div>
                    </div>
                </form>
            </div>

            @foreach($photos as $photo)
                <div class="col-lg-4 col-sm-8">
                    <div class="thumbnail">
                        <div class="thumb">
                            <img src="/uploads/photo/{{$photo->name}}" alt="" style="height: 100px!important;">
                            <div class="caption-overflow">
										<span>


                                            ''


											<a href="/uploads/photo/{{$photo->name}}" data-popup="lightbox"
                                               class="btn border-white text-white btn-flat btn-icon btn-rounded"><i
                                                    class="icon-plus3"></i></a>
											<a href=""
                                               class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i
                                                    class="icon-link2"></i></a>
										</span>
                            </div>
                        </div>

                        <div class="caption">
                            <h6 style="font-size: 11px;" class="no-margin-top text-semibold"><a href="#"
                                                                       class="text-default">

                                    /uploads/photo/<br>{{$photo->name ?? 'logo name'}}


                                </a>
                               </h6>
                            <a href="{{route('admin.photo.remove',$photo->id)}}" class="btn btn-danger" style=" width: 100%;">delete</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>


    </div>

@endsection
