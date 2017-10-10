@extends('base.back')

{{-- 设置 title --}}
@section('title')
    后台管理系统
@endsection

{{-- Works 内容 --}}
@section('content')
    <div id="silence_body" class="ui vertical segment">
        <h1 class="ui center aligned header">修改用户</h1>
        <div class="ui text container" style="margin-top: 30px;">
            {!! Form::model($user, ['url' => '/background/users/'.$user->id,
                            'method' => 'PATCH',
                            'class' => 'ui large form']) !!}
            <div class="field">
                {!! Form::label('name','用户名:') !!}
                <div class="ui left input">
                    {!! Form::text('name', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('email','邮箱:') !!}
                <div class="ui left input">
                    {!! Form::text('email', null, null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('password','密码:') !!}
                <div class="ui left input">
                    {!! Form::password('password',null) !!}
                </div>
            </div>
            <div class="field">
                {!! Form::label('password_confirmation','重复密码:') !!}
                <div class="ui left input">
                    {!! Form::password('password_confirmation',null) !!}
                </div>
            </div>
            <div class="inline fields">
                <label for="level">用户权限</label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="level" value="0"  class="hidden">
                        <label>普通用户</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="level" tabindex="0" value="1" class="hidden">
                        <label>管理员</label>
                    </div>
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
        $('.ui.radio.checkbox')
                .checkbox()
        ;
    </script>
@endsection