<?php

namespace App\Business;

use App\Repository\CommentRepository;

class CommentManager
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getParentCommentsWithChild()
    {
        return $this->commentRepository->get([
            'parent_id' => 0
        ], [
            'with' => 'child'
        ]);
    }

    public function create(array $data)
    {
        $data['layer'] = (string)$data['layer'];

        if (empty($data['parent_id'])){
            $data['parent_id'] = 0;
        }

        return $this->commentRepository->create($data);
    }
}
