<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Simpan pesan dari form contact
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000'
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'phone.required' => 'Nomor telepon wajib diisi',
            'message.required' => 'Pesan wajib diisi',
            'message.max' => 'Pesan maksimal 1000 karakter'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Message::create([
            'user_id' => Auth::id(), // null jika guest
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'status' => 'unread'
        ]);

        return back()->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim. Tim kami akan membalas melalui email dalam waktu 1x24 jam.');
    }

    /**
     * Halaman admin untuk melihat semua pesan
     */
    public function adminIndex()
    {
        $messages = Message::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $stats = [
            'total' => Message::count(),
            'unread' => Message::unread()->count(),
            'replied' => Message::replied()->count(),
            'today' => Message::whereDate('created_at', today())->count()
        ];

        return view('admin.messages', compact('messages', 'stats'));
    }

    /**
     * Tampilkan detail pesan
     */
    public function show($id)
    {
        $message = Message::with('user')->findOrFail($id);
        
        // Tandai sebagai sudah dibaca jika belum
        if ($message->status === 'unread') {
            $message->markAsRead();
        }

        return view('admin.message-detail', compact('message'));
    }

    /**
     * Balas pesan
     */
    public function reply(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'reply' => 'required|string|max:2000'
        ], [
            'reply.required' => 'Balasan wajib diisi',
            'reply.max' => 'Balasan maksimal 2000 karakter'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $message = Message::findOrFail($id);
        $message->markAsReplied($request->reply);

        // Di sini bisa ditambahkan logic untuk mengirim email
        // Mail::to($message->email)->send(new MessageReply($message));

        return back()->with('success', 'Balasan berhasil dikirim!');
    }

    /**
     * Hapus pesan
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Pesan berhasil dihapus!');
    }

    /**
     * Halaman user untuk melihat pesan mereka sendiri
     */
    public function userMessages()
    {
        $messages = Message::where('user_id', Auth::id())
            ->orWhere('email', Auth::user()->email)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        return view('user.messages', compact('messages'));
    }
    
    /**
     * Detail pesan untuk user
     */
    public function userMessageDetail($id)
    {
        $message = Message::where('id', $id)
            ->where(function($query) {
                $query->where('user_id', Auth::id())
                      ->orWhere('email', Auth::user()->email);
            })
            ->firstOrFail();
    
        return view('user.message-detail', compact('message'));
    }
}