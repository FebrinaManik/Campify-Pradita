<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar sebagai Vendor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        {{ __('Informasi Toko Anda') }}
                    </h3>
                    <p class="mb-6 text-sm text-gray-600">
                        {{ __('Lengkapi data di bawah ini untuk membuka toko Anda di Campify Pradita.') }}
                    </p>

                    <form method="POST" action="{{ route('vendor.register.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="shop_name" :value="__('Nama Toko')" />
                            <x-text-input id="shop_name" class="block mt-1 w-full" type="text" name="shop_name" :value="old('shop_name')" required autofocus autocomplete="organization-title" />
                            <x-input-error :messages="$errors->get('shop_name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Alamat Toko / Pengiriman')" />
                            <textarea id="address" name="address" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('address') }}</textarea>
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Buka Toko Sekarang') }}
                            </x-primary-button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>