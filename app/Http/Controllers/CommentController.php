<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        $project = Project::find($id);

        $data['user_id'] = Auth::id();
        $data['project_id'] = $project->id;

        Comment::create($data);

        return back();
    }

    public function destroy(Comment $comment)
    {
       
            $comment->delete();
            return back()->with('success', 'Commentaire supprimé.');
    

    }
}