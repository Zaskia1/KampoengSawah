<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Data menu sementara (nanti bisa diganti dengan database)
        $menus = [
            [
                'nama' => 'Ayam Geprek',
                'deskripsi' => 'Ayam goreng dengan geprekan khas',
                'harga' => 10000,
                'gambar' => 'images\logo_waroeng_sawah.png' // Simpan gambar di public/images
            ],
            [
                'nama' => 'Nasi Goreng',
                'deskripsi' => 'Nasi goreng spesial dengan telur',
                'harga' => 15000,
                'gambar' => 'images\logo_waroeng_sawah.png'
            ]
        ];

        return view('order.menu', compact('menus'));
    }
}
