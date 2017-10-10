<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * 文章首页
     * 
     * 功能：展示所有文章内容。
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->publish()->simplePaginate(15);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            return view('article.create');
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
    public function store(Requests\CreateArticleRequest $request)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            Article::create($request->all());
            return redirect('/background/article');
        } else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $article = Article::findOrFail($id);
            return view('article.edit', compact('article'));
        } else {
            return redirect('/');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateArticleRequest $request, $id)
    {
        if(\Auth::user() && \Auth::user()->level == 1) {
            $article =  Article::findOrFail($id);
            $article->update($request->all());
            return redirect('/background/article');
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
            $article = Article::findOrFail($id);
            $article->delete();
            return redirect('/background/article');
        } else {
            return redirect('/');
        }

    }
}
