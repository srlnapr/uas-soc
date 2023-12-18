{{-- @dd($disease); --}}
{{-- @dd($user); --}}

@extends('layouts.app')

@section('content')
  <section class="pt-28 pb-24 lg:pt-36 lg:pb-32">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full self-center px-4 lg:w-1/2">
          <h1 class="text-base font-medium text-primary md:text-xl">
            Selamat Datang
            <p class="mt-1 block text-4xl font-bold text-secondary lg:text-5xl">Deteksi <span class="text-primary">Dimas</span>
            </p>
          </h1>
          <h2 class="mb-2 mt-2 text-lg font-light text-primary lg:text-2xl">  Web mendiagnosa penyakit rabies pada anjing
            .</h2>
          <div class="mb-2 flex items-center">
            <h2 class="mb-1 text-lg font-light text-primary lg:text-2xl">Kamu bisa &ZeroWidthSpace;</h2>
            <h2 class="typewrite"></h2>
          </div>
          <p class="mb-3 max-w-md text-slate-500">
            "Jauhkan aku dari rabies."
            <span class="mt-1 block text-secondary">- Anjing.</span>
          </p>
          <div class="flex flex-col md:flex-row">
            <button
              class="btnn mb-5 rounded-sm border-2 border-black bg-black py-3 px-8 text-white duration-300 ease-out hover:bg-white hover:text-black focus:outline-none focus:ring focus:ring-blue-500 lg:mb-8">
              <a href="#definition">Apa itu rabies?</a>
            </button>
            <button
              class="btnn mb-5 rounded-sm border-2 border-black bg-black py-3 px-8 text-white duration-300 ease-out hover:bg-white hover:text-black focus:outline-none focus:ring focus:ring-blue-500 md:ml-10 lg:mb-8">
              <a href="/diagnose">Diagnosa sekarang</a>
            </button>
          </div>
          @if (auth()->user() == null)
            <p class="mb-3 max-w-md text-slate-500">
              Untuk mendapatkan <span class="font-bold text-primary">Dashboard</span> kamu harus <a href="/login"
                class="font-bold text-secondary">Login.</a>
            </p>
          @elseif (auth()->user() !== null && auth()->user()->is_admin == 1)
            <p class="mb-3 max-w-md text-slate-500">
              Selamat Datang Kembali <span class="font-bold uppercase text-primary">{{ auth()->user()->name }}</span>. Pergi ke <a
                href="/adminDashboard" class="font-bold capitalize text-secondary">{{ auth()->user()->name }}'s
                Dashboard</a>.
            </p>
          @elseif (auth()->user() !== null)
            <p class="mb-3 max-w-md text-slate-500">
              Selamat Datang Kembali  <span class="font-bold uppercase text-primary">{{ auth()->user()->name }}</span>. Pergi ke <a
                href="/dashboard" class="font-bold capitalize text-secondary">{{ auth()->user()->name }}'s dashboard</a>.
            </p>
          @endif
          @include('components.userInfo')
        </div>
        <div class="bayangan hidden w-full self-center rounded-sm border-2 border-primary bg-white px-4 md:block lg:w-1/2">
    {{-- Responsive Image --}}
    <img src="https://lh3.googleusercontent.com/u/0/drive-viewer/AK7aPaDl8AlKiFLrwV9dHtTx4it-6PJ6Z1Zot8a_riL3WiADZ45hk1jWML5WSGPAJhU8HoTmN3KCs5w2QfYfyILEMi72TPoqaw=w2560-h1285" alt="Rasya Image" style="max-width: 100%; height: auto;" class="mx-auto">
</div>


      </div>
    </div>
  </section>
  <section id="definition" class="bg-[#f2f6fc] pb-16 pt-32 lg:pb-20">
    <div class="container">
      <div class="w-full px-4">
        <div class="mb-5">
          <h4 class="mb-2 text-lg font-semibold text-secondary">Apa itu</h4>
          <div class="flex justify-between">
            <div>
              <h2 class="mt-1 mb-4 text-4xl font-bold text-primary lg:text-5xl">Rabies ?</h2>
              <p class="text-md font-mono font-medium text-slate-500 lg:text-lg">
               Penyakit yang sering terjadi <span class="text-secondary">Pada anjing</span>
              </p>
            </div>
            <button type="button"
              class="btnn my-5 mx-3 rounded-sm border-2 border-black bg-black py-3 px-5 text-white duration-300 ease-out hover:bg-white hover:text-black">
              <a href="#prevent">Cara Mencegah</a>
            </button>
          </div>
        </div>
        <p class="text-justify text-lg font-light text-primary">Rabies pada anjing adalah kondisi kesehatan yang disebabkan oleh virus rabies yang dapat
           memengaruhi sistem saraf hewan tersebut. Virus ini biasanya ditularkan melalui gigitan hewan yang terinfeksi, seperti anjing atau hewan liar lainnya.
           <br></br>

           Virus rabies menyerang sistem saraf pusat anjing, menyebabkan perubahan perilaku, agresi, dan gejala neurologis lainnya. 
           Gejala awal mungkin termasuk kegelisahan, penurunan nafsu makan, dan perubahan suara.<br></br>

           Penting untuk menjaga keamanan dan kesehatan anjing dengan memberikan vaksin rabies yang teratur. Vaksinasi ini tidak hanya melindungi anjing
            dari penyakit tersebut, tetapi juga mencegah penularan rabies kepada manusia, karena rabies dapat ditularkan dari hewan ke manusia melalui gigitan atau luka terbuka.
        <p>
      </div>
      <div class="container">
      <div class="mt-10 grid grid-cols-3">
    @for ($i = 1; $i < count($disease); $i++)
        <button id="warna{{ $i }}" class="mb-0 rounded-sm border-2 py-3 px-3 text-white"
                style="background-color:
                    @if ($disease[$i]['type'] == 'Merah') red
                    @elseif ($disease[$i]['type'] == 'Kuning') yellow
                    @elseif ($disease[$i]['type'] == 'Hijau') green
                    @endif"
                onclick="changeType({{ $i }})">
            <p class="text-xs md:text-base">{{ $disease[$i]['type'] }}</p>
        </button>
    @endfor
