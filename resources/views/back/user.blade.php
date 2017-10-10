@extends('base.back')

{{-- 设置 title --}}
@section('title')
    文章管理
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">{{ $title }}</h1>
        <h5 class="ui center aligned header">Users Manage</h5>
        <div class="ui text" style="margin-top: 30px;margin-left: 10px;margin-right: 10px;">
            <table class="ui left aligned table eight column">
                <thead>
                <tr>
                    <th class="column">用户名</th>
                    <th class="column">邮箱</th>
                    <th class="column">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="ui buttons">
                                <a href="{{ url('background/users',[$user->id,'edit']) }}" class="blue ui button">修改</a>
                                <div class="or"></div>
                                {!! Form::open(['method' => 'DELETE','url' => 'background/users/'.$user->id]) !!}
                                <button type="submit" class="red ui button">删除</button>
                                {!! Form::close() !!}

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="page">
                {!! $users->render() !!}
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