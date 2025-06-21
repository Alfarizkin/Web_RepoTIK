<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $jadwalFiles = Administration::where('type', 'Jadwal Kuliah')
                            ->where('visibility', 'public')
                            ->latest('created_at')
                            ->take(4)
                            ->get();

        $researchPublications = Research::where('visibility', 'public')
                                        ->latest('year')
                                        ->take(4)
                                        ->get();

        return view('index', compact('jadwalFiles', 'researchPublications'));
    }

    public function showDashboard()
    {
        $jadwalFiles = Administration::where('type', 'Jadwal Kuliah')
                            ->where('visibility', 'public')
                            ->latest('created_at')
                            ->take(4)
                            ->get();

        $researchPublications = Research::where('visibility', 'public')
                                        ->latest('year')
                                        ->take(4)
                                        ->get();

        return view('auth.dashboard', compact('jadwalFiles', 'researchPublications'));
    }

    public function preview($id)
    {
        // Ambil data file berdasarkan ID
        $file = Administration::findOrFail($id); // Pastikan untuk mengganti ini dengan model yang sesuai
        $filePath = $file->file_path; // Ambil file_path dari database
        $fullPath = "RepoDosen/{$filePath}";

        // Dapatkan URL untuk file
        $fileUrl = Storage::disk('public')->url($fullPath); // Ini akan memberikan URL yang bisa diakses untuk file

        // Log URL file untuk debugging
        \Log::info('Previewing file: ' . $file->file_name . ' at URL: ' . $fileUrl);

        return view('preview', compact('file', 'fileUrl'));
    }
}

