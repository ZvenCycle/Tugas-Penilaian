<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi mass assignment
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'role',
        'avatar',
        'notification_settings', // tambahkan ini
    ];

    /**
     * Kolom yang disembunyikan saat di-serialize
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Konversi tipe otomatis
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'notification_settings' => 'array', // otomatis cast JSON ke array
    ];

    /**
     * Mutator untuk hash password otomatis
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            // Cegah double-hash: hanya hash kalau value belum ter-hash
            if (Hash::needsRehash($value)) {
                $this->attributes['password'] = Hash::make($value);
            } else {
                $this->attributes['password'] = $value;
            }
        }
    }

    /**
     * Relasi ke favorites
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }

    /**
     * Relasi many-to-many ke menu melalui favorites
     */
    public function favoriteMenus()
    {
        return $this->belongsToMany(Menu::class, 'favorites', 'user_id', 'menu_id');
    }

    /**
     * Cek apakah user sudah favorite menu tertentu
     */
    public function hasFavorited($menuId)
    {
        return $this->favorites()->where('menu_id', $menuId)->exists();
    }
}
