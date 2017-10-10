@extends('base.normal')

{{-- 设置页面 title --}}
@section('title')
    登陆
@endsection

{{-- 设置导航 active --}}
@section('login')
    active
@endsection

{{-- 设置当前页面样式 --}}
@section('css')
    <style>
        #silence_register_form{
            max-width: 450px;
        }
    </style>
@endsection

{{-- Login 表单内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical stripe segment">
        <div class="ui middle aligned center aligned grid">
            <div id="silence_register_form"class="column">
                <h2 class="ui teal image header">登陆</h2>
                {{-- Login 表单 --}}
                {!! Form::open(['url' => 'auth/login', 'class' => 'ui large form']) !!}

                    <div class="ui stacked segment">
                        {{-- 邮箱输入框 --}}
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                {!! Form::text('email', null, ['placeholder' => '邮箱']) !!}
                            </div>
                        </div>

                        {{-- 密码输入框 --}}
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                {!! Form::password('password', ['placeholder' => '密码']) !!}
                            </div>
                        </div>

                        {{-- 登陆按钮 --}}
                        {!! Form::submit('登陆',['class' => 'ui fluid large teal submit button']) !!}
                    </div>
                {!! Form::close() !!}
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="ui message error">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="ui message">
                    还没有账号？ <a href="{{ url('auth/register') }}">注册</a>
                </div>
            </div>
        </div>
    </div>
@endsection
