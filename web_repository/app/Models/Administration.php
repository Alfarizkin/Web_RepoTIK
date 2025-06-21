<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name', 'file_path', 'description', 'type', 'uploaded_by', 'visibility',
    ];

    public function getUploadDateAttribute()
    {
        return $this->created_at->format('d F Y');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
