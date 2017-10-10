@extends('base.normal')

{{-- 设置页面 title --}}
@section('title')
    用户信息
@endsection

@section('css')
    <style>
        #silence_user{
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        #silence_working{
            margin-top: 20px;
            padding-top: 50px;
            margin-bottom: 20px;
        }
        .silence_title{
            font-weight: bold;
            font-size: 1.7em;
            line-height: 1.7em;
        }
        .silence_work{
            margin-top: 10px;
        }
    </style>
@endsection

{{-- Login 表单内容 --}}
@section('content')
    <div id="silence_body">
        <div class="ui container">
            <div class="ui stackable grid">
                <div id="silence_user" class="center aligned six wide column">
                    <img class="ui medium centered circular image one wide column" src="{{ asset('assets/avatar/'.$user->avatar) }}">
                    <h2 class="centered">{{ $user->name }}</h2>
                </div>
                <div id="silence_working" class="ten wide column">
                    <div class="column">
                        <h1 class="ui header dividing">注册时间</h1>
                        <p>{{ date("Y-m-d",strtotime($user->created_at)) }}</p>
                        <h1 class="ui header dividing">正在申请的工作</h1>
                        @if(count($user->work)!=0)
                            @foreach($user->work as $work)
                                <div class="silence_work meta">
                                    <span class="silence_title">{{ $work->title }}</span>
                                    <a class="ui violet label">价格 <div class="detail">{{ $work->price }}</div></a>
                                    <a class="ui teal label">地点<div class="detail">{{ $work->place }}</div></a>
                                    <a class="ui black label">时间<div class="detail">{{ date('Y-m-d',strtotime($work->time)) }}</div></a>
                                </div>
                            @endforeach
                        @else
                            <p>该用户暂无申请信息</p>
                        @endif
                        <h1 class="ui header dividing">联系方式</h1>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
