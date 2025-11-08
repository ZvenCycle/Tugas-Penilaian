<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); // ambil semua data dari tabel menus
        return view('menu', compact('menus'));
    }
}
