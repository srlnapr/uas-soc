<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Http\Requests\StoreDiseaseRequest;
use App\Http\Requests\UpdateDiseaseRequest;
use App\Models\Medicine;
use App\Models\Solution;
use App\Models\Symptom;
use App\Models\User;
use App\Models\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class DiseaseController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solutions = Solution::orderBy('disease_id');
        $diseases = Disease::orderBy('diseases_code');
        $diseasesInfo = Disease::all();
        $symptomsInfo = Symptom::all();
        $medicinesInfo = Medicine::all();
        $usersInfo = User::all();

        if (request('search')){
            $diseases->where('diseases', 'like', '%' . request('search') . '%');
        }

        if (request('searchSol')){
            $solutions->where('solution', 'like', '%' . request('searchSol') . '%');
        }

        return view('components.admin.diseases.view', [
            'diseases' => $diseases->paginate(10)->withQueryString(),
            'solutions' => $solutions->paginate(10)->withQueryString(),
            'diseasesInfo' => $diseasesInfo,
            'symptomsInfo' => $symptomsInfo,
            'medicinesInfo' => $medicinesInfo,
            'usersInfo' => $usersInfo
        ]);
    }
    public function printData()
    {
        $diseases = Disease::all(); // Assuming your model is named Disease, adjust accordingly
        $solutions = Solution::all(); // Assuming your model is named Solution, adjust accordingly
    
        $pdf = PDF::loadview('components.admin.diseases.printData', ['diseases' => $diseases, 'solutions' => $solutions]);
        return $pdf->stream('laporan-diseases-pdf.pdf');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $diseasesInfo = Disease::all();
        $symptomsInfo = Symptom::all();
        $medicinesInfo = Medicine::all();
        $usersInfo = User::all();

        return view('components.admin.diseases.add', [
            'diseasesInfo' => $diseasesInfo,
            'symptomsInfo' => $symptomsInfo,
            'medicinesInfo' => $medicinesInfo,
            'usersInfo' => $usersInfo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiseaseRequest $request)
    {
        $validatedData = $request->validate([
            'diseases_code' => 'required',
            'diseases' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);

        $validatedData['img'] = 'https://source.unsplash.com/bkc-m0iZ4Sk';

        $diseases = Disease::create($validatedData);
        $symptoms = Symptom::all();

        for($i = 0; $i < count($symptoms); $i++){
            Rule::create([
                'disease_id' => $diseases->id,
                'symptom_id' => $symptoms[$i]->id,
                'rule_value' => 0
            ]);
        }
        return redirect('/diseases')->with('success', 'Diseases was added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disease $disease)
    {
        $solutions = Solution::all();
        $medicines = Medicine::all();
        return view('pages.diseaseDetail', [
            'disease' => $disease,
            'solutions' => $solutions,
            'medicines' => $medicines
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disease $disease)
    {
        $diseasesInfo = Disease::all();
        $symptomsInfo = Symptom::all();
        $medicinesInfo = Medicine::all();
        $usersInfo = User::all();

        return view('components.admin.diseases.edit', [
            'disease' => $disease,
            'diseasesInfo' => $diseasesInfo,
            'symptomsInfo' => $symptomsInfo,
            'medicinesInfo' => $medicinesInfo,
            'usersInfo' => $usersInfo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiseaseRequest $request, Disease $disease)
    {
        $rules = [
            'diseases_code' => 'required',
            'diseases' => 'required',
            'type' => 'required',
            'description' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $disease->update($validatedData);
        return redirect('/diseases')->with('success', 'Diseases was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disease $disease)
    {
        Disease::destroy($disease['id']);
        return redirect('/diseases')->with('success', 'Diseases was deleted successfully');
    }
}