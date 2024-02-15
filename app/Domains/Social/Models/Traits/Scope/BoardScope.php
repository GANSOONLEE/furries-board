<?php

namespace App\Domains\Social\Models\Traits\Scope;

/**
 * Trait BoardScope.
 */
trait BoardScope
{

    /**
     * @param $query
     * 
     * @return mixed
     */
    public function scopePublish($query)
    {
        return $query->where('state', 'publish');
    }

    /**
     * @param $query
     * 
     * @return mixed
     */
    public function scopeDelist($query)
    {
        return $query->where('state', 'delist');
    }

    /**
     * @param $query
     */
    public function scopeBoards($query)
    {
        return $query->where('author_id', auth()->user()->id);
    }
}