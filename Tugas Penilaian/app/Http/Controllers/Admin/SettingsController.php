<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class SettingsController extends Controller
{
    // Tampilkan halaman pengaturan
    public function index()
    {
        $user = Auth::user();

        // safety: pastikan $user model valid
        if (! $user instanceof User) {
            return redirect()->route('home')->with('error', 'User tidak valid. Silakan login kembali.');
        }

        $systemInfo = [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'database_connection' => config('database.default'),
            'storage_disk' => config('filesystems.default'),
            'timezone' => config('app.timezone'),
            'debug_mode' => config('app.debug') ? 'Enabled' : 'Disabled',
        ];

        return view('admin.pengaturan', compact('user', 'systemInfo'));
    }

    // Update profil (name, email, avatar)
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil model user dari DB (pastikan Eloquent instance)
        $user = User::find(Auth::id());
        if (! $user) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if (! empty($user->avatar) && Storage::exists('public/avatars/' . $user->avatar)) {
                Storage::delete('public/avatars/' . $user->avatar);
            }

            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $avatarName);
            $user->avatar = $avatarName;
        }

        // Save — ini pasti model Eloquent sehingga method save() ada
        $user->save();

        return redirect()->route('admin.pengaturan')->with('success', 'Profil berhasil diperbarui!');
    }

    // Ganti password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = User::find(Auth::id());
        if (! $user) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        if (! Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.pengaturan')->with('success', 'Password berhasil diperbarui!');
    }

    // Update pengaturan aplikasi (sementara hanya dummy — bisa simpan ke table settings)
    public function updateSettings(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'app_description' => 'nullable|string|max:500',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'maintenance_mode' => 'nullable|boolean',
        ]);

        // Jika ingin menyimpan permanent, buat table settings. Sekarang hanya redirect.
        return redirect()->route('admin.pengaturan')->with('success', 'Pengaturan aplikasi berhasil diperbarui (simpan belum diimplementasikan).');
    }

    // Update pengaturan notifikasi untuk user
    public function updateNotifications(Request $request)
    {
        $request->validate([
            'email_notifications' => 'nullable|boolean',
            'order_notifications' => 'nullable|boolean',
            'report_notifications' => 'nullable|boolean',
            'system_notifications' => 'nullable|boolean',
        ]);

        $user = User::find(Auth::id());
        if (! $user) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        $settings = [
            'email_notifications'  => (bool) $request->input('email_notifications', false),
            'order_notifications'  => (bool) $request->input('order_notifications', false),
            'report_notifications' => (bool) $request->input('report_notifications', false),
            'system_notifications' => (bool) $request->input('system_notifications', false),
        ];

        // Simpan di kolom notification_settings jika ada — jika tidak ada, tangkap exception
        try {
            $user->notification_settings = json_encode($settings);
            $user->save();
        } catch (\Throwable $e) {
            Log::error('Gagal menyimpan notification_settings: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan pengaturan notifikasi. Pastikan kolom notification_settings ada di tabel users.');
        }

        return redirect()->route('admin.pengaturan')->with('success', 'Pengaturan notifikasi berhasil diperbarui!');
    }

    // Backup sederhana (menggunakan mysqldump) — hanya contoh
    public function backup()
    {
        try {
            $backupName = 'backup_' . date('Y_m_d_H_i_s') . '.sql';
            $backupPath = storage_path('app/backups/' . $backupName);

            if (! Storage::exists('backups')) {
                Storage::makeDirectory('backups');
            }

            $db = config('database.connections.mysql');
            $command = sprintf(
                'mysqldump --user=%s --password=%s --host=%s %s > %s',
                escapeshellarg($db['username']),
                escapeshellarg($db['password']),
                escapeshellarg($db['host']),
                escapeshellarg($db['database']),
                escapeshellarg($backupPath)
            );

            exec($command, $output, $returnVar);

            if ($returnVar === 0) {
                return redirect()->route('admin.pengaturan')->with('success', 'Backup berhasil dibuat: ' . $backupName);
            }

            throw new \Exception('Command returned non-zero: ' . implode("\n", $output));
        } catch (\Exception $e) {
            Log::error('Backup failed: ' . $e->getMessage());
            return redirect()->route('admin.pengaturan')->with('error', 'Gagal membuat backup: ' . $e->getMessage());
        }
    }

    // Clear cache helper
    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');

            return redirect()->route('admin.pengaturan')->with('success', 'Cache berhasil dibersihkan!');
        } catch (\Exception $e) {
            Log::error('Clear cache failed: ' . $e->getMessage());
            return redirect()->route('admin.pengaturan')->with('error', 'Gagal membersihkan cache: ' . $e->getMessage());
        }
    }
}
