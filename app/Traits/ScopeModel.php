<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ScopeModel
{
    /**
     * Scope a query to order descending record by created_at.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeDescendingOrder(Builder $query)
    {
        return $query->orderBy('created_at', 'DESC');
    }
}