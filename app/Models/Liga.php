<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class, 'liga_id', 'id');
    }
}
