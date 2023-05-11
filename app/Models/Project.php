<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\FeatureRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable=['name','slug'];

    public function featureRequests()
    {
        return $this->hasMany(FeatureRequest::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
