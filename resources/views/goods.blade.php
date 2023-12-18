<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center gap-4">
                        <a href="{{route('good.create')}}"><x-primary-button>{{ __('Create Good') }}</x-primary-button></a>
                    </div>
                    <div class="flex items-baseline gap-4">
                        <div class="flex-1 font-semibold">Name</div>
                        <div class="flex-1 font-semibold">Sku</div>
                        <div class="flex-1 font-semibold">Price</div>
                        <div class="flex-1 font-semibold">Desc</div>
                        <div class="w-16"></div>
                        <div class="w-32"></div>
                    </div>
                    @foreach($goods as $good)
                    <div class="flex items-baseline gap-4">
                        <div class="flex-1">{{$good->name}}</div>
                        <div class="flex-1">{{$good->sku}}</div>
                        <div class="flex-1">{{$good->price}}</div>
                        <div class="flex-1">{{$good->desc}}</div>
                        <div class="w-16"><a href="{{route('good.edit',['id'=>$good->id])}}"><x-secondary-button>Edit</x-secondary-button></a></div>
                        <div class="w-32"><a href="{{route('good.destroy',['id'=>$good->id])}}"><x-danger-button>Remove</x-danger-button></a></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
