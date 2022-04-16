<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'layer',
        'user_name',
        'comment'
    ];

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child()
    {
        return $this->hasMany(__CLASS__, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_id', 'id');
    }
}
