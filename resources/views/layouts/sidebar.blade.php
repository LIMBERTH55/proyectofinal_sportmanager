<aside class="hidden w-72 shrink-0 border-r border-slate-200 bg-slate-950 text-white lg:flex lg:flex-col">
    <div class="flex h-20 items-center gap-3 border-b border-white/10 px-6">
        <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-500 text-sm font-black text-slate-950">
            SM
        </div>
        <div>
            <p class="text-lg font-black leading-none">SportManager</p>
            <p class="mt-1 text-xs font-semibold text-slate-400">Panel de gesti&oacute;n</p>
        </div>
    </div>

    <nav class="flex-1 space-y-2 px-4 py-6">
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-bold transition {{ request()->routeIs('dashboard') ? 'bg-emerald-500 text-slate-950' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            <span class="flex h-8 w-8 items-center justify-center rounded-md bg-white/10">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13h8V3H3v10z" /><path d="M13 21h8V11h-8v10z" /><path d="M13 3v6h8V3h-8z" /><path d="M3 21h8v-6H3v6z" /></svg>
            </span>
            Dashboard
        </a>

        <a href="{{ route('torneos.index') }}"
            class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-bold transition {{ request()->routeIs('torneos.*') ? 'bg-emerald-500 text-slate-950' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            <span class="flex h-8 w-8 items-center justify-center rounded-md bg-white/10">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 21h8" /><path d="M12 17v4" /><path d="M7 4h10v5a5 5 0 0 1-10 0V4z" /><path d="M5 6H3v2a4 4 0 0 0 4 4" /><path d="M19 6h2v2a4 4 0 0 1-4 4" /></svg>
            </span>
            Torneos
        </a>

        @role('Administrador')
            <a href="{{ route('admin.usuarios.index') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-bold transition {{ request()->routeIs('admin.*') ? 'bg-emerald-500 text-slate-950' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                <span class="flex h-8 w-8 items-center justify-center rounded-md bg-white/10">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M22 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                </span>
                Usuarios
            </a>
        @endrole
    </nav>

    <div class="border-t border-white/10 p-4">
        <div class="rounded-lg bg-white/5 p-4">
            <p class="text-sm font-black">{{ auth()->user()?->name }}</p>
            <p class="mt-1 text-xs text-slate-400">{{ auth()->user()?->email }}</p>
            <p class="mt-3 inline-flex rounded-md bg-emerald-500/15 px-2 py-1 text-xs font-bold text-emerald-300">
                {{ auth()->user()?->roles->first()?->name ?? 'Sin rol' }}
            </p>
        </div>
    </div>
</aside>
