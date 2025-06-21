<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\Course;
use App\Models\Collaboration;
use App\Models\Research;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function search(Request $request)
        {
            // Ambil keyword pencarian dari input
            $search = $request->input('search');

            if ($search) {
                // Cari di beberapa model dan simpan dalam koleksi
                $adminResults = Administration::where('file_name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%")
                    ->get();
                $adminResults->each(fn($item) => $item->category = 'admin'); // Tambahkan kategori

                $courseResults = Course::where('file_name', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%")
                    ->orWhere('prodi', 'like', "%{$search}%")
                    ->orWhere('class', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->get();
                $courseResults->each(fn($item) => $item->category = 'course'); // Tambahkan kategori

                $collaborationResults = Collaboration::where('file_name', 'like', "%{$search}%")
                    ->orWhere('project_name', 'like', "%{$search}%")
                    ->get();
                $collaborationResults->each(fn($item) => $item->category = 'collaboration'); // Tambahkan kategori

                $researchResults = Research::where('title', 'like', "%{$search}%")
                    ->orWhere('topic', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('researcher_name', 'like', "%{$search}%")
                    ->orWhere('year', 'like', "%{$search}%")
                    ->get();
                $researchResults->each(fn($item) => $item->category = 'research'); // Tambahkan kategori

                // Gabungkan semua hasil pencarian ke dalam satu koleksi
                $results = collect()
                    ->merge($adminResults)
                    ->merge($courseResults)
                    ->merge($collaborationResults)
                    ->merge($researchResults);

                // Buat pagination untuk hasil gabungan
                $perPage = 10; // Tentukan jumlah per halaman
                $currentPage = $request->input('page', 1);
                $paginatedResults = new LengthAwarePaginator(
                    $results->forPage($currentPage, $perPage), // Data untuk halaman saat ini
                    $results->count(), // Total item
                    $perPage, // Item per halaman
                    $currentPage, // Halaman saat ini
                    ['path' => $request->url(), 'query' => $request->query()] // Path dan query
                );

                // Tampilkan hasil pencarian ke view
                return view('search.results', compact('paginatedResults', 'search'));
            }

            // Jika tidak ada kata kunci, kembalikan ke halaman pencarian
            return redirect()->route('auth.dashboard');
        }
}
