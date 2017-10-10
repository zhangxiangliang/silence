<!DOCTYPE html>
<html lang="en">
<head>
    {{-- 引用 header --}}
    @include('base.header')

    {{-- 设置 页面名 --}}
    <title>Silence - @yield('title')</title>

    {{-- 自定义 页面 Css --}}
    @yield('css')

</head>
<body class="pushable">
    {{-- 响应式侧边栏 --}}
    @include('base.sidebar')

    <div class="pusher">
        {{-- 响应式导航 --}}
        @include('base.nav')

        {{-- 待填充 页面内容 --}}
        @yield('content')

        {{-- 引用 页脚内容 --}}
        @include('base.footer')
    </div>
    
    {{-- 引用 基础Javascript --}}
    @include('base.js')

    {{-- 自定义 页面JavaScript --}}
    @yield('script')
</body>
</html>