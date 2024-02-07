<!-- Section -->
<div class="bg-base min-h-screen flex items-center">
    <div class="container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-32">
        @if (isset($Error))
            <p class="bg-error border border-error text-error-content px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $Error }}</span>
            </p>
        @else
            <!-- Card -->
            <div class="flex flex-col rounded-lg shadow-sm overflow-hidden bg-base-300">
                <!-- Card Header -->
                <div class="py-8 px-5 lg:px-6 w-full text-base-content text-3xl sm:text-5xl text-center">
                    <h3 class="font-medium">
                        GeoIP Information
                    </h3>
                </div>
                <!-- END Card Header -->

                <!-- Card Body -->
                <div class="p-5 lg:p-6 grow w-full text-base-content">
                    @if (isset($data))
                        @if ($data['IP'] != 'Unknown')
                            <div
                                class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                <span class="font-medium text-xl tracking-wider">IP Address: </span> <span
                                    class="font-light tracking-wider text-lg">{{ $data['IP'] }}</span>
                            </div>
                        @endif
                        @if ($data['ASN'] != 'Unknown')
                            <div
                                class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                <span class="font-medium text-xl tracking-wider">ASN: </span> <span
                                    class="font-light tracking-wider text-lg">{{ $data['ASN']['organization'] }}
                                    ({{ $data['ASN']['number'] }})</span>
                            </div>
                        @endif
                        @if ($data['city']['name'] != 'Unknown')
                            <div
                                class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                <span class="font-medium text-xl tracking-wider">City: </span> <span
                                    class="font-light tracking-wider text-lg">{{ $data['city']['name'] }}</span>
                            </div>
                        @endif
                        @if ($data['city']['postal'] != 'Unknown')
                            <div
                                class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                <span class="font-medium text-xl tracking-wider">Postal Code: </span> <span
                                    class="font-light tracking-wider text-lg">{{ $data['postal']['code'] }}</span>
                            </div>
                        @endif
                        @if ($data['country']['name'] != 'Unknown' || $data['country']['iso_code'] != 'Unknown')
                            <div
                                class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                <span class="font-medium text-xl tracking-wider">Country: </span>
                                <span class="font-light tracking-wider text-lg">{{ $data['country']['name'] }}
                                </span>
                                <span>
                                    <img class="w-6 h-6 align-middle inline-block ml-2 pb-1"
                                        src="{{ asset('storage/flags/4x3/' . strtolower($data['country']['ISO']) . '.svg') }}"
                                        alt="{{ $data['country']['ISO'] }}">
                                </span>
                            </div>
                        @endif
                        @if ($data['continent']['name'] != 'Unknown' || $data['continent']['code'] != 'Unknown')
                            <div
                                class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                <span class="font-medium text-xl tracking-wider">Continent: </span> <span
                                    class="font-light tracking-wider text-lg">{{ $data['continent']['name'] }} (
                                    {{ $data['continent']['code'] }} ) </span>
                            </div>
                        @endif
                        @if ($data['city']['location']['latitude'] != 'Unknown' || $data['city']['location']['longitude'] != 'Unknown')
                            <div
                                class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                <span class="font-medium text-xl tracking-wider">Latitude: </span> <span
                                    class="font-light tracking-wider text-lg">{{ $data['city']['location']['latitude'] }}</span>
                            </div>

                            <div
                                class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                                <span class="font-medium text-xl tracking-wider">Longitude: </span> <span
                                    class="font-light tracking-wider text-lg">{{ $data['city']['location']['longitude'] }}</span>
                            </div>
                        @endif
                    @endif
                    {{-- <div
                        class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                        <span class="font-medium text-xl tracking-wider">Currency: </span>
                        <span class="font-light tracking-wider text-lg">Dollar <span
                                class="font-medium">($)</span></span>
                    </div>
                    <div
                        class="bg-background text-tertiary py-3 px-5 m-3 rounded-lg sm:text-left text-center border border-secondary">
                        <span class="font-medium text-xl tracking-wider">Language: </span>
                        <span class="font-light tracking-wider text-lg">English US</span>
                    </div> --}}
                </div>
                <!-- END Card Body -->
            </div>
            <!-- END Card -->
        @endif
    </div>
</div>
<!-- END Section -->
