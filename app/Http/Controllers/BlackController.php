<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Work;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlackController extends Controller
{
    public function index()
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            return view('back.index');
        } else {
            return redirect('/');
        }
    }

    public function article()
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $articles = Article::latest()->publish()->simplePaginate(15);
            return view('back.article', compact('articles'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $users = User::latest()->simplePaginate(5);
            $title = '用户管理';
            return view('back.user', compact('users', 'title'));
        } else {
            return redirect('/');
        }
    }


    public function admin()
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $users = User::where('level', '=', '1')->latest()->simplePaginate(5);
            $title = '管理员管理';
            return view('back.user', compact('users', 'title'));
        } else {
            return redirect('/');
        }
    }

    public function work()
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $works = Work::latest()->simplePaginate(5);
            return view('back.work', compact('works'));
        } else {
            return redirect('/');
        }
    }

    public function apply($id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $work = Work::find($id);
            return view('back.apply', compact('work'));
        } else {
            return redirect('/');
        }
    }

    public function access($work_id,$user_id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {

        } else {
            return redirect('/');
        }
    }
}
