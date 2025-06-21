<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use App\Models\Collaboration;
use App\Models\Course;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function download($category, $id)
    {
        $model = null;
        switch ($category) {
            case 'admin':
                $model = Administration::findOrFail($id);
                break;
            case 'research':
                $model = Research::findOrFail($id);
                break;
            case 'collaboration':
                $model = Collaboration::findOrFail($id);
                break;
            case 'course':
                $model = Course::findOrFail($id);
                break;
            default:
                return back()->with('error', 'File category not found.');
        }

        $filePath = "RepoDosen/" . $model->file_path;

        \Log::info('Downloading file from path: ' . $filePath);
        \Log::info('Full path (public): ' . storage_path('app/public/' . $filePath));

        if (!Storage::disk('public')->exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download($filePath);
    }
}
