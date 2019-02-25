<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = ['manufacturer_id', 'sku', 'name', 'quantity', 'price', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_product');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function($product){
            if(empty($product->slug)){
                $product->slug = str_slug($product->name);
            }else{
                $product->slug = strtolower($product->slug);
            }
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    /**
     * @return array | Name for columns
     */
    public function nameColumns()
    {
        return [
            'id' => 'id',
            'name' => 'name',
            'sku' => 'sku',
            'quantity' => 'quantity',
            'price' => 'price',
            'action' => 'action'
        ];
    }
}
