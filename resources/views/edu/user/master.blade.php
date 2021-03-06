<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2')}}/fonts/feather/feather.min.css">
    <!-- Theme CSS -->
    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme-dark.min.css" rel="" data-toggle="theme"
          data-theme-mode="dark">
    <link href="{{asset('org/Dashkit-1.1.2')}}/css/theme.min.css" rel="" data-toggle="theme" data-theme-mode="light">
    <style>
        body {
            display: none;
        }
    </style>
    <script>
        var themeMode = (localStorage.getItem('dashkitThemeMode')) ? localStorage.getItem('dashkitThemeMode') : 'light';
        themeMode = 'light';
        var themeFile = document.querySelector('[data-toggle="theme"][data-theme-mode="' + themeMode + '"]');
        themeFile.rel = 'stylesheet';
        themeFile.addEventListener('load', function () {
            document.body.style.display = 'block';
        });
    </script>
    @include('layouts._hdjs')
    @include('layouts._message')
    <title>{{system_config('site.webname')}}</title>
    @stack('css')
</head>
<body>
@include('member.layouts._header')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-block text-center pt-5">
                    <div class="avatar avatar-xxl">
                        <img src="{{$user->icon}}" class="avatar-img rounded-circle">
                    </div>
                    <div class="text-center mt-4">
                        <h3 class="text-secondary">{{$user->name}}</h3>
                    </div>
                    @can('follow',auth()->user())
                        <div class="mt-2">
                            @if(auth()->user()->following($topic->user))
                                <a href="{{route('member.follow',$topic->user->id)}}"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="fa fa-plus" aria-hidden="true"></i> 已关注
                                </a>
                            @else
                                <a href="{{route('member.follow',$topic->user->id)}}"
                                   class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-plus" aria-hidden="true"></i> 关注
                                </a>
                            @endif
                        </div>
                    @endcan
                </div>
                <hr>
                <div class="card-body text-center pt-1">
                    <div class="nav flex-column nav-pills ">
                        <a href="{{route('edu.user.topic',$user)}}"
                           class="nav-link {{active_class(if_route('edu.user.topic'),'active','text-muted')}}">
                            他的文章
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            @yield('content')
        </div>
    </div>
</div>
<script>
    require(['hdjs', 'bootstrap']);
</script>
@stack('js')
</body>
</html>