<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SingleDeviceLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $currentSessionId = Session::getId();

            // Ambil semua session aktif user ini selain session sekarang
            $otherSessions = DB::table('sessions')
                ->where('user_id', $userId)
                ->where('id', '!=', $currentSessionId)
                ->get();

            if ($otherSessions->count() > 0) {
                // Logout user lama dengan hapus sesi lama
                DB::table('sessions')
                    ->where('user_id', $userId)
                    ->where('id', '!=', $currentSessionId)
                    ->delete();

                // Jangan lupa kasih flash session biar muncul notif di frontend
                session()->flash('logout_due_to_new_login', true);
            }
        }

        return $next($request);
    }
}
