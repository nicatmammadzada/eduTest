@extends('back.layouts.master')
@section('title','product-edit')

@section('head')
    {{--    <script type="text/javascript" src="/back/assets/js/plugins/loaders/pace.min.js"></script>--}}
    <script type="text/javascript" src="/back/assets/js/pages/form_checkboxes_radios.js"></script>
@endsection

@section("content")
    <div class="row" id="categoryDiv">
        <div class="col-md-12">

            <!-- Basic layout-->
            <form action="{{route('admin.brend.store',$logo->id)}}" class="form-horizontal"
                  method="POST" novalidate="" enctype="multipart/form-data"
                  autocomplete="off">


                @csrf
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">edit</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    @include('back.layouts.include.alert-messages')

                    <div class="panel-body">
                        <div class="form-group">
{{--                            <label class="col-lg-2 control-label"> Product name*:</label>--}}
                            <div class="col-lg-3">
                                <label class="col-lg-2 control-label" > name:</label>
                                <input type="text" class="form-control" name="name"
                                       placeholder="logo name!"
                                       value="{{ old('name',$logo->name ?? '') }}" >
                            </div>
                            <div class="col-lg-3">
                                <label class="col-lg-2 control-label"> Link:</label>
                                <input type="text" class="form-control" name="link"
                                       placeholder="link daxil edin!"
                                       value="{{ old('link',$logo->link?? '') }}">
                            </div>
                            <div class="col-lg-3">
                                <label class="col-lg-2 control-label" style="color: red"> Photo*:</label>
                                <input type="file" class="form-control" name="photo"
                                     >
                            </div>

                        </div>
                        <div class="col-lg-3" style="float:right;">
                            <input type="submit" class="btn btn-primary" value="ok"
                            >
                        </div>


                    </div>
                </div>

            </form>





        </div>


    </div>





@endsection

@section('foot')

@endsection

