<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable = ['product_id', 'image_path'];

    /**s
     * Relationship to associate a PDF with its product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
