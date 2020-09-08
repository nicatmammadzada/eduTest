@extends('back.layouts.master')
@section('title','Yeni Tərcümə')
@section('content')
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="">
                    <ul>
                        <h2>Yeni Tərcümə</h2>
                    </ul>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ol>
                                @foreach($errors->all() as $error)

                                    <li>{{$error}}</li>

                                @endforeach
                            </ol>
                        </div>
                    @endif
                </div>
                <div class="x_content">
                    <form action="{{route('ll.add')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name"><span style="text-transform: capitalize">Key</span><span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" required="required" name="key" value="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        @foreach($langs as $lang)
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name"><span style="text-transform: capitalize">{{$lang->dil}}</span><span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" required="required" name="{{$lang->dil}}" value="" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <button class="btn btn-success btn-xs">Əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
@endsection

@section('footer')
@endsection

