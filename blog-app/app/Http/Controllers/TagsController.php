<?php

namespace App\Http\Controllers;

use App\Models\TagsModel;
use Illuminate\Http\Request;

class TagsController extends Controller{

    public function getTags(Request $request){
        $search = $request->input('q');
        $tags = TagsModel::where('name', 'like', "%$search%")->get();
        return response()->json($tags);
    }

}
