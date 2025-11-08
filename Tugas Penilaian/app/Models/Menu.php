<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;
use App\Models\User;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus'; // pastikan sesuai nama tabel di database

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    /**
     * Relasi ke favorites (1 menu bisa difavoritkan banyak user)
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'menu_id');
    }
    
    /**
     * Relasi many-to-many ke users melalui favorites
     */
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites', 'menu_id', 'user_id');
    }
}
