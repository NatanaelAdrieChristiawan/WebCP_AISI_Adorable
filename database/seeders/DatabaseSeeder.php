<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Certification;
use App\Models\Client;
use App\Models\CompanySetting;
use App\Models\Gallery;
use App\Models\Milestone;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        // =====================================================================
        // 1. ADMIN USER
        // =====================================================================
        // Delete existing admin to avoid duplicate issues on re-run
        User::where('email', 'admin@aisi-aiken.com')->delete();
        $admin = User::create([
            'name'     => 'Admin AISI',
            'email'    => 'admin@aisi-aiken.com',
            'password' => Hash::make('password'),
        ]);

        // =====================================================================
        // 2. COMPANY SETTINGS
        // =====================================================================
        CompanySetting::truncate();
        $settings = [
            // General
            ['key' => 'company_name',        'value' => 'PT Aisi Aiken Indonesia',           'type' => 'text',     'label' => 'Nama Perusahaan',          'group' => 'general', 'sort_order' => 1],
            ['key' => 'company_tagline',      'value' => 'Fire Protection and Fire Fighting Products', 'type' => 'text', 'label' => 'Tagline',                  'group' => 'general', 'sort_order' => 2],
            ['key' => 'company_short_name',   'value' => 'AISI',                              'type' => 'text',     'label' => 'Nama Singkat',             'group' => 'general', 'sort_order' => 3],
            ['key' => 'company_logo',         'value' => null,                                'type' => 'file',     'label' => 'Logo Perusahaan',          'group' => 'general', 'sort_order' => 4],
            ['key' => 'company_favicon',      'value' => null,                                'type' => 'file',     'label' => 'Favicon',                  'group' => 'general', 'sort_order' => 5],
            ['key' => 'company_profile_file', 'value' => null,                                'type' => 'file',     'label' => 'File Company Profile (PDF)', 'group' => 'general', 'sort_order' => 6],
            // About
            ['key' => 'company_vision',       'value' => 'Menjadi penyedia produk Fire Protection dan Fire Fighting dengan kualitas terbaik dan ramah lingkungan.', 'type' => 'textarea', 'label' => 'Visi', 'group' => 'about', 'sort_order' => 1],
            ['key' => 'company_mission',      'value' => 'Menjadi pemimpin pasar di bidang Fire Protection dan Fire Fighting dengan produk berkualitas tinggi, serta memberikan layanan prima kepada seluruh pelanggan kami.', 'type' => 'textarea', 'label' => 'Misi', 'group' => 'about', 'sort_order' => 2],
            ['key' => 'company_description',  'value' => 'PT Aisi Aiken Indonesia merupakan perusahaan manufaktur dalam negeri 100% kepemilikan Indonesia yang bergerak di bidang Fire Protection dan Fire Fighting Products. Berdiri sejak tahun 2011 di Cikarang, Bekasi, perusahaan ini telah berkembang dari perusahaan perdagangan menjadi produsen penuh dengan fasilitas HO, Warehouse, dan Production Line sendiri.', 'type' => 'textarea', 'label' => 'Deskripsi Perusahaan', 'group' => 'about', 'sort_order' => 3],
            ['key' => 'company_founded_year', 'value' => '2011',                             'type' => 'text',     'label' => 'Tahun Berdiri',            'group' => 'about', 'sort_order' => 4],
            ['key' => 'company_employees',    'value' => '200+',                             'type' => 'text',     'label' => 'Jumlah Karyawan',          'group' => 'about', 'sort_order' => 5],
            ['key' => 'company_clients_count','value' => '30+',                              'type' => 'text',     'label' => 'Jumlah Klien',             'group' => 'about', 'sort_order' => 6],
            ['key' => 'company_products_count','value' => '9',                               'type' => 'text',     'label' => 'Jumlah Produk',            'group' => 'about', 'sort_order' => 7],
            // Contact
            ['key' => 'company_address',      'value' => 'Kawasan Industri Greenland Cluster Batavia, Jl. Greenland II Blok AE No.15, Deltamas, Cikarang-Bekasi, Jawa Barat 17530', 'type' => 'textarea', 'label' => 'Alamat', 'group' => 'contact', 'sort_order' => 1],
            ['key' => 'company_phone',        'value' => '(62-21) 2909 2832 / 33',           'type' => 'text',     'label' => 'Telepon',                  'group' => 'contact', 'sort_order' => 2],
            ['key' => 'company_email',        'value' => 'marketing.aisi@aisi-aiken.com',    'type' => 'text',     'label' => 'Email',                    'group' => 'contact', 'sort_order' => 3],
            ['key' => 'company_whatsapp',     'value' => '+6281219793197',                   'type' => 'text',     'label' => 'WhatsApp',                 'group' => 'contact', 'sort_order' => 4],
            ['key' => 'company_maps_url',     'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2536294711317!2d107.1711111!3d-6.3611111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b0000000001%3A0x0!2zNsKwMjEnNDAuMCJTIMAxMDfCsDEwJzE2LjAiRQ!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',  'type' => 'text', 'label' => 'Google Maps Embed URL', 'group' => 'contact', 'sort_order' => 5],
            ['key' => 'whatsapp_sales_name',  'value' => 'Bambang',                          'type' => 'text',     'label' => 'Nama Sales WhatsApp',      'group' => 'contact', 'sort_order' => 6],
            ['key' => 'npwp_address',         'value' => 'Delta Technology Center 2, Jl. Kaliandra 1 Blok F6-1J RT.000/RW.000, Kel. Cicau, Kec. Cikarang Pusat, Bekasi, Jawa Barat 17530', 'type' => 'textarea', 'label' => 'Alamat NPWP', 'group' => 'contact', 'sort_order' => 7],
            // Social Media
            ['key' => 'social_instagram',     'value' => 'https://instagram.com/aisi.aiken', 'type' => 'text',     'label' => 'Instagram',                'group' => 'social', 'sort_order' => 1],
            ['key' => 'social_linkedin',      'value' => 'https://linkedin.com/company/aisi-aiken-indonesia', 'type' => 'text', 'label' => 'LinkedIn', 'group' => 'social', 'sort_order' => 2],
            ['key' => 'social_youtube',       'value' => 'https://youtube.com/@aisi-aiken',  'type' => 'text',     'label' => 'YouTube',                  'group' => 'social', 'sort_order' => 3],
            ['key' => 'social_facebook',      'value' => null,                               'type' => 'text',     'label' => 'Facebook',                 'group' => 'social', 'sort_order' => 4],
            // Homepage
            ['key' => 'hero_title',           'value' => 'Solusi Perlindungan Kebakaran Terbaik untuk Industri Anda',  'type' => 'text', 'label' => 'Hero Title', 'group' => 'homepage', 'sort_order' => 1],
            ['key' => 'hero_subtitle',        'value' => 'Produsen Fire Protection & Fire Fighting Products bersertifikat ISO 9001:2015 & ISO 14001:2015 — 100% Perusahaan Indonesia sejak 2011.',  'type' => 'textarea', 'label' => 'Hero Subtitle', 'group' => 'homepage', 'sort_order' => 2],
            ['key' => 'hero_image',           'value' => null,                               'type' => 'file',     'label' => 'Hero Background Image',    'group' => 'homepage', 'sort_order' => 3],
            ['key' => 'hero_cta_primary',     'value' => 'Lihat Produk Kami',                'type' => 'text',     'label' => 'Hero CTA Utama',           'group' => 'homepage', 'sort_order' => 4],
            ['key' => 'hero_cta_secondary',   'value' => 'Unduh Company Profile',            'type' => 'text',     'label' => 'Hero CTA Sekunder',        'group' => 'homepage', 'sort_order' => 5],
            // SEO
            ['key' => 'seo_meta_title',       'value' => 'PT Aisi Aiken Indonesia - Fire Protection & Fighting Products',  'type' => 'text', 'label' => 'Meta Title Default', 'group' => 'seo', 'sort_order' => 1],
            ['key' => 'seo_meta_description', 'value' => 'PT Aisi Aiken Indonesia adalah produsen fire protection dan fire fighting products dalam negeri 100% kepemilikan Indonesia sejak 2011. Bersertifikat ISO 9001:2015 & ISO 14001:2015.', 'type' => 'textarea', 'label' => 'Meta Description Default', 'group' => 'seo', 'sort_order' => 2],
        ];

        foreach ($settings as $setting) {
            CompanySetting::create($setting);
        }

        // =====================================================================
        // 3. PRODUCT CATEGORIES
        // =====================================================================
        ProductCategory::truncate();
        $catPortabel = ProductCategory::create([
            'name'        => 'Pemadam Portabel',
            'slug'        => 'pemadam-portabel',
            'description' => 'Produk alat pemadam api ringan (APAR) portabel untuk gedung, industri, dan berbagai aplikasi.',
            'icon'        => 'fire-extinguisher',
            'sort_order'  => 1,
            'is_active'   => true,
        ]);

        $catKendaraan = ProductCategory::create([
            'name'        => 'Pemadam Kendaraan',
            'slug'        => 'pemadam-kendaraan',
            'description' => 'Produk pemadam kebakaran khusus untuk perlindungan kendaraan bermotor dan industri otomotif.',
            'icon'        => 'truck',
            'sort_order'  => 2,
            'is_active'   => true,
        ]);

        $catOtomatis = ProductCategory::create([
            'name'        => 'Sistem Proteksi Otomatis',
            'slug'        => 'sistem-proteksi-otomatis',
            'description' => 'Sistem pemadam kebakaran otomatis (Fire Protection System / FPS) tanpa memerlukan listrik.',
            'icon'        => 'shield-check',
            'sort_order'  => 3,
            'is_active'   => true,
        ]);

        $catKhusus = ProductCategory::create([
            'name'        => 'Produk Khusus',
            'slug'        => 'produk-khusus',
            'description' => 'Produk khusus fire protection seperti APAB, PRA, dan produk inovatif lainnya.',
            'icon'        => 'sparkles',
            'sort_order'  => 4,
            'is_active'   => true,
        ]);

        // =====================================================================
        // 4. PRODUCTS (9 produk)
        // =====================================================================
        Product::truncate();
        
        // Produk 1: AISI Gas Clean Agent
        Product::create([
            'category_id'       => $catPortabel->id,
            'name'              => 'AISI Gas Clean Agent',
            'slug'              => 'aisi-gas-clean-agent',
            'short_description' => 'Pemadam api berbasis gas bersih yang efektif untuk kelas A, B, dan C, aman untuk kelistrikan serta baterai Lithium.',
            'description'       => 'AISI Gas Clean Agent adalah solusi pemadam kebakaran portabel menggunakan media gas bersih (clean agent) yang sangat efektif memadamkan kebakaran. Sangat aman digunakan untuk melindungi aset bernilai tinggi seperti peralatan elektronik sensitif karena tidak konduktif dan tidak meninggalkan residu.',
            'features'          => [
                'Memadamkan kebakaran Kelas A, B, dan C',
                'Mampu memadamkan kebakaran baterai Lithium',
                'Tidak menyebabkan karat',
                'Tidak menghantarkan listrik',
                'Cocok untuk aplikasi Automotive dan Non-Automotive',
                'Tidak meninggalkan residu setelah pemadaman',
                'Ramah lingkungan dengan nilai ODP nol',
            ],
            'specifications'    => [
                'Media Pemadam'    => 'Gas Clean Agent (HFC/HCFC)',
                'Kelas Kebakaran'  => 'A, B, C, Lithium Battery',
                'Sertifikasi'      => 'ISO 9001:2015, ISO 14001:2015',
                'Aplikasi'         => 'Automotive & Non-Automotive',
                'Residu'           => 'Nol (Clean Agent)',
                'Konduktivitas'    => 'Non-konduktif (Aman untuk elektrikal)',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI Gas Clean Agent. Mohon informasi harga dan ketersediaan stok.',
            'is_featured'       => true,
            'is_active'         => true,
            'sort_order'        => 1,
        ]);

        // Produk 2: AISI Dry Chemical Powder (DCP)
        Product::create([
            'category_id'       => $catPortabel->id,
            'name'              => 'AISI Dry Chemical Powder (DCP)',
            'slug'              => 'aisi-dry-chemical-powder',
            'short_description' => 'Alat pemadam api serbaguna yang sangat efektif memadamkan kebakaran kelas A, B, dan C dengan masa pakai hingga 8 tahun.',
            'description'       => 'AISI Dry Chemical Powder (DCP) dirancang sebagai alat pemadam api serbaguna yang andal untuk berbagai sektor industri dan area publik. Menggunakan media bubuk kimia kering berkualitas tinggi untuk memadamkan kebakaran kelas A, B, dan C secara cepat.',
            'features'          => [
                'Memadamkan kebakaran Kelas A, B, dan C secara efektif',
                'Masa pakai hingga 8 tahun',
                'Cocok untuk aplikasi Automotive dan Non-Automotive',
                'Konstruksi tabung kuat dengan indikator tekanan',
                'Handle ergonomis dan mudah digunakan',
            ],
            'specifications'    => [
                'Media Pemadam'    => 'Dry Chemical Powder (ABC)',
                'Masa Pakai'       => '8 Tahun',
                'Kelas Kebakaran'  => 'A, B, C',
                'Aplikasi'         => 'Automotive & Non-Automotive',
                'Sertifikasi'      => 'SNI, ISO 9001:2015',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI Dry Chemical Powder (DCP). Mohon informasi lebih lanjut.',
            'is_featured'       => true,
            'is_active'         => true,
            'sort_order'        => 2,
        ]);

        // Produk 3: AISI Fire Protection System (FPS)
        Product::create([
            'category_id'       => $catOtomatis->id,
            'name'              => 'AISI Fire Protection System (FPS)',
            'slug'              => 'aisi-fire-protection-system',
            'short_description' => 'Sistem pemadam otomatis terintegrasi yang bekerja secara mekanis tanpa listrik untuk melindungi area kritikal.',
            'description'       => 'AISI Fire Protection System (FPS) adalah solusi pencegahan kebakaran otomatis yang dirancang khusus untuk melindungi aset-aset penting seperti ruang kontrol listrik, capacitor bank, mesin CNC, dan server room. Sistem ini bekerja secara pneumatik-mekanis tanpa ketergantungan pada pasokan listrik luar.',
            'features'          => [
                'Tidak memerlukan listrik untuk beroperasi',
                'Dapat diintegrasikan dengan sistem alarm yang sudah ada',
                'Melindungi: Electrical Cubical, Capacitor Bank, CNC Machine, Server Room',
                'Tipe Direct: Tubing pendeteksi berfungsi sebagai detektor, nozzle, dan distribusi media',
                'Tipe Indirect: Tubing pendeteksi berfungsi sebagai detektor dan pemicu pelepasan media',
            ],
            'specifications'    => [
                'Tipe Sistem'         => 'Direct System & Indirect System',
                'Pilihan Agen Pemadam' => 'AISI Gas Clean Agent / CO2 / FM200',
                'Aplikasi Area'       => 'Electrical Cubical, Capacitor Bank, CNC Machine, Server Room',
                'Daya Listrik'        => 'Tidak Memerlukan Listrik (Pneumatik/Mekanis)',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI Fire Protection System (FPS). Mohon informasi lebih lanjut.',
            'is_featured'       => true,
            'is_active'         => true,
            'sort_order'        => 3,
        ]);

        // Produk 4: AISI Fire Extinguisher Vehicle
        Product::create([
            'category_id'       => $catKendaraan->id,
            'name'              => 'AISI Fire Extinguisher Vehicle',
            'slug'              => 'aisi-fire-extinguisher-vehicle',
            'short_description' => 'Alat pemadam api khusus kendaraan yang tahan terhadap getaran tinggi, dengan pilihan agen Gas Clean Agent atau DCP.',
            'description'       => 'AISI Fire Extinguisher Vehicle dirancang dan diformulasikan secara khusus untuk kebutuhan sektor otomotif. Telah dipercaya oleh manufaktur besar (seperti Toyota, BYD, VinFast, DFSK) untuk dipasang langsung di dalam armada kendaraan.',
            'features'          => [
                'Pilihan agen: Gas Clean Agent atau Dry Chemical Powder',
                'Memadamkan kebakaran Kelas A, B, dan C',
                'Masa pakai 8 tahun',
                'Dirancang khusus untuk menahan getaran kendaraan',
                'Dilengkapi dengan bracket kendaraan berstandar keamanan',
            ],
            'specifications'    => [
                'Media Pemadam'    => 'Gas Clean Agent / Dry Chemical Powder',
                'Kelas Kebakaran'  => 'A, B, C',
                'Masa Pakai'       => '8 Tahun',
                'Aplikasi'         => 'Automotive / Kendaraan (Pabrikan & OEM)',
                'Ketahanan'        => 'Tahan terhadap getaran tinggi (Vibration Resistant)',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI Fire Extinguisher Vehicle. Mohon informasi lebih lanjut.',
            'is_featured'       => true,
            'is_active'         => true,
            'sort_order'        => 4,
        ]);

        // Produk 5: AISI FOAM+
        Product::create([
            'category_id'       => $catPortabel->id,
            'name'              => 'AISI FOAM+',
            'slug'              => 'aisi-foam-plus',
            'short_description' => 'Pemadam api berbasis air (Water Based) yang sangat efektif memadamkan kebakaran Kelas B dan D.',
            'description'       => 'AISI FOAM+ merupakan pemadam api berbasis air dengan formulasi khusus yang menghasilkan busa pemadam stabil. Sangat cocok digunakan untuk melindungi area penyimpanan bahan bakar minyak, pengecoran logam (foundry), dan ruang penyimpanan cat.',
            'features'          => [
                'Memadamkan kebakaran Kelas B dan D',
                'Berbasis air (Water Based)',
                'Cocok untuk: penyimpanan bahan bakar, foundry logam, penyimpanan cat, dll.',
                'Membentuk selimut busa tebal untuk mencegah penyalaan kembali',
            ],
            'specifications'    => [
                'Media Pemadam'    => 'AFFF Foam (Water-based)',
                'Kelas Kebakaran'  => 'B, D',
                'Aplikasi Utama'   => 'Penyimpanan bahan bakar, foundry logam, pabrik cat',
                'pH'               => '6.5 - 7.5',
                'Kemasan'          => '20 Liter, 200 Liter',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI FOAM+. Mohon informasi lebih lanjut.',
            'is_featured'       => false,
            'is_active'         => true,
            'sort_order'        => 5,
        ]);

        // Produk 6: AISI Thermatic
        Product::create([
            'category_id'       => $catOtomatis->id,
            'name'              => 'AISI Thermatic',
            'slug'              => 'aisi-thermatic',
            'short_description' => 'Sistem pemadam otomatis modular yang menggunakan sensor termal mandiri, aktif otomatis pada suhu 68°C.',
            'description'       => 'AISI Thermatic adalah pemadam otomatis jenis termal gantung yang bekerja secara individual. Ketika suhu sekitar naik dan menyentuh angka 68°C, bulb termal akan pecah dan menyemburkan media pemadam ke area di bawahnya secara merata.',
            'features'          => [
                'Menggunakan sensor termal yang akan aktif pada suhu 68°C',
                'Dapat memadamkan semua jenis kebakaran sesuai media yang digunakan',
                'Mudah dirawat tanpa membutuhkan pemipaan rumit',
                'Dapat diisi dengan semua jenis media, kecuali CO2',
            ],
            'specifications'    => [
                'Suhu Aktivasi'       => '68°C',
                'Media Pemadam'       => 'Clean Agent / Dry Chemical Powder / Foam (Kecuali CO2)',
                'Tipe Aktivasi'       => 'Thermal bulb otomatis (Tanpa listrik)',
                'Aplikasi Terpasang'  => 'Langit-langit (Ceiling mounted) di panel/server room',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI Thermatic. Mohon informasi lebih lanjut.',
            'is_featured'       => false,
            'is_active'         => true,
            'sort_order'        => 6,
        ]);

        // Produk 7: AISI CO2
        Product::create([
            'category_id'       => $catPortabel->id,
            'name'              => 'AISI CO2',
            'slug'              => 'aisi-co2',
            'short_description' => 'Pemadam api karbon dioksida (CO2) berkualitas tinggi yang efektif untuk kelas B dan C tanpa meninggalkan residu.',
            'description'       => 'AISI CO2 menggunakan media karbon dioksida murni untuk memadamkan kebakaran yang disebabkan oleh cairan mudah terbakar (kelas B) atau hubungan arus pendek listrik (kelas C). Merupakan pemadam tipe clean agent yang sangat andal.',
            'features'          => [
                'Memadamkan kebakaran Kelas B dan C secara efektif',
                'Ramah lingkungan',
                'Media tidak menghantarkan listrik (aman untuk peralatan elektronik)',
                'Konstruksi tabung gas tahan tekanan tinggi',
            ],
            'specifications'    => [
                'Media Pemadam'    => 'Karbon Dioksida (CO2)',
                'Kelas Kebakaran'  => 'B, C',
                'Konduktivitas'    => 'Non-konduktif',
                'Residu'           => 'Bersih (Nol residu)',
                'Sertifikasi'      => 'ISO 9001:2015, SNI',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI CO2. Mohon informasi lebih lanjut.',
            'is_featured'       => false,
            'is_active'         => true,
            'sort_order'        => 7,
        ]);

        // Produk 8: AISI Penghambat Rambatan Api (PRA)
        Product::create([
            'category_id'       => $catKhusus->id,
            'name'              => 'AISI Penghambat Rambatan Api (PRA)',
            'slug'              => 'aisi-penghambat-rambatan-api',
            'short_description' => 'Cairan khusus intumescent/fire-retardant yang meresap ke material kayu atau kain untuk mencegah penyebaran api.',
            'description'       => 'AISI Penghambat Rambatan Api (PRA) adalah formulasi cairan kimia yang diaplikasikan langsung pada material berpori (seperti kayu, kain, kertas) guna memberikan sifat retardasi api. Cairan akan meresap ke dalam serat material dan mencegah terjadinya perambatan api.',
            'features'          => [
                'Berbentuk cairan yang dapat diaplikasikan pada kayu, kain, dan material lainnya',
                'Cairan akan meresap ke pori-pori material dan bertahan hingga dicuci',
                'Mencegah api menyebar ke material yang telah diaplikasikan',
                'Pengaplikasian mudah dengan metode spray atau kuas',
            ],
            'specifications'    => [
                'Bentuk Media'      => 'Cairan Penetrasi (Liquid)',
                'Aplikasi Metode'   => 'Spray / Kuas (Coating)',
                'Target Material'   => 'Kayu, Kain, Kertas, dan serat selulosa',
                'Efek Perlindungan' => 'Menghambat rambatan api (Fire retardant)',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI Penghambat Rambatan Api (PRA). Mohon informasi lebih lanjut.',
            'is_featured'       => false,
            'is_active'         => true,
            'sort_order'        => 8,
        ]);

        // Produk 9: AISI APAB (Alat Pemadam Api Beroda)
        Product::create([
            'category_id'       => $catKhusus->id,
            'name'              => 'AISI APAB (Alat Pemadam Api Beroda)',
            'slug'              => 'aisi-apab',
            'short_description' => 'Alat pemadam api kapasitas besar dengan roda troli untuk mobilitas cepat di area industri dan gudang.',
            'description'       => 'AISI APAB dirancang untuk memberikan kapasitas pemadaman ekstra besar di area industri, gudang penyimpanan logistik, dan pabrik manufaktur. Dilengkapi dengan kerangka troli kokoh dan roda berkualitas tinggi untuk memudahkan mobilisasi cepat oleh personel keamanan.',
            'features'          => [
                'Dapat diisi dengan semua jenis media, kecuali CO2',
                'Dilengkapi roda dan troli untuk mobilitas tinggi',
                'Dapat ditempatkan di dalam maupun di luar ruangan',
                'Tersedia dalam berbagai ukuran kapasitas sesuai permintaan pelanggan',
            ],
            'specifications'    => [
                'Kapasitas'        => '25kg, 50kg, 75kg, 100kg (Tergantung pesanan)',
                'Pilihan Media'    => 'Dry Chemical Powder / Foam / Clean Agent (Kecuali CO2)',
                'Mobilitas'        => 'Troli beroda (Wheel mounted)',
                'Aplikasi Area'    => 'Pabrik, Gudang, Galangan kapal, Pertambangan',
            ],
            'whatsapp_message'  => 'Halo PT Aisi Aiken Indonesia, saya tertarik untuk berkonsultasi mengenai produk AISI APAB (Alat Pemadam Api Beroda). Mohon informasi lebih lanjut.',
            'is_featured'       => false,
            'is_active'         => true,
            'sort_order'        => 9,
        ]);


        // =====================================================================
        // 5. MILESTONES (Sesuai Company Profile)
        // =====================================================================
        Milestone::truncate();
        $milestones = [
            [
                'year'        => '2011',
                'title'       => 'Pendirian Perusahaan',
                'description' => 'AISI berdiri sebagai perusahaan perdagangan (Trading Company) di bidang produk perlindungan kebakaran.',
                'sort_order'  => 1,
                'is_active'   => true,
            ],
            [
                'year'        => '2015',
                'title'       => 'Transformasi Menjadi Produsen',
                'description' => 'Konversi dari perdagangan menjadi produsen produk pemadam kebakaran penuh; Pengembangan Fire Protection System dan produk Non-Automotive.',
                'sort_order'  => 2,
                'is_active'   => true,
            ],
            [
                'year'        => '2020',
                'title'       => 'Memasok Klien Otomotif Pertama',
                'description' => 'Mulai memasok produk pemadam kendaraan (Vehicle Fire Extinguisher) ke DFSK (Sokonindo Automobile).',
                'sort_order'  => 3,
                'is_active'   => true,
            ],
            [
                'year'        => '2021',
                'title'       => 'Pengembangan Aerosol',
                'description' => 'Pengembangan Aerosol Fire Extinguisher untuk segmen Automotive guna memberikan proteksi yang lebih kompak.',
                'sort_order'  => 4,
                'is_active'   => true,
            ],
            [
                'year'        => '2023',
                'title'       => 'Kerja Sama Toyota TMMIN',
                'description' => 'Mulai memasok produk Vehicle Fire Extinguisher secara resmi ke PT Toyota Motor Manufacturing Indonesia (TMMIN).',
                'sort_order'  => 5,
                'is_active'   => true,
            ],
            [
                'year'        => '2024',
                'title'       => 'Ekspansi Pasar Kendaraan Listrik (EV)',
                'description' => 'Ekspansi klien automotive baru: mulai memasok ke BYD Motor Indonesia, VinFast Automobile Indonesia, dan JETOUR untuk Vehicle Fire Extinguisher.',
                'sort_order'  => 6,
                'is_active'   => true,
            ],
        ];

        foreach ($milestones as $milestone) {
            Milestone::create($milestone);
        }

        // =====================================================================
        // 6. CERTIFICATIONS (EQA IMS)
        // =====================================================================
        Certification::truncate();
        Certification::create([
            'certificate_name'   => 'ISO 9001:2015 — Sistem Manajemen Mutu',
            'issuing_body'       => 'EQA IMS Certification Pte Ltd (JAS-ANZ)',
            'certificate_number' => 'JQS-24-0649',
            'valid_from'         => '2024-11-25',
            'valid_until'        => '2027-11-24',
            'certificate_file'   => null,
            'is_active'          => true,
            'sort_order'         => 1,
        ]);

        Certification::create([
            'certificate_name'   => 'ISO 14001:2015 — Sistem Manajemen Lingkungan',
            'issuing_body'       => 'EQA IMS Certification Pte Ltd (JAS-ANZ)',
            'certificate_number' => 'JES-24-0326',
            'valid_from'         => '2024-11-25',
            'valid_until'        => '2027-11-24',
            'certificate_file'   => null,
            'is_active'          => true,
            'sort_order'         => 2,
        ]);

        // =====================================================================
        // 7. CLIENTS (Sesuai Company Profile)
        // =====================================================================
        Client::truncate();
        $featuredClients = [
            ['name' => 'Toyota Motor Manufacturing Indonesia',   'website' => 'https://www.toyota.co.id',             'industry' => 'Otomotif',     'sort_order' => 1],
            ['name' => 'BYD Motor Indonesia',                   'website' => 'https://www.byd.com/id',               'industry' => 'Otomotif',     'sort_order' => 2],
            ['name' => 'VinFast Automobile Indonesia',          'website' => 'https://vinfastauto.co.id',            'industry' => 'Otomotif',     'sort_order' => 3],
            ['name' => 'DFSK / Sokonindo Automobile',           'website' => 'https://www.dfsk.co.id',               'industry' => 'Otomotif',     'sort_order' => 4],
            ['name' => 'Kayaba Indonesia',                      'website' => 'https://www.kayaba.co.id',             'industry' => 'Komponen Otomotif', 'sort_order' => 5],
            ['name' => 'Astra NTN Driveshaft Indonesia',        'website' => 'https://www.astra-ntn.co.id',          'industry' => 'Komponen Otomotif', 'sort_order' => 6],
            ['name' => 'Mitsubishi Logistics Indonesia',        'website' => 'https://www.mitsubishi-logistics.co.id', 'industry' => 'Logistik',   'sort_order' => 7],
        ];

        foreach ($featuredClients as $client) {
            Client::create(array_merge($client, [
                'logo'        => null,
                'is_featured' => true,
                'is_active'   => true,
            ]));
        }

        $otherClients = [
            ['name' => 'PT Astra International Tbk',   'website' => 'https://www.astra.co.id',       'industry' => 'Konglomerat',   'sort_order' => 8],
            ['name' => 'PT Unilever Indonesia Tbk',    'website' => 'https://www.unilever.co.id',    'industry' => 'FMCG',         'sort_order' => 9],
            ['name' => 'PT Pertamina (Persero)',        'website' => 'https://www.pertamina.com',     'industry' => 'Energi & Migas','sort_order' => 10],
            ['name' => 'PT PLN (Persero)',              'website' => 'https://www.pln.co.id',         'industry' => 'Kelistrikan',  'sort_order' => 11],
            ['name' => 'PT Bank Mandiri (Persero) Tbk','website' => 'https://www.bankmandiri.co.id', 'industry' => 'Perbankan',    'sort_order' => 12],
        ];

        foreach ($otherClients as $client) {
            Client::create(array_merge($client, [
                'logo'        => null,
                'is_featured' => false,
                'is_active'   => true,
            ]));
        }

        // =====================================================================
        // 8. BLOG POSTS
        // =====================================================================
        BlogPost::truncate();
        BlogPost::create([
            'user_id'          => $admin->id,
            'title'            => 'AISI Menjadi Supplier Resmi Toyota Motor Manufacturing Indonesia',
            'slug'             => 'aisi-supplier-resmi-toyota-motor-manufacturing-indonesia',
            'excerpt'          => 'PT Aisi Aiken Indonesia resmi ditunjuk sebagai supplier utama sistem proteksi kebakaran untuk Toyota Motor Manufacturing Indonesia, menandai tonggak penting dalam perjalanan perusahaan di industri otomotif.',
            'content'          => '<p>PT Aisi Aiken Indonesia (AISI) dengan bangga mengumumkan penunjukan resmi sebagai supplier utama sistem proteksi kebakaran untuk Toyota Motor Manufacturing Indonesia (TMMIN). Kemitraan strategis ini merupakan pengakuan atas kualitas produk dan layanan AISI yang telah memenuhi standar ketat yang ditetapkan oleh Toyota Group secara global.</p>

<h2>Proses Seleksi yang Ketat</h2>
<p>Penunjukan ini merupakan hasil dari proses seleksi vendor yang panjang dan ketat selama lebih dari 12 bulan. AISI berhasil memenuhi semua persyaratan teknis, kualitas, dan compliance yang ditetapkan oleh TMMIN, termasuk audit fasilitas produksi, uji produk, dan evaluasi sistem manajemen mutu.</p>

<h2>Produk yang Disuplai</h2>
<p>Sebagai supplier resmi, AISI akan menyediakan berbagai produk fire protection untuk fasilitas manufaktur TMMIN, meliputi:</p>
<ul>
<li>AISI Gas Clean Agent untuk area clean room dan ruang kontrol</li>
<li>AISI Fire Extinguisher Vehicle untuk armada dan alat berat produksi</li>
<li>AISI Fire Protection System (FPS) untuk sistem proteksi terintegrasi fasilitas</li>
<li>AISI DCP untuk kebutuhan APAR standar di seluruh area pabrik</li>
</ul>

<h2>Komitmen Kualitas</h2>
<p>"Kemitraan dengan Toyota adalah bukti nyata dari komitmen kami terhadap kualitas dan inovasi. Kami akan terus berupaya memberikan produk dan layanan terbaik untuk mendukung operasional TMMIN," ujar Direktur Utama PT Aisi Aiken Indonesia.</p>',
            'featured_image'   => null,
            'status'           => 'published',
            'published_at'     => now()->subDays(30),
            'meta_title'       => 'AISI Jadi Supplier Resmi Toyota Motor Manufacturing Indonesia',
            'meta_description' => 'PT Aisi Aiken Indonesia ditunjuk sebagai supplier resmi sistem proteksi kebakaran untuk Toyota Motor Manufacturing Indonesia. Baca selengkapnya.',
            'view_count'       => 247,
        ]);

        BlogPost::create([
            'user_id'          => $admin->id,
            'title'            => 'Komitmen AISI terhadap Lingkungan: Sertifikasi ISO 14001:2015',
            'slug'             => 'komitmen-aisi-terhadap-lingkungan-sertifikasi-iso-14001-2015',
            'excerpt'          => 'PT Aisi Aiken Indonesia berhasil meraih sertifikasi ISO 14001:2015 untuk Sistem Manajemen Lingkungan, membuktikan komitmen perusahaan dalam menjalankan bisnis yang bertanggung jawab terhadap lingkungan.',
            'content'          => '<p>PT Aisi Aiken Indonesia (AISI) dengan bangga mengumumkan keberhasilan memperoleh sertifikasi ISO 14001:2015 untuk Sistem Manajemen Lingkungan (Environmental Management System/EMS). Pencapaian ini merupakan wujud nyata dari komitmen AISI dalam menjalankan operasional bisnis yang bertanggung jawab dan berkelanjutan terhadap lingkungan.</p>

<h2>Apa itu ISO 14001:2015?</h2>
<p>ISO 14001:2015 adalah standar internasional yang menetapkan persyaratan untuk sistem manajemen lingkungan yang efektif. Standar ini membantu organisasi meningkatkan kinerja lingkungan melalui penggunaan sumber daya yang lebih efisien dan pengurangan limbah.</p>

<h2>Langkah-langkah yang Telah Dilakukan AISI</h2>
<p>Dalam rangka memenuhi persyaratan ISO 14001:2015, AISI telah mengimplementasikan berbagai program lingkungan, antara lain:</p>
<ul>
<li>Pengelolaan limbah produksi yang bertanggung jawab</li>
<li>Penggunaan bahan baku ramah lingkungan</li>
<li>Efisiensi energi di fasilitas produksi</li>
<li>Program daur ulang dan pengurangan emisi karbon</li>
</ul>

<h2>Dampak bagi Produk AISI</h2>
<p>Sertifikasi ini juga berdampak positif pada pengembangan produk. AISI berkomitmen untuk terus mengembangkan produk-produk fire protection yang lebih ramah lingkungan, seperti penggunaan clean agent dengan nilai Global Warming Potential (GWP) yang rendah.</p>',
            'featured_image'   => null,
            'status'           => 'published',
            'published_at'     => now()->subDays(15),
            'meta_title'       => 'AISI Raih Sertifikasi ISO 14001:2015 Sistem Manajemen Lingkungan',
            'meta_description' => 'PT Aisi Aiken Indonesia meraih sertifikasi ISO 14001:2015, membuktikan komitmen terhadap lingkungan. Baca tentang program lingkungan AISI.',
            'view_count'       => 183,
        ]);

        BlogPost::create([
            'user_id'          => $admin->id,
            'title'            => 'Inovasi Aerosol Fire Extinguisher AISI untuk Industri Otomotif',
            'slug'             => 'inovasi-aerosol-fire-extinguisher-aisi-untuk-industri-otomotif',
            'excerpt'          => 'AISI memperkenalkan teknologi aerosol fire extinguisher terbaru yang dikembangkan khusus untuk memenuhi kebutuhan unik industri otomotif modern, memberikan proteksi maksimal dengan dampak lingkungan minimal.',
            'content'          => '<p>Merespons perkembangan industri otomotif yang semakin kompleks dan kebutuhan akan solusi fire protection yang lebih canggih, PT Aisi Aiken Indonesia (AISI) memperkenalkan teknologi Aerosol Fire Extinguisher generasi terbaru yang dikembangkan khusus untuk lingkungan industri otomotif.</p>

<h2>Tantangan Fire Protection di Industri Otomotif Modern</h2>
<p>Industri otomotif modern menghadapi tantangan unik dalam hal fire protection. Penggunaan material komposit, baterai lithium-ion pada kendaraan listrik, dan proses produksi yang semakin otomatis menciptakan profil risiko kebakaran yang berbeda dari industri konvensional.</p>

<h2>Teknologi Aerosol AISI</h2>
<p>Teknologi aerosol yang dikembangkan AISI menggunakan partikel ultra-fine yang mampu menembus celah sempit dan menjangkau area yang sulit diakses oleh sistem pemadam konvensional. Keunggulan teknologi ini meliputi:</p>
<ul>
<li>Efektivitas pemadaman 3-5x lebih tinggi dibanding DCP konvensional</li>
<li>Tidak meninggalkan residu yang merusak komponen elektronik</li>
<li>Ramah lingkungan dengan zero ODP (Ozone Depletion Potential)</li>
<li>Ukuran kompak untuk instalasi di ruang sempit</li>
<li>Kompatibel dengan sistem kendaraan listrik (EV)</li>
</ul>

<h2>Validasi dan Sertifikasi</h2>
<p>Produk aerosol AISI telah melalui serangkaian uji validasi ketat yang memenuhi standar internasional, termasuk UL 2775 dan EN 15276. Produk ini juga telah diuji khusus untuk skenario kebakaran yang umum terjadi di fasilitas produksi otomotif.</p>',
            'featured_image'   => null,
            'status'           => 'published',
            'published_at'     => now()->subDays(7),
            'meta_title'       => 'Inovasi Aerosol Fire Extinguisher AISI untuk Industri Otomotif',
            'meta_description' => 'AISI memperkenalkan teknologi aerosol fire extinguisher terbaru untuk industri otomotif. Proteksi maksimal dengan dampak lingkungan minimal.',
            'view_count'       => 312,
        ]);

        // =====================================================================
        // 9. GALLERIES
        // =====================================================================
        Gallery::truncate();
        Gallery::create([
            'title'       => 'Lini Produksi Utama Cikarang',
            'image'       => 'galleries/production-line.jpg',
            'description' => 'Fasilitas manufaktur dan perakitan produk pemadam api portabel di Deltamas, Cikarang.',
            'category'    => 'produksi',
            'is_active'   => true,
            'sort_order'  => 1,
        ]);

        Gallery::create([
            'title'       => 'Warehouse & Logistik',
            'image'       => 'galleries/warehouse.jpg',
            'description' => 'Gudang penyimpanan material dan produk siap kirim ke mitra korporat.',
            'category'    => 'fasilitas',
            'is_active'   => true,
            'sort_order'  => 2,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
