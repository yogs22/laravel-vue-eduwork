<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with('user')->latest()->get(); // select * from contents join user

        return view('content.index', compact('contents'));
    }

    public function create()
    {
        return view('content.create');
    }

    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;

        Content::create($request->all());

        return redirect()->route('content.index')->with(['message' => 'Sukses membuat data']);
    }
}
