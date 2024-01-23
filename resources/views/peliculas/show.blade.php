<x-app-layout>
    <div class="w-1/2 mx-auto">
        <!-- Título -->
        <div>
            <x-input-label for="titulo" :value="'Título de la película'" />
            <x-text-input id="titulo" class="block mt-1 w-full"
                type="text" name="titulo" :value="old('titulo', $pelicula->titulo)" required
                autofocus autocomplete="titulo" disabled />
        </div>

        <!-- Título -->
        <div class="mt-4">
            <x-input-label for="total" :value="'Total de entradas'" />
            <x-text-input id="total" class="block mt-1 w-full"
                type="text" name="total" :value="old('total', $total)" required
                autofocus autocomplete="total" disabled />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('peliculas.index') }}">
                <x-secondary-button class="ms-4">
                    Volver
                </x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>
