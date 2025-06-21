<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Administration;
use App\Models\Course;
use App\Models\Collaboration;
use App\Models\Research;
use Illuminate\Support\Facades\Auth;

class FilesUploadController extends Controller
{
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

    public function uploadFile(Request $request)
    {
        // Validasi umum untuk file dan kategori
        $request->validate([
            'file' => 'required|file|max:2048', // Maks 2MB
            'type' => 'required|string',
            'visibility' => 'required|in:public,private',
        ]);

        $category = $request->input('type');
        $fileName = $request->file('file')->getClientOriginalName(); // Menggunakan nama asli file
        $filePath = '';
        $uploadedBy = Auth::id();

        // Menangani masing-masing kategori
        try {
            // Menangani masing-masing kategori
            switch ($category) {
                case 'administrator':
                    $request->validate([
                        'administrator_type' => 'required|string',
                        'file_description' => 'required|string',
                    ]);
                    $adminType = str_replace('_', ' ', $request->input('administrator_type'));
                    $filePath = "Administration/{$adminType}/{$fileName}";
                    $admin = Administration::create([
                        'file_name' => $fileName,
                        'file_path' => $filePath,
                        'description' => $request->input('file_description'),
                        'type' => $adminType,
                        'visibility' => $request->input('visibility'),
                        'uploaded_by' => $uploadedBy,
                    ]);
                    break;
    
                case 'courses':
                    $request->validate([
                        'courses_type' => 'required|string',
                        'prodi' => 'required|string',
                        'class' => 'required|string',
                        'subject' => 'required|string',
                    ]);
                    $coursesType = str_replace('_', ' ', $request->input('courses_type'));
                    $class = strtoupper($request->input('class'));

                    $subjectWords = explode(' ', strtolower($request->input('subject')));
                    $formattedSubject = array_map(function ($word) {
                        return (strlen($word) <= 4 && strtoupper($word) === $word) ? strtoupper($word) : ucfirst($word);
                    }, $subjectWords);

                    $subject = implode(' ', $formattedSubject);
                    $filePath = "Courses/{$coursesType}/{$request->input('prodi')}/{$class}/{$subject}/{$fileName}";
                    $course = Course::create([
                        'file_name' => $fileName,
                        'type' => $coursesType,
                        'prodi' => $request->input('prodi'),
                        'class' => $class,
                        'subject' => $subject,
                        'visibility' => $request->input('visibility'),
                        'uploaded_by' => $uploadedBy,
                        'file_path' => $filePath,
                    ]);
                    break;
    
                case 'collaboration':
                    $request->validate([
                        'collaboration_project_name' => 'required|string',
                    ]);
                    $project_name = strtolower($request->input('collaboration_project_name'));
                    $filePath = "Collaboration/{$project_name}/{$fileName}";
                    $collaboration = Collaboration::create([
                        'file_name' => $fileName,
                        'project_name' => $project_name,
                        'visibility' => $request->input('visibility'),
                        'uploaded_by' => $uploadedBy,
                        'file_path' => $filePath,
                    ]);
                    break;
    
                case 'research':
                    $request->validate([
                        'research_title' => 'required|string',
                        'research_topic' => 'required|string',
                        'research_description' => 'required|string',
                        'researcher_name' => 'required|string',
                        'research_year' => 'required|integer',
                    ]);
                    $researchTopic = $this->standardizeTopic($request->input('research_topic'));
                    $dbresearchTopic = strtolower($request->input('research_topic'));
                    $filePath = "Research/{$researchTopic}/{$fileName}";
                    $research = Research::create([
                        'file_name' => $fileName,
                        'file_path' => $filePath,
                        'title' => $request->input('research_title'),
                        'topic' => $dbresearchTopic,
                        'description' => $request->input('research_description'),
                        'researcher_name' => $request->input('researcher_name'),
                        'year' => $request->input('research_year'),
                        'visibility' => $request->input('visibility'),
                        'uploaded_by' => $uploadedBy,
                    ]);
                    break;
    
                default:
                    return back()->with('error', 'Kategori tidak valid.');
            }
    
            // Simpan file ke storage
            $storageDisk = $request->input('visibility') === 'private' ? 'private' : 'public';

            // Simpan file ke storage sesuai disk
            $request->file('file')->storeAs('RepoDosen', $filePath, $storageDisk);
            $storageDisk2 = $request->input('visibility') === 'private' ? 'repo_dosen_private' : 'repo_dosen';

            // Simpan file ke storage sesuai disk
            $request->file('file')->storeAs('', $filePath, $storageDisk2);
    
            return back()->with('success', 'File uploaded successfully.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Gagal mengupload file. Silakan coba lagi.');
        }
    }

    public function deleteFile(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'type' => 'required|string',
        ]);

        $category = $request->input('type');
        $fileId = $request->input('id');

        try {
            $filePath = '';
            $storageDisk = 'public'; // Default storage disk
            
            switch ($category) {
                case 'administration':
                    $file = Administration::findOrFail($fileId);
                    $filePath = $file->file_path;
                    $storageDisk = $file->visibility === 'private' ? 'private' : 'public';
                    $file->delete();
                    break;

                case 'courses':
                    $file = Course::findOrFail($fileId);
                    $filePath = $file->file_path;
                    $storageDisk = $file->visibility === 'private' ? 'private' : 'public';
                    $file->delete();
                    break;

                case 'collaboration':
                    $file = Collaboration::findOrFail($fileId);
                    $filePath = $file->file_path;
                    $storageDisk = $file->visibility === 'private' ? 'private' : 'public';
                    $file->delete();
                    break;

                case 'research':
                    $file = Research::findOrFail($fileId);
                    $filePath = $file->file_path;
                    $storageDisk = $file->visibility === 'private' ? 'private' : 'public';
                    $file->delete();
                    break;

                default:
                    return response()->json(['error' => 'Kategori tidak valid.'], 400);
            }

            // Hapus file dari storage
            if (Storage::disk($storageDisk)->exists($filePath)) {
                Storage::disk($storageDisk)->delete($filePath);
            }

            // Hapus dari disk tambahan jika ada
            $storageDisk2 = $storageDisk === 'private' ? 'repo_dosen_private' : 'repo_dosen';
            if (Storage::disk($storageDisk2)->exists($filePath)) {
                Storage::disk($storageDisk2)->delete($filePath);
            }

            return back()->with('success', 'File uploaded successfully.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Gagal mengupload file. Silakan coba lagi.');
        }
    }
}
