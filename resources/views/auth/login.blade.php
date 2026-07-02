<x-guest-layout>
    <div class="grid min-h-screen bg-slate-50 lg:grid-cols-2">
        <aside class="relative hidden overflow-hidden bg-[#061640] text-white lg:flex">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_78%_16%,rgba(29,78,216,.36),transparent_25%),linear-gradient(135deg,#07163f_0%,#07358d_55%,#08215c_100%)]"></div>
            <div class="absolute inset-x-0 bottom-0 h-[46%] bg-[linear-gradient(to_top,rgba(5,46,22,.95),rgba(10,73,38,.66)_35%,rgba(10,35,85,.15)_75%,transparent)]"></div>
            <div class="absolute bottom-0 left-0 right-0 h-44 border-t border-white/10 bg-[repeating-linear-gradient(105deg,rgba(255,255,255,.12)_0_1px,transparent_1px_48px)] opacity-40"></div>
            <div class="absolute -left-9 top-24 h-20 w-20 rounded-full border-[7px] border-blue-500/80"></div>
            <div class="absolute right-16 top-20 grid grid-cols-7 gap-3 opacity-55">
                @for ($i = 0; $i < 42; $i++)
                    <span class="h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                @endfor
            </div>
            <div class="absolute right-12 top-72 h-24 w-24 rounded-full border-[7px] border-blue-500/20"></div>
            <div class="absolute right-10 bottom-14 grid grid-cols-7 gap-3 opacity-70">
                @for ($i = 0; $i < 28; $i++)
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                @endfor
            </div>

            <div class="relative z-10 mx-auto flex w-full max-w-2xl flex-col justify-center px-14 py-12">
                <div class="text-center">
                    <div class="mx-auto w-52">
                        @include('auth.partials.sportmanager-logo')
                    </div>
                    <h1 class="mt-6 text-5xl font-black leading-none tracking-tight">
                        SPORT<span class="text-emerald-400">MANAGER</span>
                    </h1>
                    <p class="mx-auto mt-4 max-w-sm text-2xl font-medium leading-snug text-white">
                        Sistema Web de Gesti&oacute;n de Torneos Deportivos
                    </p>
                    <div class="mx-auto mt-5 h-1 w-24 rounded-full bg-emerald-400"></div>
                </div>

                <div class="mx-auto mt-8 w-full max-w-lg space-y-3">
                    @foreach([
                        ['icon' => 'trophy', 'title' => 'Gesti&oacute;n de Torneos', 'text' => 'Crea y administra torneos deportivos'],
                        ['icon' => 'ball', 'title' => 'Gesti&oacute;n de Partidos', 'text' => 'Programa partidos y registra resultados'],
                        ['icon' => 'users', 'title' => 'Usuarios y Equipos', 'text' => 'Administra usuarios, equipos y roles'],
                        ['icon' => 'shield', 'title' => 'Roles y Permisos', 'text' => 'Control de acceso seguro y personalizado'],
                        ['icon' => 'message', 'title' => 'Comentarios', 'text' => 'Comunicaci&oacute;n y seguimiento en tiempo real'],
                        ['icon' => 'chart', 'title' => 'Dashboard Profesional', 'text' => 'Estad&iacute;sticas y reportes en tiempo real'],
                    ] as $item)
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border border-white/15 bg-blue-600/55 shadow-lg shadow-blue-950/30">
                                @include('auth.partials.login-icon', ['name' => $item['icon'], 'class' => 'h-6 w-6 text-white'])
                            </div>
                            <div>
                                <p class="text-lg font-black leading-tight">{{ $item['title'] }}</p>
                                <p class="text-sm font-medium text-blue-100">{!! $item['text'] !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mx-auto mt-7 grid w-full max-w-lg grid-cols-3 gap-4">
                    @foreach([
                        ['icon' => 'trophy', 'value' => \App\Models\Torneo::count(), 'label' => 'Torneos', 'sub' => 'Activos'],
                        ['icon' => 'ball', 'value' => \App\Models\Partido::count(), 'label' => 'Partidos', 'sub' => 'Jugados'],
                        ['icon' => 'users', 'value' => \App\Models\User::count(), 'label' => 'Usuarios', 'sub' => 'Registrados'],
                    ] as $stat)
                        <div class="rounded-lg bg-white/95 p-4 text-slate-900 shadow-xl shadow-blue-950/20">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-700 text-white">
                                    @include('auth.partials.login-icon', ['name' => $stat['icon'], 'class' => 'h-6 w-6'])
                                </div>
                                <div>
                                    <p class="text-3xl font-black leading-none">{{ $stat['value'] }}</p>
                                    <p class="mt-1 text-sm font-bold leading-none">{{ $stat['label'] }}</p>
                                    <p class="text-xs font-medium text-slate-600">{{ $stat['sub'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mx-auto mt-8 w-full max-w-lg text-lg font-medium">
                    <p>Proyecto Final &bull; INF560</p>
                    <p>Universidad Aut&oacute;noma Tom&aacute;s Fr&iacute;as</p>
                </div>
            </div>
        </aside>

        <section class="flex min-h-screen items-center justify-center bg-[linear-gradient(135deg,#f8fbff_0%,#eef4fb_100%)] px-4 py-8 sm:px-6 lg:px-12">
            <div class="w-full max-w-xl overflow-hidden rounded-2xl bg-white shadow-2xl shadow-slate-300/60 ring-1 ring-slate-200/80">
                <div class="px-6 pb-8 pt-8 sm:px-12 sm:pt-10">
                    <div class="text-center">
                        <div class="mx-auto w-40">
                            @include('auth.partials.sportmanager-logo')
                        </div>
                        <h2 class="mt-4 text-4xl font-black tracking-tight text-slate-900">
                            Bienvenido <span class="text-blue-700">de nuevo</span>
                        </h2>
                        <p class="mt-3 text-lg font-medium text-slate-500">
                            Inicia sesi&oacute;n para acceder a tu cuenta
                        </p>
                    </div>

                    <x-auth-session-status class="mb-4 mt-6" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="block text-base font-bold text-slate-900">Correo Electr&oacute;nico</label>
                            <div class="mt-2 flex h-14 items-center gap-4 rounded-lg border border-slate-300 bg-white px-4 shadow-sm transition focus-within:border-blue-600 focus-within:ring-4 focus-within:ring-blue-100">
                                @include('auth.partials.login-icon', ['name' => 'mail', 'class' => 'h-6 w-6 shrink-0 text-blue-700'])
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                    placeholder="ejemplo@correo.com"
                                    class="h-full min-w-0 flex-1 border-0 bg-transparent p-0 text-base font-medium text-slate-900 placeholder:text-slate-400 focus:ring-0">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <label for="password" class="block text-base font-bold text-slate-900">Contrase&ntilde;a</label>
                            <div class="mt-2 flex h-14 items-center gap-4 rounded-lg border border-slate-300 bg-white px-4 shadow-sm transition focus-within:border-blue-600 focus-within:ring-4 focus-within:ring-blue-100">
                                @include('auth.partials.login-icon', ['name' => 'lock', 'class' => 'h-6 w-6 shrink-0 text-blue-700'])
                                <input id="password" name="password" type="password" required autocomplete="current-password"
                                    placeholder="Tu contrase&ntilde;a"
                                    class="h-full min-w-0 flex-1 border-0 bg-transparent p-0 text-base font-medium text-slate-900 placeholder:text-slate-400 focus:ring-0">
                                <button type="button" aria-label="Mostrar u ocultar contrase&ntilde;a"
                                    class="rounded-md p-1 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700"
                                    onclick="const input = document.getElementById('password'); input.type = input.type === 'password' ? 'text' : 'password';">
                                    @include('auth.partials.login-icon', ['name' => 'eye-off', 'class' => 'h-5 w-5'])
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <label class="inline-flex items-center gap-3 text-sm font-medium text-slate-600">
                                <input type="checkbox" name="remember"
                                    class="h-5 w-5 rounded border-slate-300 bg-white text-blue-700 shadow-sm focus:ring-blue-600">
                                <span>Recordarme</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-bold text-blue-700 transition hover:text-blue-800 hover:underline">
                                    &iquest;Olvidaste tu contrase&ntilde;a?
                                </a>
                            @endif
                        </div>

                        <button type="submit"
                            class="flex h-14 w-full items-center justify-center gap-3 rounded-lg bg-blue-700 px-5 text-xl font-black text-white shadow-lg shadow-blue-700/25 transition hover:-translate-y-0.5 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-200">
                            @include('auth.partials.login-icon', ['name' => 'login', 'class' => 'h-6 w-6'])
                            Iniciar Sesi&oacute;n
                        </button>

                        <div class="border-t border-slate-200 pt-7 text-center">
                            <p class="text-base font-medium text-slate-500">&iquest;No tienes una cuenta?</p>
                            <a href="{{ route('register') }}"
                                class="mt-3 inline-flex items-center gap-2 text-lg font-black text-emerald-600 transition hover:text-emerald-700">
                                Registrarse ahora
                                @include('auth.partials.login-icon', ['name' => 'chevron-right', 'class' => 'h-5 w-5'])
                            </a>
                        </div>
                    </form>
                </div>

                <div class="grid grid-cols-2 gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 text-sm font-bold text-slate-600 sm:grid-cols-4 sm:px-10">
                    <div class="flex items-center justify-center gap-2">
                        <span class="text-red-500">@include('auth.partials.login-icon', ['name' => 'laravel', 'class' => 'h-5 w-5'])</span>
                        Laravel 13
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <span class="rounded-full bg-indigo-500 px-2 py-0.5 text-xs font-black italic text-white">php</span>
                        PHP 8.3+
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <span class="text-sky-700">@include('auth.partials.login-icon', ['name' => 'database', 'class' => 'h-5 w-5'])</span>
                        PostgreSQL
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <span class="text-cyan-500">@include('auth.partials.login-icon', ['name' => 'waves', 'class' => 'h-5 w-5'])</span>
                        Tailwind CSS
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>
