<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'featured_image',
        'order_no',
        'meta_title',
        'meta_description'
    ];

    public function sluggable():array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function services() {
        return $this->hasMany(Portfolio::class, 'service_id_fk', 'id')->orderBy('order_no', 'ASC');
    }
}
