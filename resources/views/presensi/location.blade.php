<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Location Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile location.") }}
        </p>

        <div class="row mt-2">
            <div class="col-12">
                @include('include.flash')
            </div>
        </div>
        @php
            // get acrbon today date
            $today = \Carbon\Carbon::today();
        @endphp
        @if (filled($presensi->where('tanggal', $today)->whereNull('jam_keluar')->first()))
            <div class="mt-4  text-gray-600 dark:text-gray-400">
                Anda belum melakukan presensi keluar hari ini.
            </div>
        @endif
        {{-- <button class="btn btn-outline-secondary" onclick="getLocation()">Cek Lokasi</button> --}}
    </header>

    <!-- Display the location information in this paragraph -->
    {{-- <div id="location" class="text-white">Your location will appear here</div> --}}
    {{-- <x-primary-button onclick="getLocation()">Cek Lokasi</x-primary-button> --}}
    {{-- <button type="button" onclick="getLocation()">Get Location</button> --}}

    <form method="post" action="{{ route('presensi.location', $user->id) }}" class="mt-6 space-y-6">
        @csrf

        <!-- Latitude -->
        <div>
            <x-input-label for="latitude" :value="__('Latitude')" />
            <x-text-input id="latitude" name="latitude" type="text" class="mt-1 block w-full" required readonly />
        </div>
        <!-- Longitude -->
        <div>
            <x-input-label for="longitude" :value="__('Longitude')" />
            <x-text-input id="longitude" name="longitude" type="text" class="mt-1 block w-full" required readonly />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button style="display: none;">{{ __('Submit') }}</x-primary-button>
            {{-- <button class="btn btn-outline-primary" type="submit">Submit</button> --}}
            {{-- <button class="btn btn-outline-secondary" onclick="getLocation()">Cek Lokasi</button> --}}
            <x-secondary-button onclick="getLocation()">Cek Lokasi</x-secondary-button>
        </div>
    </form>
</section>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            document.getElementById('location').textContent = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        // document.getElementById('location').textContent =
        //     "Latitude: " + position.coords.latitude +
        //     ", Longitude: " + position.coords.longitude;
        document.getElementById('latitude').value = position.coords.latitude;
        document.getElementById('longitude').value = position.coords.longitude;
        document.querySelector('button[type="submit"]').style.display = 'block';
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                document.getElementById('location').textContent = "User denied the request for Geolocation.";
                break;
            case error.POSITION_UNAVAILABLE:
                document.getElementById('location').textContent = "Location information is unavailable.";
                break;
            case error.TIMEOUT:
                document.getElementById('location').textContent = "The request to get user location timed out.";
                break;
            case error.UNKNOWN_ERROR:
                document.getElementById('location').textContent = "An unknown error occurred.";
                break;
        }
    }
</script>
