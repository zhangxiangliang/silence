<div id="silence_nav" class="ui inverted vertical masthead center aligned segment">
    <!-- 导航菜单 -->
    <div id="silence_nav_menu" class="ui container">
        <div class="ui large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <div class="item">
                <a href="{{ url('/') }}" class="@yield('index') item">主页</a>
                <a href="{{ url('work') }}" class="@yield('work') item">工作</a>
                <a href="{{ url('users') }}" class="@yield('user') item">艺人</a>
            </div>
            <div href="" class="right item inline">
                @if(\Auth::user())
                    <div class="ui pointing dropdown link item">
                        <span class="text">{{ \Auth::user()->name }}</span>
                        <i class="dropdown icon"></i>
                        <div class="menu transition hidden">
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
    <!-- 导航内容 -->
    <div id="silence_nav_content"class="ui text container">
      <h1 class="ui inverted header">
        Silence
      </h1>
      <h2 id="change">&nbsp;@yield('second-title')</h2>
      <a href="#" id="silence_next_button" class="ui huge inverted button" >开始</a>
    </div>
</div>
