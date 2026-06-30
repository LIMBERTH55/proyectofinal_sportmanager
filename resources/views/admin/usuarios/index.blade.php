<x-app-layout>

    <x-slot name="header">

        <h2 class="text-2xl font-bold">

            Administración de Usuarios

        </h2>

    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto">

            @if(session('success'))

                <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-5">

                    {{ session('success') }}

                </div>

            @endif

            <div class="bg-white shadow rounded-lg overflow-hidden">

                <table class="w-full">

                    <thead>

                        <tr class="bg-gray-100">

                            <th class="p-3">Nombre</th>

                            <th class="p-3">Correo</th>

                            <th class="p-3">Rol Actual</th>

                            <th class="p-3">Nuevo Rol</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($usuarios as $usuario)

                            <tr class="border-b">

                                <td class="p-3">

                                    {{ $usuario->name }}

                                </td>

                                <td class="p-3">

                                    {{ $usuario->email }}

                                </td>

                                <td class="p-3">

                                    {{ $usuario->roles->first()?->name ?? 'Sin rol' }}

                                </td>

                                <td class="p-3">

                                    <form method="POST" action="{{ route('admin.usuarios.updateRole', $usuario) }}">

                                        @csrf

                                        @method('PATCH')

                                        <div class="flex gap-2">

                                            <select name="role" class="border rounded p-2">

                                                @foreach($roles as $rol)

                                                    <option value="{{ $rol->name }}"
                                                        @selected($usuario->roles->first()?->name == $rol->name)>

                                                        {{ $rol->name }}

                                                    </option>

                                                @endforeach

                                            </select>

                                            <button class="bg-blue-600 text-white px-4 rounded">

                                                Guardar

                                            </button>

                                        </div>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

                <div class="p-5">

                    {{ $usuarios->links() }}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>