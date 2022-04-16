<?php

namespace App\Repository;

use App\Models\Comment;

class CommentRepository
{
    protected Comment $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function get(array $filters = [], array $options = [])
    {
        $query = $this->model;

        if (array_key_exists('with', $options)){
            $query = $query->with($options['with']);
        }

        if (array_key_exists('id', $filters)) {
            $query = $query->where('id', $filters['id']);
        }

        if (array_key_exists('parent_id', $filters)) {
            $query = $query->where('parent_id', $filters['parent_id']);
        }

        if (array_key_exists('layer', $filters)) {
            $query = $query->where('layer', $filters['layer']);
        }

        if (array_key_exists('user_name', $filters)) {
            $query = $query->where('user_name', $filters['user_name']);
        }

        return $query->get();
    }

    public function create(array $data)
    {
        return $this->model->create([
            'user_name' => $data['user_name'],
            'parent_id' => $data['parent_id'],
            'layer' => $data['layer'],
            'comment' => $data['comment'],
        ]);
    }
}
