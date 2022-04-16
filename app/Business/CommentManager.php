<?php

namespace App\Business;

use App\Repository\CommentRepository;

class CommentManager
{
    /**
     * @var CommentRepository
     */
    private CommentRepository $commentRepository;

    /**
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Get All Comments With Child Comments
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getParentCommentsWithChild()
    {
        return $this->commentRepository->get([
            'parent_id' => 0
        ], [
            'with' => 'children',
            'orderBy' => 'desc'
        ]);
    }

    /**
     * Create Comment
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $data['layer'] = (string)$data['layer'];

        if (empty($data['parent_id'])){
            $data['parent_id'] = 0;
        }

        return $this->commentRepository->create($data);
    }
}
