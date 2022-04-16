<?php

namespace App\Http\Controllers\Api;

use App\Business\CommentManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(Request $request, CommentManager $manager)
    {
        $comments = $manager->getParentCommentsWithChild();

        return response_success($comments);
    }

    public function store(CreateCommentRequest $request, CommentManager $manager)
    {
        $validated = $request->validated();

        $comment = $manager->create($validated);

        return response_success($comment);
    }
}
