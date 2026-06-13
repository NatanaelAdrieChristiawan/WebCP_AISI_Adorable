<x-filament-widgets::widget>
    <div style="background-color: #0e1e38; border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 16px; padding: 24px; color: white; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15); width: 100%;">
        
        <!-- Header Info & Small Stats -->
        <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-bottom: 24px; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 16px;">
            <!-- Left: Title & Subtitle -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(196, 18, 48, 0.15); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <!-- Line Chart Icon -->
                    <svg style="width: 1.25rem; height: 1.25rem; color: #c41230;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                </div>
                <div style="display: flex; flex-direction: column;">
                    <h3 style="font-weight: 700; font-size: 1.1rem; margin: 0; line-height: 1.2;" class="text-white">Visitor Analytics</h3>
                    <span style="font-size: 0.8rem; color: #64748b;">Last 14 days overview</span>
                </div>
            </div>

            <!-- Right: Dynamic Visitor Counters -->
            <div style="display: flex; gap: 24px; align-items: center;">
                <div style="text-align: right;">
                    <span style="font-size: 1.35rem; font-weight: 800; color: white; display: block; line-height: 1;">{{ $todayCount }}</span>
                    <span style="font-size: 0.7rem; color: #64748b; text-transform: uppercase; font-weight: 600; tracking-wide: 0.05em;">Today</span>
                </div>
                <div style="text-align: right; border-left: 1px solid rgba(255, 255, 255, 0.1); padding-left: 16px;">
                    <span style="font-size: 1.35rem; font-weight: 800; color: white; display: block; line-height: 1;">{{ $weekCount }}</span>
                    <span style="font-size: 0.7rem; color: #64748b; text-transform: uppercase; font-weight: 600; tracking-wide: 0.05em;">Week</span>
                </div>
                <div style="text-align: right; border-left: 1px solid rgba(255, 255, 255, 0.1); padding-left: 16px;">
                    <span style="font-size: 1.35rem; font-weight: 800; color: white; display: block; line-height: 1;">{{ $totalCount }}</span>
                    <span style="font-size: 0.7rem; color: #64748b; text-transform: uppercase; font-weight: 600; tracking-wide: 0.05em;">Total</span>
                </div>
            </div>
        </div>

        <!-- Line Chart Canvas container with Alpine initialization -->
        <div wire:ignore x-data="{
            chart: null,
            init() {
                const startChart = () => {
                    const canvas = this.$refs.canvas;
                    if (!canvas) return;
                    if (this.chart) return; // Prevent double initialization
                    
                    const ctx = canvas.getContext('2d');
                    this.chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @js($dates),
                            datasets: [
                                {
                                    label: 'Unique Visitors',
                                    data: @js($uniqueVisitors),
                                    borderColor: '#c41230',
                                    backgroundColor: 'rgba(196, 18, 48, 0.12)',
                                    borderWidth: 3,
                                    tension: 0.4,
                                    fill: true,
                                    pointBackgroundColor: '#ffffff',
                                    pointBorderColor: '#c41230',
                                    pointBorderWidth: 2.5,
                                    pointRadius: 4,
                                    pointHoverRadius: 6
                                },
                                {
                                    label: 'Pages Viewed',
                                    data: @js($pageViews),
                                    borderColor: '#3b82f6',
                                    backgroundColor: 'transparent',
                                    borderWidth: 2,
                                    borderDash: [5, 5],
                                    tension: 0.4,
                                    pointRadius: 0,
                                    pointHoverRadius: 4
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                    align: 'end',
                                    labels: {
                                        color: '#94a3b8',
                                        boxWidth: 12,
                                        font: {
                                            size: 11,
                                            family: 'Plus Jakarta Sans, sans-serif'
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        color: '#64748b',
                                        font: {
                                            size: 10
                                        }
                                    }
                                },
                                y: {
                                    grid: {
                                        color: 'rgba(255, 255, 255, 0.05)'
                                    },
                                    ticks: {
                                        color: '#64748b',
                                        font: {
                                            size: 10
                                        }
                                    }
                                }
                            }
                        }
                    });
                };

                if (window.Chart) {
                    startChart();
                } else {
                    let script = document.getElementById('chart-js-script');
                    if (!script) {
                        script = document.createElement('script');
                        script.id = 'chart-js-script';
                        script.src = 'https://cdn.jsdelivr.net/npm/chart.js';
                        document.head.appendChild(script);
                    }
                    
                    const interval = setInterval(() => {
                        if (window.Chart) {
                            clearInterval(interval);
                            startChart();
                        }
                    }, 100);
                }
            },
            destroy() {
                if (this.chart) {
                    this.chart.destroy();
                }
            }
        }" style="position: relative; height: 260px; width: 100%;">
            <canvas x-ref="canvas"></canvas>
        </div>

    </div>
</x-filament-widgets::widget>
