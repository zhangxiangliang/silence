@extends('base.back')

{{-- 设置 title --}}
@section('title')
    后台管理系统
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">后台管理系统</h1>
        <h5 class="ui center aligned header">Background System</h5>
        <div class="ui text container" style="margin-top: 30px;">
            <div class="ui stackable three column very relaxed grid container" >
                <div class="column">
                    <div class="ui">
                        <h2>文章</h2>
                        <div class="ui list">
                            <div class="item"><a href="{{ url('article/create') }}">创建文章</a></div>
                            <div class="item"><a href="{{ url('background/article') }}">文章列表</a></div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui">
                        <h2>用户</h2>
                        <div class="ui list">
                            <div class="item"><a href="{{ url('background/user') }}">用户列表</a></div>
                            <div class="item"><a href="{{ url('background/admin') }}">管理员列表</a></div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h2>工作</h2>
                    <div class="ui">
                        <div class="item"><a href="{{ url('work/create') }}">创建工作</a></div>
                        <div class="item"><a href="{{ url('background/work') }}">工作列表</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.ui.dropdown').dropdown({
            on: 'hover'
        });
    </script>
@endsection