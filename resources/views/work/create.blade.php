@extends('base.back')

{{-- 设置 title --}}
@section('title')
    后台管理系统
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">创建工作</h1>
        <div class="ui text container" style="margin-top: 30px;">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="ui message error">{{$error}}</div>
                @endforeach
            @endif
            {!! Form::open(['url' => 'work',
                            'method' => 'POST',
                            'class' => 'ui large form']) !!}
            <div class="field">
                {!! Form::label('title','标题:') !!}
                <div class="ui left input">
                    {!! Form::text('title', null, ['placeholder' => '输入工作标题']) !!}
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    {!! Form::label('price','价格:') !!}
                    <div class="ui left input">
                        {!! Form::text('price', null, ['placeholder' => '输入工作价格']) !!}
                    </div>
                </div>
                <div class="field">
                    {!! Form::label('place','地点:') !!}
                    <div class="ui left input">
                        {!! Form::text('place', null, ['placeholder' => '输入工作地点']) !!}
                    </div>
                </div>
                <div class="field">
                    {!! Form::label('time','工作时间:') !!}
                    <div class="ui left input">
                        {!! Form::input('date', 'time',date('Y-m-d')) !!}
                    </div>
                </div>
            </div>
            <div class="field">
                {!! Form::label('company','公司:') !!}
                <div class="ui left input">
                    {!! Form::text('company', null, ['placeholder' => '输入工作公司']) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('description','描述:') !!}
                <div class="ui left input">
                    {!! Form::textarea('description', null, ['placeholder' => '输入相关描述']) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('published_at','发布日期:') !!}
                <div class="ui left input">
                    {!! Form::input('date', 'published_at',date('Y-m-d')) !!}
                </div>
            </div>
            <div class="inline fields">
                <label for="level">状态:</label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="status" value="0"  class="hidden">
                        <label>待申请</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="status" tabindex="0" value="1" class="hidden">
                        <label>结束</label>
                    </div>
                </div>
            </div>
            {!! Form::submit('创建',['class' => 'ui fluid large teal submit button']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.ui.dropdown').dropdown({
            on: 'hover'
        });
        $('.ui.radio.checkbox')
                .checkbox()
        ;
    </script>
@endsection