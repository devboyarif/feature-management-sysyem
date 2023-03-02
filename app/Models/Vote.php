<?php

namespace App\Models;

use App\Models\FeatureRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function feature_request(): BelongsTo
    {
        return $this->belongsTo(FeatureRequest::class);
    }
}
