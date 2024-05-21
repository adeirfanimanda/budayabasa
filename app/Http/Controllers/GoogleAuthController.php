<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                // Unduh gambar profil dari URL yang diberikan oleh Google
                $imagePath = 'profil-images/';
                $imageName = uniqid() . '.jpg'; // Atau format file yang sesuai
                $imageContent = file_get_contents($google_user->getAvatar());
                // Simpan gambar di direktori penyimpanan yang sesuai
                file_put_contents(public_path('storage/' . $imagePath . $imageName), $imageContent);

                // Pisahkan nama pengguna menjadi kata-kata terpisah
                $nameParts = explode(' ', $google_user->getName());
                // Inisialisasi variabel untuk menyimpan username
                $username = '';
                // Ubah setiap kata menjadi huruf kecil dan gabungkan tanpa spasi
                foreach ($nameParts as $part) {
                    $username .= strtolower($part);
                }

                // Cek apakah username sudah ada dalam database
                $usernameExists = User::where('username', $username)->exists();

                // Jika username sudah ada atau panjang username kurang dari 5 karakter, tambahkan angka random
                if ($usernameExists || strlen($username) < 5) {
                    $suffix = rand(1000, 9999);
                    $username .= $suffix;
                }

                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'username' => $username,
                    'image' => $imagePath . $imageName,
                ]);

                Auth::login($new_user);

                return redirect()->intended('materi');
            } else {
                Auth::login($user);

                return redirect()->intended('materi');
            }
        } catch (\Throwable $th) {
            // dd('Something went wrong! ' . $th->getMessage());
            return redirect()->route('login')->with('googleError', 'Autentikasi dibatalkan! Silahkan coba lagi.');
        }
    }
}
