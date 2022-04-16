<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'layer',
        'user_name',
        'comment'
    ];

    protected $casts = [
        'created_at' => "datetime:Y-m-d\TH:iPZ",
    ];

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child()
    {
        return $this->hasMany(__CLASS__, 'parent_id', 'id')->orderBy('created_at','desc');
    }

    public function children()
    {
        return $this->child()->with('children')->orderBy('created_at','desc');
    }

    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_id', 'id')->orderBy('created_at','desc');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i');
    }

}
