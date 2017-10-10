@extends('base.index')

{{-- 设置页面 title --}}
@section('title')
    搜寻你所需要的艺人
@endsection

{{-- 设置导航 active --}}
@section('user')
    active
@endsection

{{-- 设置二级 title --}}
@section('second-title')
    分享美好音乐生活
@endsection

@section('content')
    {{-- User 内容 --}}
    <div id="silence_body" class="ui vertical stripe segment">
        <div class="ui text container">
            <div class="ui center aligned stackable grid">
                @foreach( $users as $user)
                    <div class="silence_person four wide column">
                        <img class="ui medium centered circular image" src="{{ asset('assets/avatar/'.$user->avatar) }}">
                        <h4><a href="{{ url('users',$user->id) }}">{{ $user->name }}</a></h4>
                    </div>
                @endforeach
                <div id="page">
                    {!! $users->render() !!}
                </div>
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
                    .typetype("搜寻你所需要的艺人", {
                        t:200,
                        e:0.1,
                    });
        });
    </script>
@endsection