<div class="ui vertical sidebar menu left">
    <a href="background" class="item">后台主页</a>
    <div class="item">文章管理</div>
    <div class="menu">
        <a class="item" href="{{ url('background/article') }}">创建文章</a>
        <a class="item" href="{{ url('background/article') }}">文章列表</a>
    </div>
    <div class="item">用户管理</div>
    <div class="menu">
        <a class="item" href="{{ url('background/user') }}">用户列表</a>
        <a class="item" href="{{ url('background/admin') }}">管理员</a>
    </div>
    {{--<a href="{{ url('')  }}" class="item">评论管理</a>--}}
    <a href="#" class="item">{{ \Auth::user()->name }}</a>
    <a href="{{ url('auth/logout') }}" class="item">登出</a>
    <a href="{{ url('/')  }}" class="item">返回主页</a>
</div>
</div>