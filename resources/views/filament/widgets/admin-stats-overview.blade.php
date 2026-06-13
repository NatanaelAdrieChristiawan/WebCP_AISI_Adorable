<x-filament-widgets::widget>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; width: 100%; margin-bottom: 24px;">

        <!-- Card 1: Total Produk -->
        <div style="position: relative; overflow: hidden; background: linear-gradient(135deg, #0d2240 0%, #c41230 100%); border-radius: 16px; padding: 24px; color: white; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);">
            <!-- Background Decorative Circles -->
            <div style="position: absolute; right: -20px; top: -20px; width: 120px; height: 120px; border-radius: 50%; background: rgba(255, 255, 255, 0.06); pointer-events: none;"></div>
            <div style="position: absolute; right: 20px; bottom: -40px; width: 100px; height: 100px; border-radius: 50%; background: rgba(255, 255, 255, 0.04); pointer-events: none;"></div>

            <!-- Icon Column -->
            <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: rgba(255, 255, 255, 0.15); border-radius: 12px; flex-shrink: 0; z-index: 2;">
                <!-- Fire Icon -->
                <svg style="width: 1.5rem; height: 1.5rem; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                </svg>
            </div>

            <!-- Text Data Column -->
            <div style="display: flex; flex-direction: column; z-index: 2;">
                <span style="font-size: 0.85rem; font-weight: 600; opacity: 0.8; text-transform: uppercase; letter-spacing: 0.05em;">Total Produk</span>
                <span style="font-size: 2.25rem; font-weight: 800; line-height: 1.1; margin: 4px 0;">{{ $productsCount }}</span>
                <span style="font-size: 0.8rem; opacity: 0.65;">produk terdaftar di katalog</span>
            </div>
        </div>

        <!-- Card 2: Total Klien -->
        <div style="position: relative; overflow: hidden; background: linear-gradient(135deg, #0d2240 0%, #c41230 100%); border-radius: 16px; padding: 24px; color: white; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);">
            <!-- Background Decorative Circles -->
            <div style="position: absolute; right: -20px; top: -20px; width: 120px; height: 120px; border-radius: 50%; background: rgba(255, 255, 255, 0.06); pointer-events: none;"></div>
            <div style="position: absolute; right: 20px; bottom: -40px; width: 100px; height: 100px; border-radius: 50%; background: rgba(255, 255, 255, 0.04); pointer-events: none;"></div>

            <!-- Icon Column -->
            <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: rgba(255, 255, 255, 0.15); border-radius: 12px; flex-shrink: 0; z-index: 2;">
                <!-- Briefcase Icon -->
                <svg style="width: 1.5rem; height: 1.5rem; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 .414-.336.75-.75.75H4.5a.75.75 0 01-.75-.75V14.15M20.25 14.15a15.02 15.02 0 00-3.25-2.24M20.25 14.15c.677-.03 1.313-.304 1.78-.77a2.25 2.25 0 00-3.182-3.182c-.466.467-.74 1.103-.77 1.78M3.75 14.15a15.02 15.02 0 013.25-2.24M3.75 14.15c-.677-.03-1.313-.304-1.78-.77a2.25 2.25 0 013.182-3.182c.466.467.74 1.103.77 1.78m12.08 3.76a14.962 14.962 0 01-8 0m8 0V11.25H7.75v3.66M15.75 8.25V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v3" />
                </svg>
            </div>

            <!-- Text Data Column -->
            <div style="display: flex; flex-direction: column; z-index: 2;">
                <span style="font-size: 0.85rem; font-weight: 600; opacity: 0.8; text-transform: uppercase; letter-spacing: 0.05em;">Total Klien</span>
                <span style="font-size: 2.25rem; font-weight: 800; line-height: 1.1; margin: 4px 0;">{{ $clientsCount }}</span>
                <span style="font-size: 0.8rem; opacity: 0.65;">klien korporat terdaftar</span>
            </div>
        </div>

        <!-- Card 3: Artikel Blog -->
        <div style="position: relative; overflow: hidden; background: linear-gradient(135deg, #0d2240 0%, #c41230 100%); border-radius: 16px; padding: 24px; color: white; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);">
            <!-- Background Decorative Circles -->
            <div style="position: absolute; right: -20px; top: -20px; width: 120px; height: 120px; border-radius: 50%; background: rgba(255, 255, 255, 0.06); pointer-events: none;"></div>
            <div style="position: absolute; right: 20px; bottom: -40px; width: 100px; height: 100px; border-radius: 50%; background: rgba(255, 255, 255, 0.04); pointer-events: none;"></div>

            <!-- Icon Column -->
            <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: rgba(255, 255, 255, 0.15); border-radius: 12px; flex-shrink: 0; z-index: 2;">
                <!-- Newspaper Icon -->
                <svg style="width: 1.5rem; height: 1.5rem; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                </svg>
            </div>

            <!-- Text Data Column -->
            <div style="display: flex; flex-direction: column; z-index: 2;">
                <span style="font-size: 0.85rem; font-weight: 600; opacity: 0.8; text-transform: uppercase; letter-spacing: 0.05em;">Artikel Blog</span>
                <span style="font-size: 2.25rem; font-weight: 800; line-height: 1.1; margin: 4px 0;">{{ $blogPostsCount }}</span>
                <span style="font-size: 0.8rem; opacity: 0.65;">artikel berita & rilis</span>
            </div>
        </div>

    </div>
</x-filament-widgets::widget>
