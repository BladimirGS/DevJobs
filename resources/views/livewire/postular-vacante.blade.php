<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{ session('mensaje') }}
        </p>
    @else
        @if ($vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0)
            <p class="uppercase border border-red-600 bg-red-100 text-red-600 font-bold p-2 my-5 text-sm rounded-lg">
                Ya has postulado a esta vacante anteriormente
            </p>
        @else
            <form wire:submit.prevent='postularme' class="w-96 mt-5">
                <div class="mb-5">
                    <x-input-label for="cv" :value="__('Currículum o Hoja de Vida (PDF)')" />
                    <x-text-input id="cv" type="file" wire:model='cv' accept=".pdf" class="block mt-1 w-full" />
                </div>

                <x-input-error :messages="$errors->get('cv')" class="mt-2" />

                <x-primary-button :disabled="$vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0">
                    {{ __('postularme') }}
                </x-primary-button>
            </form>
        @endif
    @endif
</div>
