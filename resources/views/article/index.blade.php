@extends('base.index')

{{-- 设置页面 title --}}
@section('title')
    分享美好音乐生活
@endsection

{{-- 设置导航 active --}}
@section('index')
    active
@endsection

{{-- 设置二级 title --}}
@section('second-title')
    欢迎
@endsection

@section('content')
    {{-- Articles 内容 --}}
    <div id="silence_body" class="ui vertical stripe segment">
        <div class="ui text container">
            @foreach( $articles as $key => $article)
                @if( $key!=0 )
                    {{-- Article 分割线 --}}
                    <h4 class="ui horizontal header divider">
                        <i class="heart red icon"></i>
                    </h4>
                @endif
                {{-- Article --}}
                <div class="silence_article">
                    <h3 class="ui header">{{ $article->title }}</h3>
                    <div class="time">{{ $article->created_at->diffForHumans()  }}</div>
                    <p>{{ $article->content  }}</p>
                    <a class="ui button" href="{{ url('/article',$article->id) }}">阅读</a>
                </div>
            @endforeach
            <div id="page">
                {!! $articles->render() !!}
            </div>
        </div>

    </div>
@endsection

{{-- 当前页面脚本 --}}
@section('script')
    {{-- 引用 typetype --}}
    <script src="{{ asset('assets/js/typetype.min.js') }}"></script>
    <script type="text/javascript">
        {{-- silence_nav_content 导航内容按钮的效果 --}}
        $("#silence_next_button").click( function()
        {
            $("html,body").animate({scrollTop: $("#silence_body").offset().top}, 1000);
        });

        {{-- silence_nav_content 导航内容按钮的效果 --}}
        $(function()
        {
            $('#change').focus()
                    .delay(1000)
                    .backspace(9)
                    .typetype("分享美好音乐生活", {
                        t:200,
                        e:0.1,
                    });
        });
        $('.ui.dropdown').dropdown({
            on: 'hover'
        });
    </script>
@endsection