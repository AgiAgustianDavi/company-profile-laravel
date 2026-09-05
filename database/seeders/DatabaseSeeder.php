<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin default
        User::updateOrCreate(
            ['email' => 'admin@karyadigital.test'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Akun user biasa (contoh)
        User::updateOrCreate(
            ['email' => 'user@karyadigital.test'],
            [
                'name' => 'Contoh User',
                'password' => bcrypt('password'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );

        // Profil / pengaturan perusahaan
        $settings = [
            'company_name' => 'PT Karya Digital Nusantara',
            'tagline' => 'Solusi Digital untuk Pertumbuhan Bisnis Anda',
            'about' => 'PT Karya Digital Nusantara adalah perusahaan teknologi yang berfokus pada pengembangan solusi digital, mulai dari pembuatan website, aplikasi mobile, hingga konsultasi transformasi digital untuk berbagai skala bisnis. Sejak berdiri, kami telah membantu puluhan klien dari berbagai industri untuk berkembang melalui teknologi.',
            'vision' => 'Menjadi mitra teknologi terpercaya yang mendorong transformasi digital di Indonesia.',
            'mission' => "1. Memberikan solusi digital yang inovatif dan berkualitas tinggi.\n2. Mengutamakan kepuasan dan pertumbuhan bisnis klien.\n3. Membangun tim profesional yang terus belajar dan berkembang.",
            'address' => 'Jl. Sudirman No. 123, Jakarta Selatan, DKI Jakarta, Indonesia',
            'phone' => '+62 21 1234 5678',
            'email' => 'info@karyadigital.test',
            'whatsapp' => '628123456789',
            'instagram' => 'https://instagram.com/karyadigital',
            'linkedin' => 'https://linkedin.com/company/karyadigital',
            'map_embed' => '',
            'founded_year' => '2015',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // Contoh layanan
        $services = [
            [
                'title' => 'Pembuatan Website',
                'icon' => 'bi-code-slash',
                'description' => 'Kami membangun website perusahaan, company profile, hingga e-commerce yang responsif, cepat, dan mudah dikelola.',
            ],
            [
                'title' => 'Pengembangan Aplikasi Mobile',
                'icon' => 'bi-phone',
                'description' => 'Aplikasi Android & iOS yang dirancang khusus sesuai kebutuhan bisnis Anda, dari konsep hingga rilis di App Store/Play Store.',
            ],
            [
                'title' => 'Konsultasi IT & Digital',
                'icon' => 'bi-lightbulb',
                'description' => 'Pendampingan strategi transformasi digital, audit sistem, dan rekomendasi teknologi yang tepat guna bagi bisnis Anda.',
            ],
            [
                'title' => 'UI/UX Design',
                'icon' => 'bi-palette',
                'description' => 'Desain antarmuka yang menarik dan pengalaman pengguna yang intuitif untuk meningkatkan engagement produk digital Anda.',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['title' => $service['title']], $service);
        }

        // Contoh portofolio
        $portfolios = [
            [
                'title' => 'Website E-Commerce Batik Nusantara',
                'client' => 'Batik Nusantara',
                'category' => 'Website',
                'description' => 'Pengembangan platform e-commerce untuk penjualan batik khas nusantara dengan fitur katalog, keranjang, dan pembayaran online.',
            ],
            [
                'title' => 'Aplikasi Mobile Ojek Kampus',
                'client' => 'Universitas Merdeka',
                'category' => 'Mobile App',
                'description' => 'Aplikasi pemesanan ojek dalam lingkungan kampus untuk mempermudah mobilitas mahasiswa.',
            ],
            [
                'title' => 'Sistem Informasi Manajemen Klinik',
                'client' => 'Klinik Sehat Bersama',
                'category' => 'Sistem Informasi',
                'description' => 'Sistem pencatatan rekam medis, jadwal dokter, dan manajemen pasien berbasis web.',
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(['title' => $portfolio['title']], $portfolio);
        }

        // Contoh pesan masuk
        ContactMessage::updateOrCreate(
            ['email' => 'calon.klien@example.com'],
            [
                'name' => 'Calon Klien',
                'phone' => '081234567890',
                'subject' => 'Permintaan Penawaran Website',
                'message' => 'Halo, saya tertarik untuk membuat website company profile. Mohon informasi paket dan estimasi biayanya.',
                'is_read' => false,
            ]
        );
    }
}
