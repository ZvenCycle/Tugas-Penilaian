<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('menu')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('my-favorites', compact('favorites'));
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
        ]);

        $userId = Auth::id();
        $menuId = $request->menu_id;

        $favorite = Favorite::where('user_id', $userId)
            ->where('menu_id', $menuId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $isFavorited = false;
            $message = 'Menu dihapus dari favorit';
        } else {
            Favorite::create([
                'user_id' => $userId,
                'menu_id' => $menuId,
            ]);
            $isFavorited = true;
            $message = 'Menu ditambahkan ke favorit';
        }

        return response()->json([
            'success' => true,
            'is_favorited' => $isFavorited,
            'message' => $message,
        ]);
    }
}
