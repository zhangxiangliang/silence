@extends('base.back')

{{-- 设置 title --}}
@section('title')
    后台管理系统
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">修改文章</h1>
        <h2 class="ui center aligned header">{{ $article->title }}</h2>
        <div class="ui text container" style="margin-top: 30px;">
            {!! Form::model($article, ['url' => '/article/'.$article->id,
                            'method' => 'PATCH',
                            'class' => 'ui large form']) !!}
            <div class="field">
                {!! Form::label('title','标题:') !!}
                <div class="ui left input">
                    {!! Form::text('title', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('content','内容:') !!}
                <div class="ui left input">
                    {!! Form::textarea('content', null, ['placeholder' => '输入文章内容']) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('published_at','发布日期:') !!}
                <div class="ui left input">
                    {!! Form::input('date', 'published_at',date('Y-m-d')) !!}
                </div>
            </div>
            {!! Form::submit('修改',['class' => 'ui fluid large teal submit button']) !!}
            {!! Form::close() !!}
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="ui message error">{{$error}}</div>
                @endforeach
            @endif
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