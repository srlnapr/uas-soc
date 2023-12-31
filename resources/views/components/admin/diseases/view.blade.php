{{-- @dd($solutions); --}}

@extends('pages.adminDashboard')

@section('content')
  <button
    class="btnnn mb-3 rounded-sm border-2 border-black bg-black py-3 px-5 text-white duration-300 ease-out hover:bg-white hover:text-black">
    <a href="/diseases/create">Tambah Penyakit</a>
  </button>
  <button
    class="btnnn mb-3 rounded-sm border-2 border-black bg-black py-3 px-5 text-white duration-300 ease-out hover:bg-white hover:text-black">
    <a href="/diseases/printData">Print Data</a>
  </button>
  <div class="w-full lg:mx-auto">
    <div class="mb-10 w-full">
      <div class="w-full rounded-sm border border-[#BBBBBB] bg-white p-3">
        <div class="flex items-center justify-between px-4">
          <h1 class="font-base mx-3 mt-3 mb-5 text-lg text-slate-800 lg:text-2xl">Tabel Penyakit</h1>
          <form action="/diseases" method="get">
            <div class="w-full self-center">
              <div class="flex">
                <input type="text" id="search" name="search" placeholder="search for diseases"
                  class="my-2 w-full rounded-sm border-2 border-[#030723] bg-white p-3 focus:outline-none focus:ring focus:ring-blue-500 md:my-4" />
                <button type="submit"
                  class="my-2 mx-3 rounded-sm border-2 border-black bg-black py-3 px-5 text-white duration-300 ease-out hover:bg-white hover:text-black md:my-4">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        @if ($diseases->count())
          <table class="mb-3 w-full rounded-xl text-slate-800">
            <thead class="text-slate-700">
              <tr>
                <th class="border bg-slate-50 px-6 py-3">
                  No
                </th>
                <th class="border bg-slate-50 px-6 py-3">
                  Kode Penyakit
                </th>
                <th class="border bg-slate-50 px-6 py-3">
                  Penyakit
                </th>
                <th class="border bg-slate-50 px-6 py-3">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($diseases as $disease)
                <tr class="px-6 py-3 text-center">
                  <td class="border px-6 py-2">{{ $loop->iteration }}</td>
                  <td class="border px-6 py-2">{{ $disease['diseases_code'] }}</td>
                  <td class="border px-6 py-2 text-justify">{{ $disease['diseases'] }}</td>
                  <td class="flex justify-center border px-6 py-2">
                    <a class="mx-2 text-blue-400" href="/diseases/{{ $disease['id'] }}">
                      View
                    </a>
                    <a class="mx-2 text-yellow-400" href="/diseases/{{ $disease['id'] }}/edit">
                      Edit
                    </a>
                    <form class="mx-2 text-red-400" action="/diseases/{{ $disease['id'] }}" method="post"
                      class="d-inline">
                      @method('delete')
                      @csrf
                      <button onClick="return confirm('Are you sure?')">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          @else
            <h1 class="mt-2 mb-4 border p-3 text-center text-lg font-light text-primary lg:text-2xl">There is no Diseases.
            </h1>
        @endif
        </table>
        {{ $diseases->links() }}
      </div>
    </div>
  </div>

  {{-- solutions --}}
  <button
    class="btnnn mb-3 rounded-sm border-2 border-black bg-black py-3 px-5 text-white duration-300 ease-out hover:bg-white hover:text-black">
    <a href="/solutions/create">Tambah Solusi</a>
  </button>
  <div class="w-full lg:mx-auto">
    <div class="mb-10 w-full">
      <div class="w-full rounded-sm border border-[#BBBBBB] bg-white p-3">
        <div class="flex items-center justify-between px-4">
          <h1 class="font-base mx-3 mt-3 mb-5 text-lg text-slate-800 lg:text-2xl">Solutions Table</h1>
          <form action="/diseases" method="get">
            <div class="w-full self-center">
              <div class="flex">
                <input type="text" id="searchSol" name="searchSol" placeholder="search for solutions"
                  class="my-2 w-full rounded-sm border-2 border-[#030723] bg-white p-3 focus:outline-none focus:ring focus:ring-blue-500 md:my-4" />
                <button type="submit"
                  class="my-2 mx-3 rounded-sm border-2 border-black bg-black py-3 px-5 text-white duration-300 ease-out hover:bg-white hover:text-black md:my-4">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        @if ($solutions->count())
          <table class="mb-3 w-full rounded-xl text-slate-800">
            <thead class="text-slate-700">
              <tr>
                <th class="border bg-slate-50 px-6 py-3">
                  No
                </th>
                <th class="border bg-slate-50 px-6 py-3">
                Penyakit
                </th>
                <th class="border bg-slate-50 px-6 py-3">
                  Solusi
                </th>
                <th class="border bg-slate-50 px-6 py-3">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($solutions as $solution)
                <tr class="px-6 py-3 text-center">
                  <td class="border px-6 py-2">{{ $loop->iteration }}</td>
                  @foreach ($diseases as $disease)
                    @if ($disease['id'] == $solution['disease_id'])
                      <td class="border px-6 py-2">{{ $disease['diseases'] }}</td>
                    @endif
                  @endforeach
                  <td class="border px-6 py-2 text-justify">{{ $solution['solution'] }}</td>
                  <td class="flex justify-center border px-6 py-2">
                    <a class="mx-2 text-yellow-400" href="/solutions/{{ $solution['id'] }}/edit">
                      Edit
                    </a>
                    <form class="mx-2 text-red-400" action="/solutions/{{ $solution['id'] }}" method="post"
                      class="d-inline">
                      @method('delete')
                      @csrf
                      <button onClick="return confirm('Are you sure?')">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          @else
            <h1 class="mt-2 mb-4 border p-3 text-center text-lg font-light text-primary lg:text-2xl">There is no
              Solutions.
            </h1>
        @endif
        </table>
        {{ $diseases->links() }}
      </div>
    </div>
  </div>
@endsection
