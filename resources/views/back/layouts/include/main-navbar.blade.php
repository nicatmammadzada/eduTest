<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('admin')}}"><img src="/back/assets/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>

        </ul>


        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/back/assets/images/placeholder.jpg" alt="">
                        <span>{{auth()->guard('admin')->user()->fullname}}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{route('admin')}}"><i class="fa fa-home"></i> <span>Əsas Səhifə</span></a></li>
                        <li><a href="{{route('admin.post')}}"><i class="fa fa-product-hunt"></i>
                                <span>Postlar</span></a></li>
                        <li><a href="{{route('admin.about')}}"><i class="fa fa-info"></i> <span>Haqqımda</span></a></li>
                        <li><a href="{{route('admin.config')}}"><i class="fa fa-cogs"></i> <span>Parametrlər</span></a>
                        </li>
                        <li><a href="{{route('admin.contact')}}"><i class="fa fa-phone-square"></i>
                                <span>Əlaqə</span></a></li>
                        <li><a href="{{route('admin.subscribe')}}"><i class="fa fa-user-plus"></i> <span>Abunələr</span></a>
                        </li>
                        <li><a href="{{route('admin.user')}}"><i class="fa fa-dashboard"></i> <span>Adminlik</span></a>
                        </li>
                        <li>
                            <a href="{{route('clear.cache')}}"><i class="icon-spinner2 spinner"></i>
                                <span>Keşi Təmizlə</span></a>
                        </li>
                        <li><a href="{{route('admin.logout')}}"><i class="icon-switch2"></i> Çıxış</a></li>
                    </ul>


                </li>
            </ul>


            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="" alt="">
                        <span>langs</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        @foreach($langs as $lang)
                            <li><a href="{{route('choose.lang',$lang->dil)}}"><i class="fa fa-language"></i> <span>{{$lang->dil ?? ''}}</span></a>
                            </li>
                        @endforeach

                    </ul>


                </li>
            </ul>

            <span style="color:green">| Aktiv dil : {{app()->getLocale()}}</span>



        </div>
    </div>
</div>
