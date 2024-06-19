<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subkategory extends Model
{
    protected $table = 'subkategorys'; // Nama tabel di database
    protected $fillable = ['code', 'name'];

    // Relasi dengan Product
    public function products()
    {
        return $this->hasMany(Product::class, 'subkategory_id');
    }
}
