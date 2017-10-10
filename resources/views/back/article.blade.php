@extends('base.back')

{{-- 设置 title --}}
@section('title')
    文章管理
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">文章管理</h1>
        <h5 class="ui center aligned header">Article Manage</h5>
        <div class="ui text" style="margin-top: 30px;margin-left: 10px;margin-right: 10px;">
            <table class="ui left aligned table eight column">
                <thead>
                    <tr>
                        <th class="column">标题</th>
                        <th class="column">简介</th>
                        <th class="column">操作</th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td>
                            <div class="ui buttons">
                                <a href="{{ url('article',[$article->id,'edit']) }}" class="blue ui button">修改</a>
                                <div class="or"></div>
                                {!! Form::open(['method' => 'DELETE','url' => 'article/'.$article->id]) !!}
                                <button type="submit" class="red ui button">删除</button>
                                {!! Form::close() !!}

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="page">
                {!! $articles->render() !!}
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