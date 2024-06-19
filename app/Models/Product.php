<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $table = 'products'; // Nama tabel di database
    protected $fillable = ['name', 'price', 'kategory', 'subKategory', 'image'];


    public function storeImage(UploadedFile $file)
    {
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $filename);
        return $filename;
    }

    // Relasi dengan Kategory
    public function kategory()
    {
        return $this->belongsTo(Kategory::class, 'kategorys_id');
    }

    // Relasi dengan Subkategory
    public function subkategory()
    {
        return $this->belongsTo(Subkategory::class, 'subKategorys_id');
    }
}
