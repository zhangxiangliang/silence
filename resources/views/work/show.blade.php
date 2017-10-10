@extends('base.back')

{{-- 设置 title --}}
@section('title')
    工作管理
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical stripe segment">
        <h1 class="ui center aligned header">工作管理 - {{$work->title}}</h1>
        <h5 class="ui center aligned header">当前申请的用户</h5>
        <div class="ui text container">
            <div class="ui center aligned stackable grid">
                @foreach( $users as $user)
                    <div class="silence_person four wide column">
                        <img class="ui medium centered circular image" src="{{ asset('assets/avatar/'.$user->avatar) }}">
                        <h4><a href="{{ url('users',$user->id) }}">{{ $user->name }}</a></h4>
                    </div>
                @endforeach
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