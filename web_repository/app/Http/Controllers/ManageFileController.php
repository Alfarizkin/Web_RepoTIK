<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Administration;
use App\Models\Course;
use App\Models\Collaboration;
use App\Models\Research;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class ManageFileController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $sort = $request->get('sort', 'latest');

        $adminFiles = Administration::all()->map(function ($item) {
            $item->category = 'administration';
            return $item;
        });

        $collaborationFiles = Collaboration::all()->map(function ($item) {
            $item->category = 'collaboration';
            return $item;
        });

        $researchFiles = Research::all()->map(function ($item) {
            $item->category = 'research';
            return $item;
        });

        $courseFiles = Course::all()->map(function ($item) {
            $item->category = 'course';
            return $item;
        });

        $allFiles = collect()
            ->merge($adminFiles)
            ->merge($collaborationFiles)
            ->merge($researchFiles)
            ->merge($courseFiles)
            ->values();

            // Filter berdasarkan kategori
        if ($category) {
            $allFiles = $allFiles->filter(function ($file) use ($category) {
                return $file->category === $category;
            });
        }

        // Filter berdasarkan tanggal
        if ($sort === 'latest') {
            $allFiles = $allFiles->sortByDesc('created_at');
        } elseif ($sort === 'oldest') {
            $allFiles = $allFiles->sortBy('created_at');
        }

        $allFiles = $allFiles->values();

        // Paginasi
        $perPage = 10;
        $currentPage = $request->input('page', 1);

        $paginatedResults = new LengthAwarePaginator(
            $allFiles->forPage($currentPage, $perPage),
            $allFiles->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Return view dengan data
        return view('files.index', compact('paginatedResults'));
    }

    public function standardizeTopic($input) {
        // Normalisasi huruf kecil
        $normalized = strtolower($input);
    
        // Ganti istilah tertentu
        $replacements = [
            // IoT
            'iot' => 'internet of thing',
            'internet of things' => 'internet of thing',
    
            // AI
            'ai' => 'artificial intelligence',
            'ml' => 'machine learning',
            'dl' => 'deep learning',
            'nn' => 'neural networks',
    
            // Big Data
            'bd' => 'big data',
            'dm' => 'data mining',
            'da' => 'data analytics',
    
            // Cloud Computing
            'cloud' => 'cloud computing',
    
            // Cybersecurity
            'cyber' => 'cybersecurity',
    
            // Software Development
            'web dev' => 'web development',
            'mobile dev' => 'mobile development',
    
            // Others
            'bc' => 'blockchain technology',
            'crypto' => 'cryptography',
            'hci' => 'human-computer interaction',
        ];
    
        // Terapkan penggantian
        return $replacements[$normalized] ?? $normalized;
    }

    public function updateFile(Request $request, $fileId)
    {
        // Validasi file dan kategori
        $request->validate([
            'file' => 'required|file|max:2048', // Maks 2MB
            'type' => 'required|string',
            'visibility' => 'required|in:public,private',
        ]);

        // Temukan file yang akan diperbarui
        $file = null;
        $category = $request->input('type');
        $uploadedBy = Auth::id();

        // Tentukan model berdasarkan kategori
        switch ($category) {
            case 'administrator':
                $file = Administration::findOrFail($fileId);
                break;
            case 'courses':
                $file = Course::findOrFail($fileId);
                break;
            case 'collaboration':
                $file = Collaboration::findOrFail($fileId);
                break;
            case 'research':
                $file = Research::findOrFail($fileId);
                break;
            default:
                return back()->with('error', 'Kategori tidak valid.');
        }

        // Jika file ditemukan, lanjutkan untuk update
        try {
            $newFile = $request->file('file');
            $newFileName = $newFile->getClientOriginalName(); // Nama file baru
            $newFilePath = ''; // Tentukan path file baru sesuai kategori

            // Menangani masing-masing kategori dan membuat path baru untuk file yang diupload
            switch ($category) {
                case 'administrator':
                    $adminType = str_replace('_', ' ', $request->input('administrator_type'));
                    $newFilePath = "Administration/{$adminType}/{$newFileName}";
                    $file->update([
                        'file_name' => $newFileName,
                        'file_path' => $newFilePath,
                        'description' => $request->input('file_description'),
                        'visibility' => $request->input('visibility'),
                    ]);
                    break;
        
                case 'courses':
                    $coursesType = str_replace('_', ' ', $request->input('courses_type'));
                    $class = strtoupper($request->input('class'));
                    $subject = $this->formatSubject($request->input('subject'));
                    $newFilePath = "Courses/{$coursesType}/{$request->input('prodi')}/{$class}/{$subject}/{$newFileName}";
                    $file->update([
                        'file_name' => $newFileName,
                        'file_path' => $newFilePath,
                        'visibility' => $request->input('visibility'),
                    ]);
                    break;
        
                case 'collaboration':
                    $project_name = strtolower($request->input('collaboration_project_name'));
                    $newFilePath = "Collaboration/{$project_name}/{$newFileName}";
                    $file->update([
                        'file_name' => $newFileName,
                        'file_path' => $newFilePath,
                        'visibility' => $request->input('visibility'),
                    ]);
                    break;
        
                case 'research':
                    $researchTopic = $this->standardizeTopic($request->input('research_topic'));
                    $dbresearchTopic = strtolower($request->input('research_topic'));
                    $newFilePath = "Research/{$researchTopic}/{$newFileName}";
                    $file->update([
                        'file_name' => $newFileName,
                        'file_path' => $newFilePath,
                        'title' => $request->input('research_title'),
                        'topic' => $dbresearchTopic,
                        'description' => $request->input('research_description'),
                        'researcher_name' => $request->input('researcher_name'),
                        'year' => $request->input('research_year'),
                        'visibility' => $request->input('visibility'),
                    ]);
                    break;
            }

            // Simpan file baru ke storage
            $storageDisk = $request->input('visibility') === 'private' ? 'private' : 'public';
            $newFile->storeAs('RepoDosen', $newFilePath, $storageDisk);

            // Jika file sebelumnya ada di storage, hapus file lama
            if ($file->file_path) {
                Storage::disk($storageDisk)->delete($file->file_path);
            }

            return back()->with('success', 'File berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Gagal memperbarui file. Silakan coba lagi.');
        }
    }
    
}
