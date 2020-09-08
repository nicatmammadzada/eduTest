<div class="page-header">

    <div class="breadcrumb-line breadcrumb-line-component mt-20 mb-20">
        <ul class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="icon-home2 position-left"></i> Əsas Səhifə</a></li>
            @if(count($crumbs)>0)
                @foreach($crumbs as $key=>$crumb)
                    @if(!$loop->last)
                        <li><a href="{{$crumb}}">{{$key}}</a></li>
                    @else
                        <li class="active">{{$key}}</li>
                    @endif
                @endforeach
            @endif
        </ul>

    </div>
</div>