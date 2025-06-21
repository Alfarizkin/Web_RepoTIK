<?php

namespace App\Http\Controllers;

use App\Models\Files; // Pastikan ini mengarah ke model Repository Anda
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    /**
     * Menampilkan hasil pencarian berdasarkan kata kunci.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // Mendapatkan input pencarian
        $query = $request->input('search');

        // Query pencarian
        $results = Files::when($query, function ($q) use ($query) {
                return $q->where('title', 'like', '%' . $query . '%')
                         ->orWhere('content', 'like', '%' . $query . '%'); // Ganti 'content' dengan kolom yang sesuai
            })
            ->paginate(10); // Menampilkan 10 hasil per halaman

        // Mengembalikan view dengan hasil pencarian
        return view('search', compact('results', 'query'));
    }
}