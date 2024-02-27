<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:225',
            'text' => 'required',
            'views' => 'required|integer',
        ]);

        $article = Article::create($validated);
        return response()->json($article);
    }

    public function index() {
        return response()->json(Article::all()); #find(2), where('id', '!=', 1)->get(), first()
    }
}
