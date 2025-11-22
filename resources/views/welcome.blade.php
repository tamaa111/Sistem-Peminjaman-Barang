<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Peminjaman Barang</title>
    <link rel="icon" href="{{ asset('logoLending.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        @keyframes rotate-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-rotate-slow {
            animation: rotate-slow 3s linear infinite;
        }

        @keyframes move {
            50% {
                transform: translateY(-1rem);
            }
        }

        .animate-movingY {
            animation: move 3s linear infinite;
        }

        @keyframes scaleUp {
            0% {
                transform: scale(0.8);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(0.8);
            }
        }

        .animate-scalingUp {
            animation: scaleUp 3s linear infinite;
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="font-[poppins]">
    {{-- Navbar --}}
    <nav class="bg-white fixed w-full z-20 top-0 start-0">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('logoLending.png') }}" class="h-8" alt="Logo">
                <span class="text-lg/5 font-medium">Peminjaman<br>Barang</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{ route('login') }}"
                    class="text-white bg-indigo-500 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-600 font-medium leading-5 rounded-lg text-base px-5 py-3 focus:outline-none">Login</a>
            </div>
            <div class="items-center justify-between flex w-auto order-1 -ms-12" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-default rounded-base bg-neutral-secondary-soft md:space-x-2 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-neutral-primary">
                    <li>
                        <a href="#fitur"
                            class="block text-gray-500 py-1 px-6 rounded-full border-2 border-indigo-100 hover:border-indigo-500 transition">Fitur</a>
                    </li>
                    <li>
                        <a href="#cara-kerja"
                            class="block text-gray-500 py-1 px-6 rounded-full border-2 border-indigo-100 hover:border-indigo-500 transition">Cara
                            Kerja</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="h-[768px] max-w-7xl mx-auto relative">
        <img src="{{ asset('images/decor4.png') }}" class="absolute top-30 left-50 rotate-12 animate-movingY"
            data-aos="fade-up" data-aos-duration="1000">
        <img src="{{ asset('images/decor1.png') }}" class="absolute bottom-60 left-40 animate-scalingUp"
            data-aos="fade-up" data-aos-duration="1000">
        <img src="{{ asset('images/decor2.png') }}" class="absolute top-40 right-50 animate-rotate-slow"
            data-aos="fade-up" data-aos-duration="1000">
        <img src="{{ asset('images/decor3.png') }}" class="absolute bottom-70 right-40 -rotate-12 animate-movingY"
            data-aos="fade-up" data-aos-duration="1000">
        <div class="h-full flex
            flex-col justify-center items-center text-center px-4">
            <div class="flex flex-col justify-center items-center">
                <h1 class="max-w-2xl text-7xl font-semibold pb-2" data-aos="fade-up" data-aos-duration="1000">
                    <span
                        class="bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 bg-clip-text text-transparent relative">
                        <img src="{{ asset('images/line1.png') }}" class=" absolute -bottom-8 -left-0 opacity-50">
                        Pinjam</span>
                    Barang Sesuai Kebutuhan <span
                        class="bg-gradient-to-r from-yellow-300 to-yellow-400 bg-clip-text text-transparent relative">
                        Kapan
                        <img src="{{ asset('images/line2.png') }}" class=" absolute -bottom-8 -left-0 opacity-50">
                    </span>
                    Saja
                </h1>
                <p class="mt-6 mb-2
                    text-lg text-heading max-w-3xl mx-auto" data-aos="fade-up"
                    data-aos-duration="1500">Platform sederhana untuk
                    meminjam, mengelola, dan
                    mengembalikan barang dengan cepat.</p>
                <a href="{{ route('login') }}"
                    class="inline-block px-6 py-3 bg-indigo-500 text-white font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-4"
                    data-aos="fade-up" data-aos-duration="2000">Mulai
                    Sekarang</a>
            </div>
        </div>
    </section>

    {{-- Fitur Section --}}
    <section id="fitur">
        <div class="py-30 bg-neutral-secondary-soft">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-semibold text-center mb-16">Fitur Unggulan Aplikasi</h2>
                <div class="grid grid-cols-3 gap-12">
                    {{-- Card 1 --}}
                    <div class="bg-indigo-100 p-6 rounded-[40px] relative overflow-hidden" data-aos="fade-up"
                        data-aos-duration="1000">
                        <div class="text-indigo-600 absolute -right-15 -top-15 opacity-40">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                    d="M21.984 10c-.037-1.311-.161-2.147-.581-2.86c-.598-1.015-1.674-1.58-3.825-2.708l-2-1.05C13.822 2.461 12.944 2 12 2s-1.822.46-3.578 1.382l-2 1.05C4.271 5.56 3.195 6.125 2.597 7.14C2 8.154 2 9.417 2 11.942v.117c0 2.524 0 3.787.597 4.801c.598 1.015 1.674 1.58 3.825 2.709l2 1.049C10.178 21.539 11.056 22 12 22s1.822-.46 3.578-1.382l2-1.05c2.151-1.129 3.227-1.693 3.825-2.708c.42-.713.544-1.549.581-2.86M21 7.5l-4 2M12 12L3 7.5m9 4.5v9.5m0-9.5l4.5-2.25l.5-.25m0 0V13m0-3.5l-9.5-5" />
                            </svg>
                        </div>
                        <div
                            class="mb-12 bg-white/50 text-indigo-600 rounded-full flex items-center justify-center w-16 h-16">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.578 4.432l-2-1.05C13.822 2.461 12.944 2 12 2s-1.822.46-3.578 1.382l-.321.169l8.923 5.099l4.016-2.01c-.646-.732-1.688-1.279-3.462-2.21m4.17 3.534l-3.998 2V13a.75.75 0 0 1-1.5 0v-2.286l-3.5 1.75v9.44c.718-.179 1.535-.607 2.828-1.286l2-1.05c2.151-1.129 3.227-1.693 3.825-2.708c.597-1.014.597-2.277.597-4.8v-.117c0-1.893 0-3.076-.252-3.978M11.25 21.904v-9.44l-8.998-4.5C2 8.866 2 10.05 2 11.941v.117c0 2.525 0 3.788.597 4.802c.598 1.015 1.674 1.58 3.825 2.709l2 1.049c1.293.679 2.11 1.107 2.828 1.286M2.96 6.641l9.04 4.52l3.411-1.705l-8.886-5.078l-.103.054c-1.773.93-2.816 1.477-3.462 2.21" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-medium mb-4 text-heading">Daftar <br> Barang Lengkap</h3>
                        <p class="">Lihat ketersediaan barang secara real time</p>
                    </div>
                    {{-- Card 2 --}}
                    <div class="bg-indigo-500 p-6 rounded-[40px] relative overflow-hidden" data-aos="fade-up"
                        data-aos-duration="1500">
                        <div class="text-white absolute -right-15 -top-15 opacity-40">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" viewBox="0 0 24 24">
                                <g fill="none">
                                    <path fill="currentColor"
                                        d="m10.15 8.802l-.442.606zM12 3.106l-.508.552a.75.75 0 0 0 1.015 0zm1.85 5.696l.442.606zM12 9.676v.75zm-1.408-1.48c-.69-.503-1.427-1.115-1.983-1.76c-.574-.665-.859-1.254-.859-1.721h-1.5c0 1.017.578 1.954 1.223 2.701c.663.768 1.501 1.457 2.235 1.992zM7.75 4.715c0-1.059.52-1.663 1.146-1.873c.652-.22 1.624-.078 2.596.816l1.015-1.104C11.23 1.38 9.704.988 8.418 1.42C7.105 1.862 6.25 3.096 6.25 4.715zm6.542 4.693c.734-.534 1.572-1.224 2.235-1.992c.645-.747 1.223-1.684 1.223-2.701h-1.5c0 .467-.284 1.056-.859 1.721c-.556.645-1.292 1.257-1.982 1.76zm3.458-4.693c0-1.619-.855-2.853-2.167-3.295c-1.286-.432-2.813-.04-4.09 1.134l1.015 1.104c.972-.894 1.945-1.036 2.597-.816c.625.21 1.145.814 1.145 1.873zM9.708 9.408c.755.55 1.354 1.018 2.292 1.018v-1.5c-.365 0-.565-.115-1.408-.73zm3.7-1.212c-.843.615-1.043.73-1.408.73v1.5c.938 0 1.537-.467 2.292-1.018z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                        d="M5 20.388h2.26c1.01 0 2.033.106 3.016.308a14.9 14.9 0 0 0 5.33.118c.868-.14 1.72-.355 2.492-.727c.696-.337 1.549-.81 2.122-1.341c.572-.53 1.168-1.397 1.59-2.075c.364-.582.188-1.295-.386-1.728a1.89 1.89 0 0 0-2.22 0l-1.807 1.365c-.7.53-1.465 1.017-2.376 1.162q-.165.026-.345.047m0 0l-.11.012m.11-.012a1 1 0 0 0 .427-.24a1.49 1.49 0 0 0 .126-2.134a1.9 1.9 0 0 0-.45-.367c-2.797-1.669-7.15-.398-9.779 1.467m9.676 1.274a.5.5 0 0 1-.11.012m0 0a9.3 9.3 0 0 1-1.814.004" />
                                    <rect width="3" height="8" x="2" y="14" stroke="currentColor"
                                        stroke-width="1.5" rx="1.5" />
                                </g>
                            </svg>
                        </div>
                        <div
                            class="mb-12 bg-white/30 text-white rounded-full flex items-center justify-center w-16 h-16">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M7 4.83c0 1.547 1.726 3.178 3.15 4.26c.799.606 1.198.91 1.85.91s1.051-.304 1.85-.91C15.274 8.007 17 6.376 17 4.83c0-2.79-2.75-3.833-5-1.677C9.75.997 7 2.039 7 4.829m-.74 16.559H6c-.943 0-1.414 0-1.707-.293C4 20.804 4 20.332 4 19.389v-1.112c0-.518 0-.777.133-1.009s.334-.348.736-.582c2.646-1.539 6.403-2.405 8.91-.91q.253.151.45.368a1.49 1.49 0 0 1-.126 2.134a1 1 0 0 1-.427.24q.18-.021.345-.047c.911-.145 1.676-.633 2.376-1.162l1.808-1.365a1.89 1.89 0 0 1 2.22 0c.573.433.749 1.146.386 1.728c-.423.678-1.019 1.545-1.591 2.075s-1.426 1.004-2.122 1.34c-.772.373-1.624.587-2.491.728c-1.758.284-3.59.24-5.33-.118a15 15 0 0 0-3.017-.308" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-medium mb-4 text-heading text-white">Peminjaman <br> Mudah</h3>
                        <p class="text-white">Ajukan peminjaman hanya beberapa klik</p>
                    </div>
                    {{-- Card 3 --}}
                    <div class="bg-yellow-300 p-6 rounded-[40px] relative overflow-hidden" data-aos="fade-up"
                        data-aos-duration="2000">
                        <div class="text-yellow-500 absolute -right-15 -top-15 opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path
                                        d="M16 4.002c2.175.012 3.353.109 4.121.877C21 5.758 21 7.172 21 10v6c0 2.829 0 4.243-.879 5.122C19.243 22 17.828 22 15 22H9c-2.828 0-4.243 0-5.121-.878C3 20.242 3 18.829 3 16v-6c0-2.828 0-4.242.879-5.121c.768-.768 1.946-.865 4.121-.877" />
                                    <path stroke-linecap="round"
                                        d="M10.5 14H17M7 14h.5M7 10.5h.5m-.5 7h.5m3-7H17m-6.5 7H17" />
                                    <path
                                        d="M8 3.5A1.5 1.5 0 0 1 9.5 2h5A1.5 1.5 0 0 1 16 3.5v1A1.5 1.5 0 0 1 14.5 6h-5A1.5 1.5 0 0 1 8 4.5z" />
                                </g>
                            </svg>
                        </div>
                        <div
                            class="mb-12 bg-white/50 text-yellow-500 rounded-full flex items-center justify-center w-16 h-16">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M9.5 2A1.5 1.5 0 0 0 8 3.5v1A1.5 1.5 0 0 0 9.5 6h5A1.5 1.5 0 0 0 16 4.5v-1A1.5 1.5 0 0 0 14.5 2z" />
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M6.5 4.037c-1.258.07-2.052.27-2.621.84C3 5.756 3 7.17 3 9.998v6c0 2.829 0 4.243.879 5.122c.878.878 2.293.878 5.121.878h6c2.828 0 4.243 0 5.121-.878c.879-.88.879-2.293.879-5.122v-6c0-2.828 0-4.242-.879-5.121c-.569-.57-1.363-.77-2.621-.84V4.5a3 3 0 0 1-3 3h-5a3 3 0 0 1-3-3zM7 9.75a.75.75 0 0 0 0 1.5h.5a.75.75 0 0 0 0-1.5zm3.5 0a.75.75 0 0 0 0 1.5H17a.75.75 0 0 0 0-1.5zM7 13.25a.75.75 0 0 0 0 1.5h.5a.75.75 0 0 0 0-1.5zm3.5 0a.75.75 0 0 0 0 1.5H17a.75.75 0 0 0 0-1.5zM7 16.75a.75.75 0 0 0 0 1.5h.5a.75.75 0 0 0 0-1.5zm3.5 0a.75.75 0 0 0 0 1.5H17a.75.75 0 0 0 0-1.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-medium mb-4 text-heading">Riwayat <br> Peminjaman</h3>
                        <p class="">Pantau aktivitas peminjaman yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cara Kerja Section --}}
    <section id="cara-kerja">
        <div class="py-30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-semibold text-center mb-16">Alur Peminjaman Barang</h2>
                <div class="space-y-4 max-w-7xl mx-auto">
                    <div class="grid grid-cols-9 grid-rows-1 gap-4">
                        {{-- Card 1 --}}
                        <div data-aos="fade-up" data-aos-duration="1000"
                            class="col-span-5 p-4 rounded-[40px] bg-indigo-50 border-1 border-indigo-200 flex justify-between items-center">
                            <div class="flex flex-col justify-between h-full">
                                <p
                                    class="w-12 h-12 text-xl font-semibold rounded-full bg-indigo-100 text-indigo-500 flex justify-center items-center">
                                    1
                                </p>
                                <div class="pb-2">
                                    <h3 class="text-xl font-semibold mb-2 text-heading">Jelajahi Daftar Barang</h3>
                                    <p class="text-heading">Telusuri katalog barang yang <br> tersedia untuk dipinjam.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('images/ilu1.png') }}">
                            </div>
                        </div>
                        {{-- Card 2 --}}
                        <div data-aos="fade-up" data-aos-duration="1500"
                            class="col-span-4 p-4 rounded-[40px] bg-yellow-50 border-1 border-yellow-200 flex justify-between items-center">
                            <div class="flex flex-col justify-between h-full">
                                <p
                                    class="w-12 h-12 text-xl font-semibold rounded-full bg-yellow-100 text-yellow-500 flex justify-center items-center">
                                    2
                                </p>
                                <div class="pb-2">
                                    <h3 class="text-xl font-semibold mb-2 text-heading">Ajukan Peminjaman</h3>
                                    <p class="text-heading">Pilih barang yang diinginkan<br> dan ajukan permohonan<br>
                                        peminjaman.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('images/ilu2.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-9 grid-rows-1 gap-4">
                        {{-- Card 3 --}}
                        <div data-aos="fade-up" data-aos-duration="2000"
                            class="col-span-4 p-4 rounded-[40px] bg-yellow-50 border-1 border-yellow-200 flex justify-between items-center">
                            <div class="flex flex-col justify-between h-full">
                                <p
                                    class="w-12 h-12 text-xl font-semibold rounded-full bg-yellow-100 text-yellow-500 flex justify-center items-center">
                                    3
                                </p>
                                <div class="pb-2">
                                    <h3 class="text-xl font-semibold mb-2 text-heading">Konfirmasi dan<br> Ambil Barang
                                    </h3>
                                    <p class="text-heading">Setelah disetujui, ambil<br> barang sesuai jadwal yang
                                        ditentukan.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('images/ilu3.png') }}">
                            </div>
                        </div>
                        {{-- Card 4 --}}
                        <div data-aos="fade-up" data-aos-duration="2500"
                            class="col-span-5 p-4 rounded-[40px] bg-indigo-50 border-1 border-indigo-200 flex justify-between items-center">
                            <div class="flex flex-col justify-between h-full">
                                <p
                                    class="w-12 h-12 text-xl font-semibold rounded-full bg-indigo-100 text-indigo-500 flex justify-center items-center">
                                    4
                                </p>
                                <div class="pb-2">
                                    <h3 class="text-xl font-semibold mb-2 text-heading">Kembalikan Tepat Waktu</h3>
                                    <p class="text-heading">Pastikan untuk mengembalikan barang<br> sesuai waktu yang
                                        telah
                                        disepakati.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('images/ilu4.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4">
        <div class="bg-indigo-500 py-6 mt-16 rounded-3xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-white">Vendy Paulus Pratama (3124640054) & Farhan Abdurrahman Zain (3125640016)
                </p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
