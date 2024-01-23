<x-app-layout>
    <div class="w-1/2 mx-auto">
        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" :value="'Nombre del alumno'" />
            <x-text-input id="nombre" class="block mt-1 w-full"
                type="text" name="nombre" :value="old('titulo', $alumno->nombre)" required
                autofocus autocomplete="nombre" disabled />
        </div>

        <!-- Título -->
        <div class="mt-4">
            <x-input-label for="total" :value="'Total de notas'" />
            <x-text-input id="total" class="block mt-1 w-full"
                type="text" name="total" :value="old('total', $total)" required
                autofocus autocomplete="total" disabled />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('alumnos.index') }}">
                <x-secondary-button class="ms-4">
                    Volver
                </x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>
