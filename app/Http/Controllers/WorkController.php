<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::latest()->get();
        return view('work.index', compact('works'));
    }

    public function apply($id){
        if(\Auth::user()) {
            $user_id  = \Auth::user()->id;
            $work = Work::find($id)->user;

            if($work->contains($user_id)){
                $apply_error = "您已经提交过申请，请耐心等待";
                return redirect('work/#silence_body')
                    ->withErrors($apply_error);
            } else {
                $apply_success = "您已经成功提交申请，请耐心等待";
                $work = Work::find($id);
                $work->user()->attach($user_id);
                return redirect('/work/#silence_body')
                    ->withSuccess($apply_success);
            }

        } else {
            $apply_error = "请您登陆后，再提交申请";
            return redirect('/work/#silence_body')
                ->withErrors($apply_error);
        }
    }

    public function create()
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            return view('work.create');
        } else {
            return redirect('/');
        }
    }

    public function store(Requests\CreateWorkRequest $request)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            Work::create($request->all());
            return redirect('/background/work');
        } else {
            return redirect('/');
        }
    }

    public function show($id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $work = Work::find($id);
            $users = $work->user;
            return view('work.show',compact('work', 'users'));
        } else {
            return redirect('/');
        }
    }

    public function edit($id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $work = Work::find($id);
            return view('work.edit',compact('work'));
        } else {
            return redirect('/');
        }
    }

    public function update(Requests\CreateWorkRequest $request, $id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $work = Work::findOrFail($id);
            $work->update($request->all());
            return redirect('/background/work');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $work = Work::findOrFail($id);
            $work->delete();
            return redirect('/background/work');
        } else {
            return redirect('/');
        }
    }
}
