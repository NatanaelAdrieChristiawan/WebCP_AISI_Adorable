<x-filament-widgets::widget>
    <div style="background: linear-gradient(135deg, #0d2240 0%, #c41230 100%); border-radius: 16px; padding: 24px; margin-bottom: 24px; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);">
        
        <!-- Background Decorative Circles -->
        <div style="position: absolute; right: -20px; top: -20px; width: 120px; height: 120px; border-radius: 50%; background: rgba(255, 255, 255, 0.06); pointer-events: none;"></div>
        <div style="position: absolute; right: 20px; bottom: -40px; width: 100px; height: 100px; border-radius: 50%; background: rgba(255, 255, 255, 0.04); pointer-events: none;"></div>

        <!-- Welcome Info Section (Left) -->
        <div style="display: flex; align-items: center; gap: 16px; min-width: 250px; z-index: 2;">
            <!-- Circle Check Icon -->
            <div style="width: 48px; height: 48px; border-radius: 50%; background: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.25); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg style="width: 1.5rem; height: 1.5rem; color: white; flex-shrink: 0;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            
            <!-- Text Content -->
            <div style="display: flex; flex-direction: column; gap: 2px;">
                <span style="font-size: 0.8rem; color: rgba(255, 255, 255, 0.8); text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600; line-height: 1;">Panel Admin</span>
                <h2 style="font-size: 1.35rem; font-weight: 700; color: white; margin: 4px 0 2px 0; line-height: 1.2;">Selamat Datang, Admin AISI</h2>
                <span style="font-size: 0.85rem; color: rgba(255, 255, 255, 0.65); font-weight: 500; line-height: 1;">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </div>
        </div>

        <!-- Action Button (Right) -->
        <div style="flex-shrink: 0; z-index: 2;">
            <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer" 
               style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; background-color: rgba(255, 255, 255, 0.15); color: white; border: 1px solid rgba(255, 255, 255, 0.25); font-weight: 600; font-size: 0.85rem; border-radius: 10px; transition: background-color 150ms; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.05);"
               onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.25)'"
               onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.15)'">
                <!-- External Link Icon -->
                <svg style="width: 1rem; height: 1rem; fill: none; stroke: currentColor; stroke-width: 2; flex-shrink: 0;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Lihat Website
            </a>
        </div>

    </div>
</x-filament-widgets::widget>
