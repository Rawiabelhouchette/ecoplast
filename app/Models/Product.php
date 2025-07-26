<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image', 'qty', 'video'];

    public function pdfs()
    {
        return $this->hasMany(ProductPdf::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }



}
