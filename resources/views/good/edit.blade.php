<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Good') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Good Information') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('good.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="id" id="id" value="{{$good->id}}">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $good->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="sku" :value="__('Sku')" />
                                <x-text-input id="sku" name="sku" type="text" class="mt-1 block w-full" :value="old('sku', $good->sku)" required autocomplete="sku" />
                                <x-input-error class="mt-2" :messages="$errors->get('sku')" />
                            </div>

                            <div>
                                <x-input-label for="desc" :value="__('Desc')" />
                                <x-text-area id="desc" name="desc" class="mt-1 block w-full" :value="old('desc', $good->desc)" required>
                                    {{old('desc', $good->desc)}}
                                </x-text-area>
                                <x-input-error class="mt-2" :messages="$errors->get('desc')" />
                            </div>
                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $good->price)" required autocomplete="price" />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'good-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
