@extends('pages.adminDashboard')

@section('content')
  <div class="w-full lg:mx-auto">
    <div class="w-full">
      <div class="w-full rounded-sm border border-[#BBBBBB] bg-white p-3">
        <div class="flex items-center justify-between px-4">
          <h1 class="font-base mx-3 mt-3 mb-5 text-lg text-slate-800 lg:text-2xl">Tabel Aturan</h1>
          <button type="button"
            class="my-2 mx-3 rounded-sm border-2 border-black bg-black py-3 px-5 text-white duration-300 ease-out hover:bg-white hover:text-black md:my-4">
            <a href="#list">List Gejala</a>
          </button>
        </div>
        @if (count($diseaseRelations))
          <div class="table-container overflow-x-auto">
            <table class="responsive-table mb-3 w-full rounded-xl border text-slate-800">
              <thead class="text-slate-700">
                <tr>
                  <th class="border bg-slate-50 px-6 py-3">
                    No
                  </th>
                  <th class="border bg-slate-50 px-6 py-3">
                    Penyakit
                  </th>
                  @foreach ($symptomsInfo as $symptom)
                    <th class="border bg-slate-50 py-3">
                      {{ $symptom['symptoms_code'] }}
                    </th>
                  @endforeach
                  <th class="border bg-slate-50 px-6 py-3">
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($diseaseRelations as $disease)
                  <tr class="px-6 py-3 text-center">
                    <td class="border px-6 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-6 py-2">{{ $disease['name'] }}</td>
                    @foreach ($disease['rules'] as $rule)
                      <td class="content-start border py-2">{{ $rule ? '✓' : '-' }}</td>
                    @endforeach
                    <td class="content-start border px-6 py-2">
                      <a class="mx-2 text-yellow-400" href="/rules/{{ $disease['id'] }}/edit">
                        Edit
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <h1 class="mt-2 mb-4 border p-3 text-center text-lg font-light text-primary lg:text-2xl">There is no Rules.
          </h1>
        @endif
      </div>

      <h2 id="list" class="font-md mb-3 pt-24 text-lg text-secondary lg:text-2xl">List Gejala
      </h2>
      <div class="mt-2 w-full rounded-sm border border-[#BBBBBB] bg-white p-3">
        @if (count($symptomsInfo))
          <div class="table-container overflow-x-auto">
            <table class="responsive-table mb-3 w-full rounded-xl border text-slate-800">
              <thead class="text-slate-700">
                <tr>
                  <th class="border bg-slate-50 px-6 py-3">
                    No
                  </th>
                  <th class="border bg-slate-50 px-6 py-3">
                    Kode Gejala
                  </th>
                  <th class="border bg-slate-50 px-6 py-3">
                    Gejala
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($symptomsInfo as $symptom)
                  <tr class="px-6 py-3 text-center">
                    <td class="border px-6 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-6 py-2">{{ $symptom['symptoms_code'] }}</td>
                    <td class="border px-6 py-2 text-justify">{{ $symptom['symptoms'] }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <h1 class="mt-2 mb-4 border p-3 text-center text-lg font-light text-primary lg:text-2xl">There is no Symptoms.
          </h1>
        @endif
      </div>
    </div>
  </div>

  <!-- Additional CSS for responsiveness -->
  <style>
    @media (max-width: 768px) {
      .responsive-table {
        width: 100%;
        overflow-x: auto;
        display: block;
      }

      .responsive-table th,
      .responsive-table td {
        white-space: nowrap;
      }
    }
  </style>
@endsection
