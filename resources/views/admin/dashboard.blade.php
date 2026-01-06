<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <section class="grid grid-cols-1 md:grid-cols-4 gap-5 pb-5">
            <!-- Card 1 -->
            <div class="group relative aspect-video rounded-2xl border border-white/20 dark:border-gray-700/50 bg-white/50 dark:bg-gray-800/40 backdrop-blur-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 p-5 flex flex-col justify-between">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Total Visitors</div>
                        <div class="text-3xl font-bold mt-1">{{ number_format($total_visitors) }}</div>
                    </div>
                    <div class="grid h-10 w-10 place-items-center rounded-full bg-sky-500/10 text-sky-500 dark:bg-sky-500/20">👥</div>
                </div>
                <div class="flex items-end justify-between mt-auto">
                    <svg class="w-24 h-12 stroke-sky-500" viewBox="0 0 100 50" fill="none" stroke-width="2" stroke-linecap="round">
                        <polyline points="0,{{ $total_visitors > 0 ? max(10, min(40, 50 - ($total_visitors % 40))) : 40 }} 25,{{ $total_visitors > 0 ? max(10, min(40, 45 - ($total_visitors % 35))) : 35 }} 50,{{ $total_visitors > 0 ? max(10, min(40, 40 - ($total_visitors % 30))) : 30 }} 75,{{ $total_visitors > 0 ? max(10, min(40, 35 - ($total_visitors % 25))) : 25 }} 100,{{ $total_visitors > 0 ? max(10, min(40, 30 - ($total_visitors % 20))) : 20 }}" />
                    </svg>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-sky-500/10 text-sky-600 dark:text-sky-400">{{ $total_change > 0 ? '+' : '' }}{{ $total_change }}%</span>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="group relative aspect-video rounded-2xl border border-white/20 dark:border-gray-700/50 bg-white/50 dark:bg-gray-800/40 backdrop-blur-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 p-5 flex flex-col justify-between">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Mobile Visitors</div>
                        <div class="text-3xl font-bold mt-1">{{ number_format($mobile_visitors) }}</div>
                    </div>
                    <div class="grid h-10 w-10 place-items-center rounded-full bg-rose-500/10 text-rose-500 dark:bg-rose-500/20">📱</div>
                </div>
                <div class="flex items-end justify-between mt-auto">
                    <svg class="w-24 h-12 stroke-rose-500" viewBox="0 0 100 50" fill="none" stroke-width="2" stroke-linecap="round">
                        <polyline points="0,{{ $mobile_visitors > 0 ? max(10, min(40, 50 - ($mobile_visitors % 40))) : 40 }} 25,{{ $mobile_visitors > 0 ? max(10, min(40, 45 - ($mobile_visitors % 35))) : 35 }} 50,{{ $mobile_visitors > 0 ? max(10, min(40, 40 - ($mobile_visitors % 30))) : 30 }} 75,{{ $mobile_visitors > 0 ? max(10, min(40, 35 - ($mobile_visitors % 25))) : 25 }} 100,{{ $mobile_visitors > 0 ? max(10, min(40, 30 - ($mobile_visitors % 20))) : 20 }}" />
                    </svg>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-rose-500/10 text-rose-600 dark:text-rose-400">{{ $mobile_change > 0 ? '+' : '' }}{{ $mobile_change }}%</span>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group relative aspect-video rounded-2xl border border-white/20 dark:border-gray-700/50 bg-white/50 dark:bg-gray-800/40 backdrop-blur-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 p-5 flex flex-col justify-between">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Desktop Visitors</div>
                        <div class="text-3xl font-bold mt-1">{{ number_format($desktop_visitors) }}</div>
                    </div>
                    <div class="grid h-10 w-10 place-items-center rounded-full bg-emerald-500/10 text-emerald-500 dark:bg-emerald-500/20">🖥️</div>
                </div>
                <div class="flex items-end justify-between mt-auto">
                    <svg class="w-24 h-12 stroke-emerald-500" viewBox="0 0 100 50" fill="none" stroke-width="2" stroke-linecap="round">
                        <polyline points="0,{{ $desktop_visitors > 0 ? max(10, min(40, 50 - ($desktop_visitors % 40))) : 40 }} 25,{{ $desktop_visitors > 0 ? max(10, min(40, 45 - ($desktop_visitors % 35))) : 35 }} 50,{{ $desktop_visitors > 0 ? max(10, min(40, 40 - ($desktop_visitors % 30))) : 30 }} 75,{{ $desktop_visitors > 0 ? max(10, min(40, 35 - ($desktop_visitors % 25))) : 25 }} 100,{{ $desktop_visitors > 0 ? max(10, min(40, 30 - ($desktop_visitors % 20))) : 20 }}" />
                    </svg>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400">{{ $desktop_change > 0 ? '+' : '' }}{{ $desktop_change }}%</span>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="group relative aspect-video rounded-2xl border border-white/20 dark:border-gray-700/50 bg-white/50 dark:bg-gray-800/40 backdrop-blur-xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 p-5 flex flex-col justify-between">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Tablet Visitors</div>
                        <div class="text-3xl font-bold mt-1">{{ number_format($tablet_visitors) }}</div>
                    </div>
                    <div class="grid h-10 w-10 place-items-center rounded-full bg-amber-500/10 text-amber-500 dark:bg-amber-500/20">📋</div>
                </div>
                <div class="flex items-end justify-between mt-auto">
                    <svg class="w-24 h-12 stroke-amber-500" viewBox="0 0 100 50" fill="none" stroke-width="2" stroke-linecap="round">
                        <polyline points="0,{{ $tablet_visitors > 0 ? max(10, min(40, 50 - ($tablet_visitors % 40))) : 40 }} 25,{{ $tablet_visitors > 0 ? max(10, min(40, 45 - ($tablet_visitors % 35))) : 35 }} 50,{{ $tablet_visitors > 0 ? max(10, min(40, 40 - ($tablet_visitors % 30))) : 30 }} 75,{{ $tablet_visitors > 0 ? max(10, min(40, 35 - ($tablet_visitors % 25))) : 25 }} 100,{{ $tablet_visitors > 0 ? max(10, min(40, 30 - ($tablet_visitors % 20))) : 20 }}" />
                    </svg>
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-amber-500/10 text-amber-600 dark:text-amber-400">{{ $tablet_change > 0 ? '+' : '' }}{{ $tablet_change }}%</span>
                </div>
            </div>
        </section>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <!-- Additional content area can go here -->
        </div>
    </div>
</x-layouts.app>
