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
        // Ambil keyword pencarian, kategori, dan opsi sorting
        $search = $request->input('search');
        $category = $request->input('category');
        $sort = $request->input('sort', 'latest'); // Default 'latest'

        // Log pencarian untuk debugging
        \Log::info('Search Query:', ['search' => $search, 'category' => $category]);

        // Inisialisasi collection kosong
        $results = collect();

        // Filter berdasarkan kategori
        switch ($category) {
            case 'administration':
                $results = Administration::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('file_name', 'like', "%{$search}%")
                                     ->orWhere('description', 'like', "%{$search}%")
                                     ->orWhere('type', 'like', "%{$search}%");
                    })
                    ->get()
                    ->map(fn($item) => $item->setAttribute('category', 'administration'));
                break;

            case 'course':
                $results = Course::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('file_name', 'like', "%{$search}%")
                                     ->orWhere('type', 'like', "%{$search}%")
                                     ->orWhere('prodi', 'like', "%{$search}%")
                                     ->orWhere('class', 'like', "%{$search}%")
                                     ->orWhere('subject', 'like', "%{$search}%");
                    })
                    ->get()
                    ->map(fn($item) => $item->setAttribute('category', 'course'));
                break;

            case 'collaboration':
                $results = Collaboration::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('file_name', 'like', "%{$search}%")
                                     ->orWhere('project_name', 'like', "%{$search}%");
                    })
                    ->get()
                    ->map(fn($item) => $item->setAttribute('category', 'collaboration'));
                break;

            case 'research':
                $results = Research::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('title', 'like', "%{$search}%")
                                     ->orWhere('topic', 'like', "%{$search}%")
                                     ->orWhere('description', 'like', "%{$search}%")
                                     ->orWhere('researcher_name', 'like', "%{$search}%")
                                     ->orWhere('year', 'like', "%{$search}%");
                    })
                    ->get()
                    ->map(fn($item) => $item->setAttribute('category', 'research'));
                break;

            default:
                // Jika kategori tidak dipilih, ambil semua data dari semua kategori
                $adminResults = Administration::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('file_name', 'like', "%{$search}%")
                                     ->orWhere('description', 'like', "%{$search}%")
                                     ->orWhere('type', 'like', "%{$search}%");
                    })
                    ->get()
                    ->map(fn($item) => $item->setAttribute('category', 'administration'));

                $courseResults = Course::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('file_name', 'like', "%{$search}%")
                                     ->orWhere('type', 'like', "%{$search}%")
                                     ->orWhere('prodi', 'like', "%{$search}%")
                                     ->orWhere('class', 'like', "%{$search}%")
                                     ->orWhere('subject', 'like', "%{$search}%");
                    })
                    ->get()
                    ->map(fn($item) => $item->setAttribute('category', 'course'));

                $collaborationResults = Collaboration::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('file_name', 'like', "%{$search}%")
                                     ->orWhere('project_name', 'like', "%{$search}%");
                    })
                    ->get()
                    ->map(fn($item) => $item->setAttribute('category', 'collaboration'));

                $researchResults = Research::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('title', 'like', "%{$search}%")
                                     ->orWhere('topic', 'like', "%{$search}%")
                                     ->orWhere('description', 'like', "%{$search}%")
                                     ->orWhere('researcher_name', 'like', "%{$search}%")
                                     ->orWhere('year', 'like', "%{$search}%");
                    })
                    ->get()
                    ->map(fn($item) => $item->setAttribute('category', 'research'));

                $results = collect()
                    ->merge($adminResults)
                    ->merge($courseResults)
                    ->merge($collaborationResults)
                    ->merge($researchResults);
                break;
        }

        // Sorting berdasarkan 'created_at'
        $results = $sort === 'oldest' ? $results->sortBy('created_at') : $results->sortByDesc('created_at');

        // Pagination
        $perPage = 10;
        $currentPage = $request->input('page', 1);
        $paginatedResults = new LengthAwarePaginator(
            $results->forPage($currentPage, $perPage),
            $results->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Return hasil ke view
        return view('search.results', compact('paginatedResults', 'search', 'category', 'sort'));
    }
}
