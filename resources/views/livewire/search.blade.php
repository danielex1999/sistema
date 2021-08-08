<div class="flex-1 relative" x-data>
    <form action="{{ route('search') }}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" type="text" class="w-full" placeholder="¿Estas buscando algun producto?" />
        <button class="bg-orange-500 absolute right-0 top-0 w-12 h-full flex items-center justify-center rounded-r-md">
            <x-search />
        </button>
    </form>
    <div @click.away="$wire.open = false" :class="{'hidden': !$wire.open}" class="absolute w-full hidden">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">
                        <img src="{{ Storage::url($product->images->first()->url) }}" alt=""
                            class="w-16 h-12 object-cover">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p>Categoría: {{ $product->subcategory->category->name }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-lg leading-5">No existe el producto indicado</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
