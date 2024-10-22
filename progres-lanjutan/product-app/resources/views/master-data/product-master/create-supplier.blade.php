<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Halaman Create Supplier') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="text-center mb-5 text-2xl font-bold">Create New Supplier</h2>
                        <x-auth-session-status class="mb-4" :status="session('success')" />
                            <form action="{{ route('supplier-store')}}" method="POST" class="space-y-4">
                            @csrf <!-- Laravel CSRF protection -->

                            <div class="form-group">
                                <label for="supplier_name" class="block text-sm font-medium text-gray-700">Supplier Name</label>
                                <input type="text" id="supplier_name" name="supplier_name" placeholder="Masukkan nama" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="supplier_address" class="block text-sm font-medium text-gray-700">Supplier address</label>
                                <textarea id="supplier_address" name="supplier_address" placeholder="Masukkan alamat" rows="3" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                                <textarea id="comment" name="comment" rows="2" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>

                            <br>

                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-black bg-indigo-600 border border-black rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                        </form>
                    </div>

                    @vite('resources/js/app.js') <!-- Include Vite's JS assets -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
