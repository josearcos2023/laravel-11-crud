<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Editar número') }}
    </h2>
  </x-slot>

  @if (session('status'))
    <div class="bg-red-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ session('status') }}</span>
    </div>
  @endif
  <div class="max-w-7xl mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
    <div class=" sm:max-w-md ">
      <form action="{{ route('agenda.update', $agenda->id) }}" method="POST" class="mt-6 space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
          <x-input-label for="nombre" :value="__('Nombre')" />
          <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full"
            value="{{ $agenda->nombre }}" />
          @error('nombre')
            <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <x-input-label for="apellido" :value="__('Apellido')" />
          <x-text-input id="apellido" name="apellido" type="text" class="mt-1 block w-full"
            value="{{ $agenda->apellido }}" />
          @error('apellido')
            <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <x-input-label for="telefono" :value="__('Telefono')" />
          <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full"
            value="{{ $agenda->telefono }}" />
          @error('telefono')
            <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="flex items-center gap-4">
          <x-primary-button>{{ __('Guardar') }}</x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
