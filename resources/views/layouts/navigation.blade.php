<header x-data="{ open: false }" class="border-b border-slate-200 bg-white">
    <div class="flex items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <div class="min-w-0">
            <p class="text-xs font-black uppercase tracking-wide text-emerald-600 lg:hidden">SportManager</p>
            <p class="truncate text-sm font-semibold text-slate-500">
                Sistema Web de Gestión de Torneos Deportivos
            </p>
        </div>

        <div class="flex items-center gap-3">
            <div class="hidden text-right sm:block">
                <div class="max-w-40 truncate text-sm font-bold text-slate-900">
                    {{ auth()->user()->name }}
                </div>
                <small class="text-slate-500">
                    {{ auth()->user()->roles->first()?->name ?? 'Sin rol' }}
                </small>
            </div>

            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-blue-600 font-black text-white">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <form method="POST" action="{{ route('logout') }}" class="hidden lg:block">
                @csrf
                <button type="submit"
                    class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-bold text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">
                    Cerrar sesión
                </button>
            </form>

            <button type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-slate-200 text-slate-600 transition hover:bg-slate-50 lg:hidden"
                @click="open = ! open"
                aria-label="Abrir menú">
                <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <nav :class="{ 'block': open, 'hidden': !open }" class="hidden border-t border-slate-200 px-4 py-3 lg:hidden">
        <div class="space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('torneos.index')" :active="request()->routeIs('torneos.*')">
                {{ __('Torneos') }}
            </x-responsive-nav-link>

            @role('Administrador')
                <x-responsive-nav-link :href="route('admin.usuarios.index')" :active="request()->routeIs('admin.*')">
                    {{ __('Usuarios') }}
                </x-responsive-nav-link>
            @endrole
        </div>

        <div class="mt-3 border-t border-slate-200 pt-3">
            <div class="px-4">
                <div class="font-bold text-slate-800">{{ Auth::user()->name }}</div>
                <div class="text-sm text-slate-500">{{ Auth::user()->email }}</div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Cerrar sesión') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </nav>
</header>
