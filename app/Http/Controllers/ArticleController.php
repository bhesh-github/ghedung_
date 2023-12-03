<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::latest()->get();
        return view('admin.article.index', compact("article"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // artilce
        $article = new Article;
        $article->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $article->id . '-' . Str::random(9);
        $article->slug = $slug;
        $article->subtitle = $request->subtitle;
        $article->article_post_date = $request->article_post_date;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/article/', $filename);
            $article->image = $filename;
        }
        $article->description = $request->description;

        // writer
        $article->writer_name = $request->writer_name;
        $article->writer_address = $request->writer_address;
        if ($request->hasfile('writer_image')) {
            $file = $request->file('writer_image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/article/', $filename);
            $article->writer_image = $filename;
        }
        $article->shares = 0;
        if ($request->status) {
            $article->status = "on";
        } else {
            $article->status = "off";
        }
        $article->save();
        return redirect()->route('article.index')->with('success', 'Article has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.edit', compact("article"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // artilce
        $article = Article::find($request->id);
        $article->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $article->id . '-' . Str::random(9);
        $article->slug = $slug;
        $article->subtitle = $request->subtitle;
        $article->article_post_date = $request->article_post_date;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/article/', $filename);
            $article->image = $filename;
        }
        $article->description = $request->description;

        // writer
        $article->writer_name = $request->writer_name;
        $article->writer_address = $request->writer_address;
        if ($request->hasfile('writer_image')) {
            $file = $request->file('writer_image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/article/', $filename);
            $article->writer_image = $filename;
        }
        $article->shares = 0;
        if ($request->status) {
            $article->status = "on";
        } else {
            $article->status = "off";
        }
        $article->update();
        return redirect()->route('article.index')->with('success', 'Article has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeStatus($id)
    {
        $article = Article::find($id);
        if ($article->status == 'on') {
            $article->status = 'off';
        } elseif ($article->status == 'off') {
            $article->status = 'on';
        }
        $article->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $article = Article::find($request->id);
        $article->delete();
        return back()->with('success', 'Article has been removed successfully');
    }
}
