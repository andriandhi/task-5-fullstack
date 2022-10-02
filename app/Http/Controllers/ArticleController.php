<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function deleteArticle($id)
    {
        $article = Article::where('id', '=', $id)->first();
        if ($article == null) {
            return response(['message' => $id . ' unavailable'], 422);
        }
        $response = ['message' => $article];
        return view('deleteArticle', $response);
    }
    public function deleteArticleSubmit($id)
    {
        Article::where('id', '=', $id)->first()->delete();
        $response = ['message' => DB::table('articles')->select('id', 'title')->paginate(5)];
        return view('articles', $response);
    }
    public function showArticles()
    {
        $response = ['message' => DB::table('articles')->select('id', 'title')->paginate(5)];
        return view('articles', $response);
    }
    public function createArticles()
    {
        return view('newArticle');
    }
    public function createArticlesSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|url'
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $request['user_id'] = $request->user()->id;
        if ($request['category']) {
            $cat = Category::where('name', '=', $request['category'])->first();
            if ($cat == null) {
                $request['category_id'] = Category::create([
                    'name' => $request['category'],
                    'user_id' => $request['user_id']
                ])->id;
            } else {
                $request['category_id'] = $cat->id;
            }
        }
        $article = Article::create($request->toArray());
        if ($article->category_id != null) {
            $article['category'] = Category::where('id', '=', $article->category_id)->first();
        }
        $response = ['message' => $article];
        return view('detailArticle', $response);
    }
    public function detailArticle($id)
    {
        if (!is_numeric($id)) {
            return response(['message' => $id . ' invalid'], 422);
        }
        $article = Article::where('id', '=', $id)->first();
        if ($article == null) {
            return response(['message' => $id . ' unavailable'], 422);
        }
        if ($article->category_id != null) {
            $article['category'] = Category::where('id', '=', $article->category_id)->first();
        }
        $response = ['message' => $article];
        return view('detailArticle', $response);
    }
    public function updateArticle($id)
    {
        if (!is_numeric($id)) {
            return response(['message' => $id . ' invalid'], 422);
        }
        $article = Article::where('id', '=', $id)->first();
        if ($article == null) {
            return response(['message' => $id . ' unavailable'], 422);
        }
        if ($article->category_id != null) {
            $article['category'] = Category::where('id', '=', $article->category_id)->first();
        }
        $response = ['message' => $article];
        return view('updateArticle', $response);
    }
    public function updateArticleSubmit(Request $request, $id)
    {
        $article = Article::where('id', '=', $id)->first();
        if ($article == null) {
            return response(['error' => $id . ' unavailable'], 422);
        }
        if ($request['title'] == null) {
            $request['title'] = $article['title'];
        }
        if ($request['content'] == null) {
            $request['content'] = $article['content'];
        }
        if ($request['image'] == null) {
            $request['image'] = $article['image'];
        }
        $request['user_id'] = $request->user()->id;
        if ($request['category']) {
            $cat = Category::where('name', '=', $request['category'])->first();
            if ($cat == null) {
                $request['category_id'] = Category::create([
                    'name' => $request['category'],
                    'user_id' => $request['user_id']
                ])->id;
            } else {
                $request['category_id'] = $cat->id;
            }
        }
        $article->update($request->toArray());
        $article = Article::where('id', '=', $id)->first();
        if ($article->category_id != null) {
            $article['category'] = Category::where('id', '=', $article->category_id)->first();
        }
        $response = ['message' => $article];
        return view('detailArticle', $response);
    }
    public function list()
    {
        $response = ['message' => DB::table('articles')->select('id', 'title')->paginate(5)];
        return response($response, 200);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $request['user_id'] = $request->user()->id;
        if ($request['category']) {
            $cat = Category::where('name', '=', $request['category'])->first();
            if ($cat == null) {
                $request['category_id'] = Category::create([
                    'name' => $request['category'],
                    'user_id' => $request['user_id']
                ])->id;
            } else {
                $request['category_id'] = $cat->id;
            }
        }
        $article = Article::create($request->toArray());
        if ($article->category_id != null) {
            $article['category'] = Category::where('id', '=', $article->category_id)->first();
        }
        $response = ['message' => $article];
        return response($response, 200);
    }
    public function show($id)
    {
        if (strcmp($id, 'create') == 0) {
            return response(['message' => 'use POST to access this end point'], 422);
        }
        if (!is_numeric($id)) {
            return response(['message' => $id . ' invalid'], 422);
        }
        $article = Article::where('id', '=', $id)->first();
        if ($article == null) {
            return response(['message' => $id . ' unavailable'], 422);
        }
        if ($article->category_id != null) {
            $article['category'] = Category::where('id', '=', $article->category_id)->first();
        }
        $response = ['message' => $article];
        return response($response, 200);
    }
    public function update($id, Request $request)
    {
        $article = Article::where('id', '=', $id)->first();
        if ($article == null) {
            return response(['error' => $id . ' unavailable'], 422);
        }
        if ($request['title'] == null) {
            $request['title'] = $article['title'];
        }
        if ($request['content'] == null) {
            $request['content'] = $article['content'];
        }
        if ($request['image'] == null) {
            $request['image'] = $article['image'];
        }
        $request['user_id'] = $request->user()->id;
        if ($request['category']) {
            $cat = Category::where('name', '=', $request['category'])->first();
            if ($cat == null) {
                $request['category_id'] = Category::create([
                    'name' => $request['category'],
                    'user_id' => $request['user_id']
                ])->id;
            } else {
                $request['category_id'] = $cat->id;
            }
        }
        $article->update($request->toArray());
        $article = Article::where('id', '=', $id)->first();
        if ($article->category_id != null) {
            $article['category'] = Category::where('id', '=', $article->category_id)->first();
        }
        return response(['message' => $article], 200);
    }
    public function delete($id)
    {
        $article = Article::where('id', '=', $id)->first();
        if ($article == null) {
            return response(['message' => $id . ' unavailable'], 200);
        }
        if ($article->category_id != null) {
            $article['category'] = Category::where('id', '=', $article->category_id)->first();
        }
        $response = [Article::where('id', '=', $id)->first()->delete() ? 'deleted' : 'unable to delete' => $article];
        return response($response, 200);
    }
}
