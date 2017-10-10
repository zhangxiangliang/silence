{{-- 普通页面的导航 --}}
<div id="silence_nav_menu">
    <div class="ui borderless main menu">
        <div class="ui  container">
            <a class="toc item">
                <i class="sidebar icon"></i>
            </a>
            <div class="header item">
                <a href="{{ url('background') }}">Silence 后台管理</a>
            </div>
            <div class="silence_nav_menu_hidden item">
                <div class="ui pointing dropdown link item">
                    <span class="text">文章管理</span>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ url('/article/create') }}">创建文章</a>
                        <a class="item" href="{{ url('background/article') }}">文章列表</a>
                    </div>
                </div>
                <div class="ui pointing dropdown link item">
                    <span class="text">用户管理</span>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ url('background/user') }}">用户列表</a>
                        <a class="item" href="{{ url('background/admin') }}">管理员</a>
                    </div>
                </div>
                <div class="ui pointing dropdown link item">
                    <span class="text">工作管理</span>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ url('work/create') }}">创建工作</a>
                        <a class="item" href="{{ url('background/work') }}">工作列表</a>
                    </div>
                </div>
                {{--<a href="{{ url('')  }}" class="@yield('user') item">评论管理</a>--}}
                <a href="{{ url('/')  }}" class="item">返回主页</a>
            </div>
            <div class="right item silence_nav_menu_hidden">
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
            </div>
        </div>
    </div>
</div>