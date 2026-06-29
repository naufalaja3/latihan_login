<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password; // tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Aturan validasi password global (OWASP recommended)
        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()   // harus ada huruf besar & kecil
                ->numbers()     // harus ada angka
                ->symbols()     // harus ada simbol
                ->uncompromised(); // cek di database kebocoran password
        });
    }
}
