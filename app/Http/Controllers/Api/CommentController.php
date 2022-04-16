<?php

namespace App\Http\Controllers\Api;

use App\Business\CommentManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Fetch All Comments
     *
     * @param Request $request
     * @param CommentManager $manager
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, CommentManager $manager)
    {
        $comments = $manager->getParentCommentsWithChild();

        return response_success($comments);
    }

    /**
     * Store Comment
     *
     * @param CreateCommentRequest $request
     * @param CommentManager $manager
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateCommentRequest $request, CommentManager $manager)
    {
        $validated = $request->validated();

        $comment = $manager->create($validated);

        return response_success($comment);
    }
}
