<footer class="mt-16 border-t-2 border-black bg-primary pt-24 pb-5">
  <div class="container">
    <div class="flex flex-wrap">
      <div class="mb-12 w-full flex-col place-items-center font-medium md:flex md:w-1/3">
        <ul>
          <h2 class="mb-5 text-4xl font-bold text-white selection:bg-blue-500 selection:text-blue-100">De<span
              class="text-secondary">ar</span>.</h2>
          <h3 class="mb-2 text-2xl font-bold text-white selection:bg-blue-500 selection:text-blue-100">Founder
          </h3>
          <p class="text-slate-400 selection:bg-blue-500 selection:text-blue-100">Kelompok</p>
          <p class="text-slate-400 selection:bg-blue-500 selection:text-blue-100">SOC</p>
          <p class="text-slate-400 selection:bg-blue-500 selection:text-blue-100">Gyan, Villa, Dinda, Serlin</p>
        </ul>
      </div>
      <div class="mb-12 w-full flex-col place-items-center md:flex md:w-1/3">
        <ul class="text-slate-400">
          <h3 class="mb-5 text-xl font-semibold text-white selection:bg-blue-500 selection:text-blue-100">Shortcuts</h3>
          <li>
            <a href="/"
              class="mb-2 inline-block text-base selection:bg-blue-500 selection:text-blue-100 hover:text-blue-500">
              Home
            </a>
          </li>
          <li>
            <a href="/diagnose"
              class="mb-2 inline-block text-base selection:bg-blue-500 selection:text-blue-100 hover:text-blue-500">
              Diagnose
            </a>
          </li>
          <li>
            <a href="/medicinesPage"
              class="mb-2 inline-block text-base selection:bg-blue-500 selection:text-blue-100 hover:text-blue-500">
              Medicines
            </a>
          </li>
          @if (auth()->user() !== null)
            <li>
              <a href="/dashboard"
                class="mb-2 inline-block text-base selection:bg-blue-500 selection:text-blue-100 hover:text-blue-500">
                Dashboard
              </a>
            </li>
          @endif

          @if (auth()->user() !== null && auth()->user()->is_admin == 1)
            <li>
              <a href="/adminDashboard"
                class="mb-2 inline-block text-base selection:bg-blue-500 selection:text-blue-100 hover:text-blue-500">
                Admin Dashboard
              </a>
            </li>
          @endif
        </ul>
      </div>
      <div class="mb-12 w-full flex-col place-items-center md:flex md:w-1/3">
        <ul class="text-slate-400">
          <h3 class="mb-5 text-xl font-semibold text-white selection:bg-blue-500 selection:text-blue-100">About</h3>
          <li>
            <a href="/about"
              class="mb-2 inline-block text-base selection:bg-blue-500 selection:text-blue-100 hover:text-blue-500">
              Dear
            </a>
            <p class="text-slate-400 selection:bg-blue-500 selection:text-blue-100">Gyan, Villa, Dinda, Serlin</p>

          </li>
          <li>
         
          </li>
        </ul>
      </div>
    </div>

    <div class="w-full">
      <p class="text-center text-sm font-medium text-slate-400">Copyright © 2023</p>
    </div>
  </div>
</footer>