</div>



      </div>
      <div id="typee"></div>
    </div>
  </section>
  <section id="prevent" class="pt-16">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="bayangan hidden w-full self-center rounded-sm border-2 border-primary bg-white p-4 md:block lg:w-1/4">
          {{-- Lottie --}}
          {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> --}}
          <lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_hz2bzpsx.json" background="transparent"
            speed="1" style="width: 300px; height: 300px;" loop autoplay class="mx-auto"></lottie-player>
        </div>
        <div class="w-full self-center pl-8 pr-4 lg:w-3/4">
          <div class="w-full px-4">
            <div class="mb-5 max-w-xl">
              <h4 class="mb-2 text-lg font-semibold text-secondary">Bagaimana Cara Mencegah</h4>
              <h2 class="mt-1 mb-4 text-4xl font-bold text-primary lg:text-5xl">Rabies pada anjing?</h2>
            </div>
            {{-- FlowBite Accordion --}}
            <div id="accordion-collapse" data-accordion="collapse">
              <h2 id="accordion-collapse-heading-1">
                <button type="button"
                  class="flex w-full items-center justify-between rounded-t-md border border-b-0 border-secondary p-5 text-left font-medium text-gray-500 hover:bg-slate-100 focus:ring-2 focus:ring-secondary"
                  data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                  aria-controls="accordion-collapse-body-1">
                  <span>Vaksinasi Hewan Peliharaan</span>
                  <svg data-accordion-icon class="h-6 w-6 shrink-0 rotate-180" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="border border-b-0 border-slate-500 p-5">
                  <p class="mb-2 text-gray-500">Pastikan anjing Anda mendapatkan vaksinasi rabies secara rutin sesuai dengan jadwal 
                    yang ditentukan oleh dokter hewan. Vaksinasi adalah langkah pencegahan utama untuk melindungi anjing dari virus rabies.</p>
              
                </div>
              </div>

              <h2 id="accordion-collapse-heading-2">
                <button type="button"
                  class="flex w-full items-center justify-between border border-b-0 border-secondary p-5 text-left font-medium text-gray-500 hover:bg-slate-100 focus:ring-2 focus:ring-secondary"
                  data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                  aria-controls="accordion-collapse-body-2">
                  <span>Kontrol Hewan Liar</span>
                  <svg data-accordion-icon class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="border border-b-0 border-slate-500 p-5">
                  <p class="mb-2 text-gray-500">Hindari kontak langsung dengan hewan liar, terutama yang terinfeksi rabies. Jangan memelihara atau memberi makan hewan liar di sekitar rumah.
                </div>
              </div>

              <h2 id="accordion-collapse-heading-3">
                <button type="button"
                  class="flex w-full items-center justify-between border border-b-0 border-secondary p-5 text-left font-medium text-gray-500 hover:bg-slate-100 focus:ring-2 focus:ring-secondary"
                  data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                  aria-controls="accordion-collapse-body-3">
                  <span>Pantau Perilaku Hewan Peliharaan</span>
                  <svg data-accordion-icon class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="border border-b-0 border-slate-500 p-5">
                  <p class="mb-2 text-gray-500">Perhatikan perubahan perilaku pada hewan peliharaan Anda. Jika ada tanda-tanda
                     aneh seperti agresi yang tidak biasa, kurangnya koordinasi, atau perubahan lainnya, segera konsultasikan dengan dokter hewan.</span>.
                  </p>
                </div>
              </div>

              <h2 id="accordion-collapse-heading-4">
                <button type="button"
                  class="flex w-full items-center justify-between border border-b-0 border-secondary p-5 text-left font-medium text-gray-500 hover:bg-slate-100 focus:ring-2 focus:ring-secondary"
                  data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                  aria-controls="accordion-collapse-body-4">
                  <span>Pantau Gigitan atau Luka</span>
                  <svg data-accordion-icon class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                <div class="border border-b-0 border-slate-500 p-5">
                  <p class="mb-2 text-gray-500">Jika anjing mengalami gigitan atau luka, bersihkan dengan hati-hati menggunakan sabun dan air. Segera hubungi dokter hewan untuk mendapatkan perawatan lebih lanjut dan evaluasi risiko rabies.
                  </p>
                
                </div>
              </div>

              <h2 id="accordion-collapse-heading-5">
                <button type="button"
                  class="flex w-full items-center justify-between border border-b-0 border-secondary p-5 text-left font-medium text-gray-500 hover:bg-slate-100 focus:ring-2 focus:ring-secondary"
                  data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                  aria-controls="accordion-collapse-body-5">
                  <span>Kebersihan Lingkungan

                  </span>
                  <svg data-accordion-icon class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                <div class="border border-b-0 border-slate-500 p-5">
                  <p class="mb-2 text-gray-500">Pastikan lingkungan tempat anjing tinggal bersih dan aman. Kebersihan kandang, tempat makan, dan air minum dapat membantu mencegah penyebaran penyakit.
                  </p>
                </div>
              </div>

              <h2 id="accordion-collapse-heading-6">
                <button type="button"
                  class="flex w-full items-center justify-between border border-b-0 border-secondary p-5 text-left font-medium text-gray-500 hover:bg-slate-100 focus:ring-2 focus:ring-secondary"
                  data-accordion-target="#accordion-collapse-body-6" aria-expanded="false"
                  aria-controls="accordion-collapse-body-6">
                  <span>Edukasi Masyarakat</span>
                  <svg data-accordion-icon class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-6" class="hidden" aria-labelledby="accordion-collapse-heading-6">
                <div class="border border-b-0 border-slate-500 p-5">
                  <p class="mb-2 text-gray-500">Sosialisasikan informasi tentang rabies kepada masyarakat di sekitar Anda. Edukasi publik tentang bahaya rabies, pentingnya vaksinasi, dan tindakan pencegahan dapat membantu menciptakan lingkungan yang lebih aman.
                  </p>
                 
                </div>
              </div>

              <h2 id="accordion-collapse-heading-7">
                <button type="button"
                  class="flex w-full items-center justify-between border border-secondary p-5 text-left font-medium text-gray-500 hover:bg-slate-100 focus:ring-2 focus:ring-secondary"
                  data-accordion-target="#accordion-collapse-body-7" aria-expanded="false"
                  aria-controls="accordion-collapse-body-7">
                  <span>Konsultasi dengan Dokter Hewan</span>
                  <svg data-accordion-icon class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </h2>
              <div id="accordion-collapse-body-7" class="hidden" aria-labelledby="accordion-collapse-heading-7">
                <div class="border border-t-0 border-slate-500 p-5">
                  <p class="mb-2 text-gray-500"> Secara teratur berkonsultasi dengan dokter
                     hewan untuk memastikan kesehatan anjing Anda. Dokter hewan dapat memberikan saran dan informasi terkini mengenai vaksinasi serta memberikan pemeriksaan kesehatan secara menyeluruh.
                  </p>
                 
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    const diseases = @json($disease);
    const typee = document.getElementById('typee');

    const changeType = (id) => {
      typee.innerHTML = "";

      typee.innerHTML += `
        <div class="container mt-5">
          <div class="w-full rounded-sm border border-[#BBBBBB] bg-white p-3">
            <div class="m-3">
              <p class="font-base mb-3 text-lg text-primary lg:text-2xl">${diseases[id].diseases}</p>
              <p class="text-justify text-lg font-light text-primary">${diseases[id].description}</p>
            </div>
            <button class="btnnn m-3 rounded-sm border-2 border-black bg-black py-2 px-5 text-white duration-300 ease-out hover:bg-white hover:text-black">
            <a href="/diseases/${diseases[id].id}">Detail ${diseases[id].diseases}</a>
          </button>
          </div>
        </div>
      `;
    }

    // typeWrite
    const typeWriterEffect = () => {
      const words = ["Mendiagnosa.", "Riwayat diagnosis.", "Melihat Vaksin.", "Penanganan rabies."];
      let wordCount = 0;
      let letterCount = 0;

      let currentText = "";
      let currentWord = "";

      let timeOut = 200;

      let isDeleting = false;

      const type = () => {
        if (wordCount === words.length) {
          wordCount = 0;
        }
        currentWord = words[wordCount];
        if (isDeleting) {
          currentText = currentWord.slice(0, --letterCount);
        } else {
          currentText = currentWord.slice(0, ++letterCount);
        }

        document.querySelector(".typewrite").textContent = currentText;
        timeOut = isDeleting ? 100 : 200;

        if (!isDeleting && currentText.length === currentWord.length) {
          timeOut = 800;
          isDeleting = true;
        } else if (isDeleting && currentText.length === 0) {
          timeOut = 800;
          isDeleting = false;
          wordCount++;
        }

        setTimeout(type, timeOut);
      };
      type();
    };
    typeWriterEffect();
  </script>
@endsection
