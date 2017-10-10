<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\IpUtils;

class UserController extends Controller
{
    // 艺人页面显示
    public function index()
    {
        $users = User::latest()->simplePaginate(16);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    // 查看 id 对应的用户信息
    public function show($id)
    {
        $user = User::find($id);
        $works = $user->work();
        return view('user.show', compact('user', 'works'));
    }

    // 用户个人信息
    public function info(){
        if(\Auth::user()) {
            $user_id = \Auth::user()->id;
            $user = User::find($user_id);
            $works = $user->work();
            return view('auth.index', compact('user', 'works'));
        } else {
            $user_info_error = "请您先登陆";
            return redirect('work')
                ->withErrors($user_info_error);
        }
    }

    // 显示修改头像页面
    public function avatar(){
        if(\Auth::user()) {
            return view('user.avatar');
        } else {
            return redirect('/');
        }
    }

    // 验证头像上传 Token
    public function wrongTokenAjax()
    {
        if ( Session::token() !== Request::get('_token') ) {
            $response = [
                'status' => false,
                'errors' => 'Wrong Token',
            ];

            return Response::json($response);
        }

    }

    // 验证头像上传并储存
    public function avatarUpload(){
        if(\Auth::user()) {
            $this->wrongTokenAjax();
            $file = Input::file('fileselect');
            if(!$file){
                $error = '请不要上传空图片';
                return redirect('user/avatar')
                    ->withErrors($error);
            }
            $input = array('image' => $file);
            $rules = array('image' => 'image');
            $validator = Validator::make($input, $rules);
            if ( $validator->fails() ) {
                $error = '请不要上传非图片文件';
                return redirect('user/avatar')
                    ->withErrors($error);
            }
            $destinationPath = 'assets/avatar/';
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            \Auth::user()->avatar = $filename;
            \Auth::user()->save();
            return redirect('user');
        } else {
            return redirect('/');
        }
    }

    // 显示管理员对用户编辑页面
    public function edit($id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $user = User::findOrFail($id);
            return view('auth.edit', compact('user'));
        } else {
            return redirect('/');
        }
    }

    // 管理员对用户编辑后验证并储存
    public function update(Request $request, $id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $user =  User::findOrFail($id);
            $user->update($request->all());
            return redirect('/background/user');
        } else {
            return redirect('/');
        }
    }

    // 管理员对用户进行删除
    public function destroy($id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/background/user');
        } else {
            return redirect('/');
        }

    }
}
