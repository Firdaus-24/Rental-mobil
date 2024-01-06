<x-app-layout>
    <div class="container mx-auto mt-8 p-6">
        <div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-6 px-6 pt-6">Formulir Rental Mobil</h2>

            <form action="{{ route('sewa') }}">
                @csrf
                <input type="hidden" name="carid" id="carid">
                <div class="mb-4 px-6">
                    <label for="tgla" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai</label>
                    <input type="date"
                        class="w-80 px-4 py-2  border rounded-md focus:outline-none focus:border-blue-500"
                        name="tgla" id="tgla" required>
                </div>
                <div class="mb-4 px-6">
                    <label for="tgle" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai</label>
                    <input type="date"
                        class="w-80 px-4 py-2  border rounded-md focus:outline-none focus:border-blue-500"
                        name="tgle" id="tgle" required>
                </div>

                <div class="flex items-center px-6 pb-0.5">
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded-md focus:outline-none hover:bg-blue-700">Kirim
                        Pesanan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
