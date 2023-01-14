<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name','slug','category_id','image','status','trending','original_price','selling_price','tax','quantity','short_description','description'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
