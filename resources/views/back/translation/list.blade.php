@extends('back.layouts.master')
@section('title','Tərcümələr')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tərcümələr</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="{{route('ll.new')}}" class="btn btn-success">Əlavə et</a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <form action="{{route('ll.filter')}}" method="get">
                <input type="search" name="filter">
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered ">
                    <thead>
                    <tr>
                        <th>Text</th>
                        <th>Yenilə</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($lls as $ll)
                        <tr class="text-center">
                            <td title="{{$ll->key}}" class="pixel">
                                {{trans('sozler.'.$ll->key)}}
                            </td>

                            <td width="4%" class="edit"><a href="{{route('ll.edit',$ll->id)}}" class="fa fa-edit"></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$lls->appends($_GET)->links()}}
            </div>
        </div>
    </div>
    <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">

    <div id="abc"></div>
@endsection

@section('head')
    <style>
        td{
            word-break: break-all;
            overflow: hidden !important;
            padding: 0 !important;
            line-height: 50px !important;
        }

        td.delete a{
            font-size: 20px;
            color: darkred;
        }
        td.edit a{
            font-size: 20px;
            color: #00aeef;
        }
    </style>
@endsection

@section('footer')

@endsection

