<div class="grid min-h-screen grid-cols-1 lg:grid-cols-12 bg-[#081325] font-sans antialiased text-gray-200 relative overflow-hidden">
    
    <!-- Force Dark Mode Script (MutationObserver prevents Filament from removing 'dark' class) -->
    <script>
        document.documentElement.classList.add('dark');
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'class' && !document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.add('dark');
                }
            });
        });
        observer.observe(document.documentElement, { attributes: true });
    </script>

    @push('styles')
        @vite(['resources/css/app.css'])
        <style>
            .custom-glow {
                box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.5), 0 0 50px -10px rgba(196, 18, 48, 0.08);
            }
            
            /* CSS Fallback to ensure labels are always readable in case dark mode styles take a moment to apply */
            .custom-glow label,
            .custom-glow label span,
            .custom-glow .fi-fo-field-wrp-label,
            .custom-glow .fi-fo-field-wrp-label span {
                color: #cbd5e1 !important; /* Force light gray text for labels */
            }

            /* Soft ambient background glows */
            .glow-sphere-1 {
                position: absolute;
                top: 20%;
                left: 10%;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle, rgba(13, 34, 64, 0.4) 0%, rgba(8, 19, 37, 0) 70%);
                pointer-events: none;
                z-index: 1;
            }
            .glow-sphere-2 {
                position: absolute;
                bottom: 10%;
                right: 15%;
                width: 600px;
                height: 600px;
                background: radial-gradient(circle, rgba(196, 18, 48, 0.05) 0%, rgba(8, 19, 37, 0) 70%);
                pointer-events: none;
                z-index: 1;
            }
        </style>
    @endpush

    <!-- Glowing Background Spheres -->
    <div class="glow-sphere-1"></div>
    <div class="glow-sphere-2"></div>

    <!-- Left Side: Floating Logo & Subtitle -->
    <div class="lg:col-span-5 xl:col-span-4 flex flex-col justify-center items-center p-8 lg:p-12 relative z-10">
        <!-- Brand Wrapper -->
        <div class="flex flex-col items-center text-center">
            <!-- Brand Logo -->
            <img src="{{ asset('image/logo/logo.png') }}" alt="AISI Logo" class="h-28 w-auto mb-4 drop-shadow-lg">
            <!-- Brand Name -->
            <h1 class="text-3xl font-extrabold tracking-wider text-white">PT AISI AIKEN</h1>
            <p class="text-xs text-red-500 font-bold tracking-widest mt-1">INDONESIA</p>
        </div>

        <!-- Divider Line -->
        <div class="w-16 h-0.5 bg-slate-500/20 my-8"></div>

        <!-- Subtitle -->
        <div class="text-center space-y-1">
            <p class="text-slate-300 text-sm tracking-wide font-medium">Sistem Manajemen Konten</p>
            <p class="text-slate-400 text-xs tracking-wider">untuk Website Company Profile</p>
        </div>
    </div>

    <!-- Right Side: Login Form Card -->
    <div class="lg:col-span-7 xl:col-span-8 flex flex-col items-center justify-center p-6 sm:p-12 relative z-10">
        <div class="w-full max-w-md space-y-6">
            
            <!-- Welcome Heading -->
            <div class="space-y-1.5 px-2">
                <h2 class="text-3xl font-bold tracking-tight text-white">
                    Selamat Datang
                </h2>
                <p class="text-sm text-slate-400">
                    Silakan masuk untuk melanjutkan
                </p>
            </div>

            <!-- Glassmorphic Login Card -->
            <div class="p-8 sm:p-10 bg-[#0c1c38]/40 backdrop-blur-md border border-white/10 rounded-2xl custom-glow relative transition duration-300">
                <!-- Filament schema form content -->
                {{ $this->content }}
            </div>
            
            <!-- Bottom Copyright -->
            <div class="text-xs text-slate-500 px-2 pt-2">
                &copy; {{ date('Y') }} PT Aisi Aiken Indonesia. All rights reserved.
            </div>

        </div>
    </div>

</div>
