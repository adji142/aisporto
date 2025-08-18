<section id="contact" class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-20 relative overflow-hidden text-white">
    <div class="container mx-auto px-6 lg:px-16">
        <div class="grid lg:grid-cols-2 gap-10">
            {{-- Informasi Kontak --}}
            <div>
                <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
                <p class="mb-6 opacity-90">
                    Kami siap membantu Anda. Silakan hubungi kami melalui informasi berikut:
                </p>

                <ul class="space-y-5">
                    @if ($siteSetting->contact_phone)
                        <li class="flex items-start">
                            {{-- Phone icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.684l1.518 4.554a1 1 0 01-.272 1.024l-2.21 2.21a16.001 16.001 0 006.586 6.586l2.21-2.21a1 1 0 011.024-.272l4.554 1.518A1 1 0 0121 17.72V21a2 2 0 01-2 2h-1C9.163 23 1 14.837 1 5V4a2 2 0 012-2h0z" />
                            </svg>
                            <div>
                                <p class="font-semibold">Telepon</p>
                                <p class="opacity-90">{{ $siteSetting->contact_phone }}</p>
                            </div>
                        </li>
                    @endif

                    @if ($siteSetting->contact_email)
                        <li class="flex items-start">
                            {{-- Email icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12l-4-4-4 4m0 0l4 4 4-4m-4-4v12" />
                            </svg>
                            <div>
                                <p class="font-semibold">Email</p>
                                <p class="opacity-90">{{ $siteSetting->contact_email }}</p>
                            </div>
                        </li>
                    @endif

                    @if ($siteSetting->contact_address)
                        <li class="flex items-start">
                            {{-- Map Pin icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.341A8 8 0 104.572 15.34a16.001 16.001 0 0114.856.001z" />
                            </svg>
                            <div>
                                <p class="font-semibold">Alamat</p>
                                <p class="opacity-90">{{ $siteSetting->contact_address }}</p>
                            </div>
                        </li>
                    @endif

                    @if ($siteSetting->contact_hours)
                        <li class="flex items-start">
                            {{-- Clock icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="font-semibold">Jam Operasional</p>
                                <p class="opacity-90">{{ $siteSetting->contact_hours }}</p>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            {{-- Google Maps Embed --}}
            <div>
                @if ($siteSetting->map_embed)
                    <div class="rounded-lg overflow-hidden shadow-lg border border-white/20">
                        {!! $siteSetting->map_embed !!}
                    </div>
                @else
                    <div class="bg-white/10 flex items-center justify-center h-64 rounded-lg text-white/70">
                        Peta belum tersedia
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
