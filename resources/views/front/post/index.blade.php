@extends('front.layouts.master')
@section('title','home')


@section('content')



    <div class="py-5 bg-cover text-white" data-dark-overlay="5"
         style="background:url(/front/assets/img/1920/658_2.jpg) no-repeat">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Blog</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Blog</a>
                        </li>
                        <li class="breadcrumb-item">
                            Layout Standard
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="pt-5 paddingBottom-100">
        <div class="container">
            <div class="row">
                @if($posts->count()>0)
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-6 marginTop-30">
                            <article class="card">
                                <div class="card-img">
                                    <a href="{{route('post.detail',$post->slug)}}">
                                        <img class="rounded w-100" src="/front/assets/img/blog/standard/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="card-body px-0">
{{--                                    <a class="text-primary" href="#">PHP &amp; My SQL</a>--}}
                                    <a href="{{route('post.detail',$post->slug)}}" class="h4 my-2">
                                      {{$post->title}}
                                    </a>
                                    <p>
                                      {{  $post->post_updated_at()}}
{{--                                        28 Mar, 2018 - by <a class="text-primary" href="#">Alex</a>--}}
                                    </p>
                                </div>
                            </article>
                        </div> <!-- END col-lg-4 col-md-6 -->

                    @endforeach
                @endif

{{--                {{dd($posts->nextPageUrl())}}--}}
                <div class="col-12 marginTop-70">
                    <ul class="pagination pagination-primary align-items-center justify-content-center">
                        <li class="page-item mx-2">
                            <a href="{{$posts->previousPageUrl()}}">
                                <i class="ti-arrow-left small mr-2"></i>
                                Previous
                            </a>
                        </li>
                        <li class="page-item mx-2 font-weight-bold">{{$posts->currentPage()}}/{{$posts->lastPage()}}</li>
                        <li class="page-item mx-2">
                            <a href="{{$posts->nextPageUrl()}}">
                                Next
                                <i class="ti-arrow-right small ml-2"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@endsection
