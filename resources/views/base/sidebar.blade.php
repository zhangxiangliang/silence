<div class="ui vertical sidebar menu left">
    <a href="{{ url('/') }}" class="@yield('index') item">主页</a>
    <a href="{{ url('work') }}" class="@yield('work') item">工作</a>
    <a href="{{ url('users') }}" class="@yield('user') item">艺人</a>

@if(\Auth::user())
        <a href="{{ url('user') }}" class="item">{{ \Auth::user()->name }}</a>
        @if(\Auth::user()->level == 1)
            <a href="{{ url('background') }}" class="item">后台管理</a>
        @endif
        <a href="{{ url('auth/logout') }}" class="item">登出</a>
    @else
        <a href="{{ url('auth/login') }}" class="@yield('login') item">登陆</a>
        <a href="{{ url('auth/register') }}" class="@yield('register') item">注册</a>
    @endif
</div>   