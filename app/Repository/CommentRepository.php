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

    /**
     * fetch comments by filter and options
     *
     * @param array $filters
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
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

        if (array_key_exists('orderBy', $options)){
            $query = $query->orderBy('created_at', $options['orderBy']);
        }

        return $query->get();
    }

    /**
     * create comment
     *
     * @param array $data
     * @return mixed
     */
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
