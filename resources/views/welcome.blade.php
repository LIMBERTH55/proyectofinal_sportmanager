<x-guest-layout>
    <div class="grid min-h-screen bg-slate-50 lg:grid-cols-2 font-sans selection:bg-blue-500 selection:text-white">
        
        <!-- LADO IZQUIERDO: Presentación (Oculto en móviles) -->
        <aside class="relative hidden overflow-hidden bg-slate-900 text-white lg:flex">
            <!-- Fondos y Gradientes Mejorados -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_20%,rgba(37,99,235,0.4),transparent_40%),linear-gradient(135deg,#040f2d_0%,#0e2a70_50%,#051540_100%)]"></div>
            <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-emerald-900/60 via-emerald-800/20 to-transparent"></div>
            
            <!-- Patrón de fondo sutil -->
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-50"></div>

            <!-- Elementos decorativos abstractos -->
            <div class="absolute -left-12 top-20 h-32 w-32 rounded-full border border-white/10 bg-blue-600/20 blur-2xl"></div>
            <div class="absolute right-10 top-1/4 h-24 w-24 rounded-full border border-emerald-400/20 bg-emerald-500/10 blur-xl"></div>

            <div class="relative z-10 mx-auto flex w-full max-w-2xl flex-col justify-center px-12 py-12">
                <!-- Header Izquierdo -->
                <div class="text-center">
                    <div class="mx-auto w-48 drop-shadow-xl transition-transform hover:scale-105">
                        @include('auth.partials.sportmanager-logo')
                    </div>
                    <h1 class="mt-8 text-5xl font-black leading-none tracking-tighter text-white">
                        SPORT<span class="bg-gradient-to-r from-emerald-400 to-emerald-300 bg-clip-text text-transparent">MANAGER</span>
                    </h1>
                    <p class="mx-auto mt-4 max-w-md text-xl font-medium text-blue-100/80">
                        Sistema Web de Gestión de Torneos Deportivos
                    </p>
                </div>

                <!-- Lista de Características (Izquierda) -->
                <div class="mx-auto mt-12 w-full max-w-lg space-y-5">
                    @foreach([
                        ['icon' => 'trophy', 'title' => 'Organiza torneos', 'text' => 'Crea competencias y controla su estado.'],
                        ['icon' => 'ball', 'title' => 'Programa partidos', 'text' => 'Define fechas, horarios, lugares y resultados.'],
                        ['icon' => 'users', 'title' => 'Gestiona usuarios', 'text' => 'Administra roles, permisos y participantes.'],
                        ['icon' => 'chart', 'title' => 'Consulta el avance', 'text' => 'Revisa estadísticas y actividad reciente.'],
                    ] as $item)
                        <div class="group flex items-start gap-4 rounded-xl p-2 transition hover:bg-white/5">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-white/10 bg-white/5 shadow-inner transition-colors group-hover:bg-blue-600/50 group-hover:border-blue-400/30">
                                @include('auth.partials.login-icon', ['name' => $item['icon'], 'class' => 'h-6 w-6 text-emerald-400 group-hover:text-white transition-colors'])
                            </div>
                            <div class="pt-1">
                                <p class="text-lg font-bold text-white">{{ $item['title'] }}</p>
                                <p class="text-sm font-medium text-blue-100/70">{!! $item['text'] !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Estadísticas (Glassmorphism) -->
                <div class="mx-auto mt-10 grid w-full max-w-lg grid-cols-3 gap-4">
                    @foreach([
                        ['icon' => 'trophy', 'value' => \App\Models\Torneo::count(), 'label' => 'Torneos'],
                        ['icon' => 'ball', 'value' => \App\Models\Partido::count(), 'label' => 'Partidos'],
                        ['icon' => 'users', 'value' => \App\Models\User::count(), 'label' => 'Usuarios'],
                    ] as $stat)
                        <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-md transition hover:-translate-y-1 hover:bg-white/10">
                            <div class="flex flex-col items-center text-center">
                                <div class="mb-2 flex h-10 w-10 items-center justify-center rounded-full bg-blue-500/20 text-emerald-400">
                                    @include('auth.partials.login-icon', ['name' => $stat['icon'], 'class' => 'h-5 w-5'])
                                </div>
                                <p class="text-3xl font-black text-white">{{ $stat['value'] }}</p>
                                <p class="mt-1 text-xs font-bold tracking-wider text-blue-200/60 uppercase">{{ $stat['label'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Footer Izquierdo -->
                <div class="mx-auto mt-12 w-full max-w-lg border-t border-white/10 pt-6 text-center text-sm font-medium text-blue-200/50">
                    <p>Proyecto Final &bull; INF560</p>
                    <p>Universidad Autónoma Tomás Frías</p>
                </div>
            </div>
        </aside>

        <!-- LADO DERECHO: Acceso / Registro -->
        <main class="relative flex min-h-screen items-center justify-center px-4 py-8 sm:px-6 lg:px-12">
            <!-- Círculo decorativo sutil detrás de la tarjeta en la derecha -->
            <div class="absolute left-1/2 top-1/2 -z-10 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-50 blur-[100px]"></div>

            <div class="w-full max-w-xl overflow-hidden rounded-3xl bg-white shadow-[0_8px_30px_rgb(0,0,0,0.08)] ring-1 ring-slate-900/5 transition-all">
                <div class="px-6 pb-8 pt-10 sm:px-12 sm:pt-12">
                    
                    <!-- Header Tarjeta -->
                    <div class="text-center">
                        <div class="mx-auto w-36 lg:hidden">
                            <!-- Solo se muestra en móvil para no repetir logos en desktop -->
                            @include('auth.partials.sportmanager-logo')
                        </div>

                        <span class="mt-6 inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold uppercase tracking-wide text-emerald-600 ring-1 ring-inset ring-emerald-600/20 lg:mt-0">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Plataforma Deportiva
                        </span>

                        <h2 class="mt-5 text-3xl font-black tracking-tight text-slate-900 sm:text-4xl">
                            Bienvenido a <span class="text-blue-600">SportManager</span>
                        </h2>

                        <p class="mx-auto mt-4 max-w-md text-base leading-relaxed text-slate-500">
                            Gestiona torneos, partidos, usuarios y resultados desde un panel de control rápido y seguro.
                        </p>
                    </div>

                    <!-- Características de la plataforma (Grilla Derecha) -->
                    <div class="mt-10 grid gap-4 sm:grid-cols-2">
                        @foreach([
                            ['icon' => 'shield', 'title' => 'Acceso seguro', 'text' => 'Roles y permisos'],
                            ['icon' => 'message', 'title' => 'Seguimiento', 'text' => 'Comentarios en vivo'],
                            ['icon' => 'ball', 'title' => 'Calendario', 'text' => 'Fechas y horarios'],
                            ['icon' => 'chart', 'title' => 'Dashboard', 'text' => 'Métricas en tiempo real'],
                        ] as $feature)
                            <div class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/50 p-4 transition hover:border-blue-100 hover:bg-blue-50/50">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-blue-600 shadow-sm ring-1 ring-slate-200/50 group-hover:text-blue-700">
                                    @include('auth.partials.login-icon', ['name' => $feature['icon'], 'class' => 'h-5 w-5'])
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-900">{{ $feature['title'] }}</p>
                                    <p class="text-xs font-medium text-slate-500">{{ $feature['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Botones de Acción -->
                    <div class="mt-10 space-y-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="group flex h-14 w-full items-center justify-center gap-3 rounded-xl bg-blue-600 px-5 text-lg font-bold text-white shadow-md shadow-blue-500/20 transition-all hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-600/30 focus:outline-none focus:ring-4 focus:ring-blue-600/20 focus:ring-offset-2">
                                @include('auth.partials.login-icon', ['name' => 'login', 'class' => 'h-6 w-6 transition-transform group-hover:translate-x-1'])
                                Abrir Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="group flex h-14 w-full items-center justify-center gap-3 rounded-xl bg-blue-600 px-5 text-lg font-bold text-white shadow-md shadow-blue-500/20 transition-all hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-600/30 focus:outline-none focus:ring-4 focus:ring-blue-600/20 focus:ring-offset-2">
                                @include('auth.partials.login-icon', ['name' => 'login', 'class' => 'h-6 w-6 transition-transform group-hover:translate-x-1'])
                                Iniciar Sesión
                            </a>

                            <a href="{{ route('register') }}" class="flex h-14 w-full items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-transparent px-5 text-lg font-bold text-slate-600 transition-colors hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-100">
                                Crear una cuenta
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Footer Tecnológico (Derecha) -->
                <div class="bg-slate-50/80 px-6 py-6 border-t border-slate-100 sm:px-12">
                    <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-3 text-xs font-bold text-slate-400">
                        <div class="flex items-center gap-1.5 transition-colors hover:text-red-500">
                            @include('auth.partials.login-icon', ['name' => 'laravel', 'class' => 'h-4 w-4'])
                            <span>Laravel</span>
                        </div>
                        <div class="flex items-center gap-1.5 transition-colors hover:text-indigo-500">
                            <span class="rounded bg-slate-200 px-1.5 py-0.5 text-[10px] italic text-slate-500 transition-colors hover:bg-indigo-500 hover:text-white">php</span>
                            <span>PHP</span>
                        </div>
                        <div class="flex items-center gap-1.5 transition-colors hover:text-sky-600">
                            @include('auth.partials.login-icon', ['name' => 'database', 'class' => 'h-4 w-4'])
                            <span>PostgreSQL</span>
                        </div>
                        <div class="flex items-center gap-1.5 transition-colors hover:text-cyan-500">
                            @include('auth.partials.login-icon', ['name' => 'waves', 'class' => 'h-4 w-4'])
                            <span>Tailwind</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-guest-layout>