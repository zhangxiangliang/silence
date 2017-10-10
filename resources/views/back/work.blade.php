@extends('base.back')

{{-- 设置 title --}}
@section('title')
    文章管理
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">工作管理</h1>
        <h5 class="ui center aligned header">Work Manage</h5>
        <div class="ui text" style="margin-top: 30px;margin-left: 10px;margin-right: 10px;">
            <table class="ui left aligned table eight column">
                <thead>
                <tr>
                    <th class="column">标题</th>
                    <th class="column">简介</th>
                    <th class="column">状态</th>
                    <th class="column">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $works as $work)
                    <tr>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->description }}</td>
                        <td>
                        @if($work->status == 0)
                            待申请
                        @else
                            结束
                        @endif
                        </td>
                        <td>
                            <div class="ui buttons">
                                <a href="{{ url('work',[$work->id]) }}" class="green ui button">列表</a>
                                <a href="{{ url('work',[$work->id,'edit']) }}" class="blue ui button">修改</a>
                                {!! Form::open(['method' => 'DELETE','url' => 'work/'.$work->id]) !!}
                                <button type="submit" class="red ui button">删除</button>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="page">
                {!! $works->render() !!}
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