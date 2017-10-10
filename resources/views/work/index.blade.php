@extends('base.index')

{{-- 设置页面 title --}}
@section('title')
    寻找适合自己的商演
@endsection

{{-- 设置导航 active --}}
@section('work')
    active
@endsection

{{-- 设置二级 title --}}
@section('second-title')
    分享美好音乐生活
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical stripe segment">
        <div class="ui text container">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="ui message error">{{ $error }}</div>
                @endforeach
            @endif
            @foreach( $works as $key => $work)
                @if( $key!=0 )
                    {{-- Work 分割线 --}}
                    <h4 class="ui horizontal header divider">
                        <i class="star yellow icon"></i>
                    </h4>
                @endif
                {{-- Works --}}
                <div class="item silence_work">
                    <div class="content">
                        <h3 class="header">{{ $work->title }}</h3>
                        <div class="meta">
                            <a class="ui violet label">价格 <div class="detail">{{ $work->price }}</div></a>
                            <a class="ui teal label">地点<div class="detail">{{ $work->place  }}</div></a>
                            <a class="ui black label">时间<div class="detail">{{ date('Y-m-d',strtotime($work->time))  }}</div></a>
                        </div>
                        <p class="description">
                            {{ $work->description }}
                        </p>
                        <div class="meta silence_work_company">
                            <span class="ui blue label">负责单位<a href="#" class="detail">{{ $work->company }}</a></span>
                        </div>
                        {{-- 判断工作状态 --}}
                        @if( $work->status == 0)
                            <a href="{{ url('work',['apply',$work->id]) }}" class="ui green button chat">申请</a>
                        @elseif( $work->status == 1 )
                            <div class="ui red button chat">已结束</div>
                        @endif
                    </div>
                </div>
            @endforeach
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
                    .typetype("寻找适合自己的商演", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection