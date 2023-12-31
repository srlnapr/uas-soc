<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite('resources/css/app.css')

  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />
  <title>Dear</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body>
  @include('components.navbar')

  @if (session()->has('success'))
    <div
      class="sticky left-1/2 top-20 z-20 flex min-h-[50px] w-[300px] -translate-x-1/2 justify-between gap-x-4 bg-secondary px-5 pt-3.5 pb-4 text-white">
      <p>{{ session('success') }}</p>
      <button class="h-fit hover:text-white/75" onclick="this.parentNode.parentNode.removeChild(this.parentNode)">
        X
      </button>
    </div>
  @elseif(session()->has('error'))
    <div
      class="sticky left-1/2 top-20 z-20 flex min-h-[50px] w-[300px] -translate-x-1/2 justify-between gap-x-4 bg-red-500 px-5 pt-3.5 pb-4 text-white">
      <p>{{ session('error') }}</p>
      <button class="h-fit hover:text-white/75" onclick="this.parentNode.parentNode.removeChild(this.parentNode)">
        X
      </button>
    </div>
  @endif
  <main>
    <section class="pt-28 pb-16 lg:pt-36">
      <div class="container">
        <div class="flex flex-col lg:flex-row">
          <div class="w-full self-center px-4">
            <h1 class="text-base font-medium text-primary md:text-xl">
              Selamat Datang
              <p class="mt-1 block text-4xl font-bold text-secondary lg:text-5xl">De<span
                  class="text-primary">ar</span>.
              </p>
            </h1>
            <h2 class="mb-3 mt-2 text-lg font-light text-primary lg:text-2xl">Dashboard. <span
                class="font-bold">Admin</span>
            </h2>
          </div>

          <div class="grid w-full grid-cols-4 gap-1 self-center px-4">
            <div class="rounded-[4px] border border-sky-500 bg-sky-200 p-3 text-center">
              <h1 class="text-4xl font-bold text-primary lg:text-5xl">
                {{ count($symptomsInfo) }}
              </h1>
              <p class="font-base text-base text-primary lg:text-xl">
                Gejala
              </p>
            </div>
            <div class="rounded-[4px] border border-pink-500 bg-pink-200 p-3 text-center">
              <h1 class="text-4xl font-bold text-primary lg:text-5xl">
                {{ count($diseasesInfo) - 1 }}
              </h1>
              <p class="font-base text-base text-primary lg:text-xl">
              Penyakit
              </p>
            </div>
            <div class="rounded-[4px] border border-green-500 bg-green-200 p-3 text-center">
              <h1 class="text-4xl font-bold text-primary lg:text-5xl">
                {{ count($medicinesInfo) }}
              </h1>
              <p class="font-base text-base text-primary lg:text-xl">
              Vaksin
              </p>
            </div>
            <div class="rounded-[4px] border border-indigo-500 bg-indigo-200 p-3 text-center">
              <h1 class="text-4xl font-bold text-primary lg:text-5xl">
                {{ count($usersInfo) }}
              </h1>
              <p class="font-base text-base text-primary lg:text-xl">
                Pengguna
              </p>
            </div>
          </div>
        </div>

        <div class="w-full self-center px-4">
          <h1 class="text-2xl font-bold text-primary lg:text-3xl">
          </h1>
          <div class="mt-8">
            <div
              class="bayangan_field mx-auto mb-8 grid grid-cols-5 divide-x-2 border-2 border-primary bg-white p-3 py-4">
              <div
                class="font-base flex items-center justify-center font-bold text-lg text-secondary hover:text-primary md:text-xl">
                <a href="/symptoms">
                 Gejala
                </a>
              </div>
              <div
                class="font-base flex items-center justify-center font-bold text-lg text-secondary hover:text-primary md:text-xl">
                <a href="/diseases">
                  Penyakit
                </a>
              </div>
              <div
                class="font-base flex items-center justify-center font-bold text-lg text-secondary hover:text-primary md:text-xl">
                <a href="/medicines">
                Vaksin
                </a>
              </div>
              <div
                class="font-base flex items-center justify-center font-bold text-lg text-secondary hover:text-primary md:text-xl">
                <a href="/rules">
                  Aturan
                </a>
              </div>
              <div
                class="font-base flex items-center justify-center font-bold text-lg text-secondary hover:text-primary md:text-xl">
                <a href="/users">
                  Pengguna
                </a>
              </div>
            </div>

            @yield('content')

          </div>
        </div>
      </div>
    </section>
  </main>

  @include('components.footer')
  <script src="js/script.js"></script>
</body>

</html>
