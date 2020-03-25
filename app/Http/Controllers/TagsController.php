<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'tagName' => 'required'
        ]);
        $tags = new Tag;        
        
        $tags->tag = $request->tagName;
        $tags->save();

        return redirect('/admin/tags')->with('success', 'Tag Created');
    }
}
