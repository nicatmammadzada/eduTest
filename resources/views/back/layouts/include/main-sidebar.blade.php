

<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="{{route('admin')}}" class="media-left">
                        <img src="/back/assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{auth()->guard('admin')->user()->fullname}}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li><a href="{{route('admin')}}"><i class="fa fa-home"></i> <span>Əsas Səhifə</span></a></li>
                    <li><a href="{{route('admin.post')}}"><i class="icon-magazine"></i> <span>Xəbərlər</span></a>
                    <li><a href="{{route('admin.blog')}}"><i class="icon-magazine"></i> <span>Blog</span></a>

                    <li><a><i class="icon-graduation2"></i> <span>Courses</span></a>

                        <ul class="navigation navigation-main navigation-accordion">
                            @if(count($categorys)>0)
                                @foreach($categorys as $category)
                                    <li><a href="{{route('admin.course.index',$category->id)}}"><i class=" icon-bookmark"></i> <span>
                                                 {{$category->name  ?? ''}}
                                            </span></a>

                                    <li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li><a href="{{route('admin.about')}}"><i class="fa fa-info"></i> <span>Haqqımızda</span></a></li>
                    <li><a href="{{route('admin.config')}}"><i class="fa fa-cogs"></i> <span>Parametrlər</span></a></li>

                    <li><a href="{{route('admin.category.index')}}"><i class="icons-list"></i> <span>Categorys</span></a>



                    <li><a href="{{route('admin.photo.index')}}"><i class="fa fa-picture-o"></i> <span>Photos</span></a>
                    </li>
                    <li><a href="{{route('admin.subscribe')}}"><i class="fa fa-user-plus"></i> <span>Abunələr</span></a>
                    </li>
                    <li><a href="{{route('admin.user')}}"><i class="fa fa-dashboard"></i> <span>Adminlik</span></a></li>


                    <li><a href="{{route('ll.list')}}"><i class="fa fa-language"></i> <span>Translate</span></a></li>
                    <li><a href="{{route('clear.cache')}}"><i class="icon-spinner2 spinner"></i>
                            <span>Keşi Təmizlə</span></a>
                    </li>
                    <li><a href="{{route('admin.logout')}}"><i class="icon-switch2"></i> Çıxış</a></li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
