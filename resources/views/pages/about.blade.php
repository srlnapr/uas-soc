@extends('layouts.app')

@section('content')
  <section class="pt-28 pb-24 lg:pt-36 lg:pb-32">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full self-center px-4 lg:w-1/2">
          <h1 class="text-base font-medium text-primary md:text-xl">
              Apa itu
            <p class="mt-1 block text-4xl font-bold text-secondary lg:text-5xl">De<span class="text-primary">ar</span>?
            </p>
          </h1>
          <h2 class="mb-5 mt-2 text-lg font-light text-primary lg:text-2xl">Web sistem pakar diagnosis 
            rabies anjing.</h2>
          <p class="mb-5 max-w-md text-xl font-base">
            <span class="text-primary">Dear</span> adalah web <span 
              class="text-secondary">sistem pakar</span> untuk mendiagnosis penyakit rabies pada anjing
          </p>
          <p class="mb-5 max-w-md text-xl font-base"> Hasil diagnosis didapat dengan metode forward chaining 
          </p>
        </div>
        <div
          class="bayangan hidden w-full self-center rounded-sm border-2 border-primary bg-white px-4 md:block lg:w-1/2">
          {{-- Lottie --}}
          <img src="...pages\rasya1.jpeg" alt="Rasya Image" style="max-width: 100%; height: auto;" class="mx-auto">

        </div>
      </div>
    </div>
  </section>
@endsection
