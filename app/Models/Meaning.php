<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meaning extends Model
{
    use HasFactory;

    public function Feature()
    {
        return $this->belongsTo(Features::class);
    }

    public function Product()
    {
       return $this->belongsTo(Product::class);
    }

}
