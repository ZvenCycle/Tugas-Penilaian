<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    // Toggle favorite
    public function toggle(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
        ]);

        $menuId = $request->menu_id;
        $userId = Auth::id();

        $favorite = Favorite::where('user_id', $userId)
            ->where('menu_id', $menuId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json([
                'status' => 'removed',
                'message' => 'Menu dihapus dari favorit'
            ]);
        } else {
            Favorite::create([
                'user_id' => $userId,
                'menu_id' => $menuId,
            ]);

            return response()->json([
                'status' => 'added',
                'message' => 'Menu ditambahkan ke favorit'
            ]);
        }
    }

    // Cek apakah menu favorit
    public function check($menuId)
    {
        $isFavorite = Favorite::where('user_id', Auth::id())
            ->where('menu_id', $menuId)
            ->exists();

        return response()->json(['is_favorite' => $isFavorite]);
    }

    // Halaman daftar favorit user
    public function index()
    {
        $favorites = Favorite::with('menu')
            ->where('user_id', Auth::id())
            ->get();

        return view('my-favorites', compact('favorites'));
    }

    // Admin melihat semua favorites
    public function adminIndex()
    {
        $favorites = Favorite::with(['user', 'menu'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'total_favorites' => Favorite::count(),
            'total_users_with_favorites' => Favorite::distinct('user_id')->count(),
            'total_favorited_menus' => Favorite::distinct('menu_id')->count()
        ];

        $topFavorites = DB::table('favorites')
            ->join('menus', 'favorites.menu_id', '=', 'menus.id')
            ->select('menus.id', 'menus.name', DB::raw('COUNT(favorites.id) as favorited_by_count'))
            ->groupBy('menus.id', 'menus.name')
            ->orderBy('favorited_by_count', 'desc')
            ->limit(6)
            ->get();

        return view('admin.favorites', compact('favorites', 'stats', 'topFavorites'));
    }
}
