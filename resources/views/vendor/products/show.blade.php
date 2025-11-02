<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }} </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg shadow-md">
                            @else
                                <div class="w-full h-96 bg-gray-200 flex items-center justify-center rounded-lg shadow-md">
                                    <span class="text-gray-500">No Image</span>
                                </div>
                            @endif
                        </div>

                        <div>
                            <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
                            <p class="text-sm text-gray-600 mb-4">
                                Dijual oleh: <span class="font-medium text-indigo-600">{{ $product->vendor->shop_name }}</span>
                            </p>
                            
                            <p class="text-3xl font-bold text-indigo-700 mb-4">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            
                            <p class="text-gray-700 text-base mb-2">
                                Stok Tersisa: <span class="font-medium">{{ $product->stock }}</span>
                            </p>
                            
                            <p class="text-gray-700 text-base mb-6">
                                {!! nl2br(e($product->description)) !!} </p>

                            <form action="#" method="POST">
                                @csrf
                                <button type="submit" class="w-full mt-4 inline-flex justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                    + Tambah ke Keranjang
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>