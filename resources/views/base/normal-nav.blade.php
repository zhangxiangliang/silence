{{-- 普通页面的导航 --}}
<div id="silence_nav_menu">
    <div class="ui borderless main menu">
        <div class="ui text container">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <div class="header item">
                Silence
            </div>
            <div class="silence_nav_menu_hidden item">
                <a href="{{ url('/')  }}" class="@yield('index') item">主页</a>
                <a href="{{ url('work')  }}" class="@yield('work') item">工作</a>
                <a href="{{ url('users')  }}" class="@yield('user') item">艺人</a>
            </div>
            <div class="right item silence_nav_menu_hidden">
                @if(\Auth::user())
                    <div class="ui pointing dropdown link item" tabindex="0">
                        <span class="text">{{ \Auth::user()->name }}</span>
                        <i class="dropdown icon"></i>
                        <div class="menu transition hidden" tabindex="-1">
                            @if(\Auth::user()->level == 1)
                                <a href="{{ url('background')  }}" class="item">后台管理</a>
                            @endif
                            <a href="{{ url('user')  }}" class="item">用户信息</a>
                            <a href="{{ url('user/avatar')  }}" class="item">头像修改</a>
                        </div>
                    </div>
                    <a href="{{ url('auth/logout') }}" class="item">登出</a>
                @else
                    <a href="{{ url('auth/login') }}" class="@yield('login') item">登陆</a>
                    <a href="{{ url('auth/register') }}" class="@yield('register') item">注册</a>
                @endif
            </div>
        </div>
    </div>
</div>