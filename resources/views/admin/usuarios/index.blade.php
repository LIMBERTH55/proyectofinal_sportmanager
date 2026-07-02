<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Administración de Usuarios
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl">
            <x-flash-message />

            <div class="overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-slate-200">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[760px] text-left text-sm">
                        <thead class="bg-slate-100 text-xs font-black uppercase tracking-wide text-slate-500">
                            <tr>
                                <th class="p-3">Nombre</th>
                                <th class="p-3">Correo</th>
                                <th class="p-3">Rol Actual</th>
                                <th class="p-3">Nuevo Rol</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td class="p-3 font-bold text-slate-800">
                                        {{ $usuario->name }}
                                    </td>
                                    <td class="p-3 text-slate-600">
                                        {{ $usuario->email }}
                                    </td>
                                    <td class="p-3 text-slate-600">
                                        {{ $usuario->roles->first()?->name ?? 'Sin rol' }}
                                    </td>
                                    <td class="p-3">
                                        <form method="POST" action="{{ route('admin.usuarios.updateRole', $usuario) }}">
                                            @csrf
                                            @method('PATCH')

                                            <div class="flex flex-wrap gap-2">
                                                <select name="role" class="rounded-lg border border-slate-300 p-2">
                                                    @foreach($roles as $rol)
                                                        <option value="{{ $rol->name }}"
                                                            @selected($usuario->roles->first()?->name == $rol->name)>
                                                            {{ $rol->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <button class="rounded-lg bg-blue-600 px-4 py-2 font-bold text-white transition hover:bg-blue-700">
                                                    Guardar
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-5">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
