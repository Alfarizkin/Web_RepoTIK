<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'latest');

        // Ambil data pengguna sesuai filter
        if ($sort === 'oldest') {
            // Mengurutkan berdasarkan tanggal dibuat (terlama)
            $paginatedResults = User::orderBy('created_at', 'asc')->paginate(10);
        } else {
            // Default: mengurutkan berdasarkan tanggal dibuat (terbaru)
            $paginatedResults = User::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('users.index', compact('paginatedResults'));
    }
    
    public function update(Request $request, User $user) {
        \Log::info($request->all()); 
        // Validasi input 
        $validated = $request->validate([ 
            'user_name' => ['required', 'string', 'max:255'], 
            'email' => 'required|email|max:255',
            'role' => 'required|in:operator,dosen,public', 
        ]); 
        \Log::info('Validated data:', $validated);

            // Update data user
        try{
            $user = User::findOrFail($request->user_id);

            $user->name = $validated['user_name']; 
            $user->email = $validated['email']; 
            $user->role = $validated['role']; 

            // Simpan perubahan 
            $user->save(); 
            \Log::info('User Role:', ['role' => $validated['user_role']]); 
            
            // Redirect dengan pesan sukses
            return redirect()->route('users.index')->with('success', 'User updated successfully!'); 
        } catch (\Exception $e) { 
            \Log::error('Update failed:', ['error' => $e->getMessage()]); return redirect()->route('users.index')->with('error', 'Failed to update user.');
            
        }
    }
    
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
