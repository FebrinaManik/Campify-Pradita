<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Campify Pradita</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/" class="text-xl font-bold text-indigo-600">🏕️ Campify Pradita</a>
                        </div>

                        <div class="flex items-center">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm font-medium text-gray-700 hover:text-gray-900">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <h2 class="text-2xl font-bold mb-6">Produk Terbaru</h2>

                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                    
                                    @forelse ($products as $product)
                                        <div class="border rounded-lg overflow-hidden shadow-sm">
                                            <a href="{{ route('product.show', $product) }}"> 
                                                @if($product->image)
                                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                                @else
                                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                                        <span class="text-gray-500">No Image</span>
                                                    </div>
                                                @endif
                                            </a>
                                            
                                            <div class="p-4">
                                                <a href="{{ route('product.show', $product) }}">
                                                    <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                                                </a>
                                                <p class="text-gray-600 text-sm mt-1">{{ $product->vendor->shop_name }}</p>
                                                <p class="font-bold text-indigo-600 mt-2 text-lg">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                                <a href="{{ route('product.show', $product) }}" class="mt-4 w-full inline-flex justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="col-span-full text-center text-gray-500">
                                            Belum ada produk yang dijual.
                                        </p>
                                    @endforelse
                                    
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>