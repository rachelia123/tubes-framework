<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategory extends Model
{
    protected $table = 'kategorys'; // Nama tabel di database
    protected $fillable = ['code', 'name'];

    // Relasi dengan Product
    public function products()
    {
        return $this->hasMany(Product::class, 'kategory_id');
    }
}
