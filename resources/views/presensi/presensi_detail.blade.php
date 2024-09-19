<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Data Presensi') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut eos officia placeat veritatis sapiente
            voluptatem, voluptate molestiae reprehenderit voluptas doloribus harum fugit blanditiis, cumque animi illo
            unde? Minima, ea magni!
        </p>
    </header>
    {{-- presensi table --}}
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Tanggal
                </th>
                <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Jam Masuk
                </th>
                <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Jam Keluar
                </th>
            </tr>
        </thead>
        <tbody class="  dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($presensi as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-gray-100">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-gray-100">
                            {{ \Carbon\Carbon::parse($item->jam_masuk)->format('H:i') }} WIB
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-gray-100">
                            {{ $item->jam_keluar ? \Carbon\Carbon::parse($item->jam_keluar)->format('H:i') : '-' }} WIB
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
</section>
