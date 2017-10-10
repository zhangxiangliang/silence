@extends('base.normal')

{{-- 设置页面 title --}}
@section('title')
    {{ $article->title }}
@endsection

{{-- 设置导航 active --}}
@section('index')
    active
@endsection

@section('content')
    {{-- Articles 内容 --}}
    <div id="silence_body" class="ui vertical stripe segment">
        <div class="ui text container">
                <div class="silence_article">
                    <h3 class="ui header">{{ $article->title }}</h3>
                    <div class="time">{{ $article->created_at  }}</div>
                    <p>{{ $article->content  }}</p>
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
    </script>
@endsection