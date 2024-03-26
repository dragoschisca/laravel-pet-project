<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Jucator;
use App\Models\Antrenor;
use App\Models\Stadion;
use App\Models\Liga;

use Illuminate\Http\Request;
use DB;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $antrenors = DB::table('antrenors')->get();
        $clubs = DB::table('clubs')->paginate(10);
        return view('ShowClub', ['clubs' => $clubs, 'antrenors' => $antrenors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $antrenors = DB::table('antrenors')->get();
        return view('AddClub',['antrenors' => $antrenors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $club = new Club;
        $club->Nume = $request->Nume;
        $club->Jucatori = $request->Jucatori;
        $club->Antrenor = $request->Antrenor;
        $club->Pret = $request->Pret;
        $club->Imagine = $request->file('Imagine')->getClientOriginalName(); 

        $club->save();
        return redirect('club');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ShowClub');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $antrenors = DB::table('antrenors')->get();
        $clubs = DB::table('clubs')->select('*')->where('id', '=', $id)->get();
        return view('EditClub', ['clubs' => $clubs, 'antrenors' => $antrenors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $club = Club::find($id);
        if (!$club) {
            return redirect('club');
        }
    
        $club->Nume = $request->input('Nume');
        $club->Jucatori = $request->input('Jucatori');
        $club->Antrenor = $request->input('Antrenor');
        $club->Pret = $request->input('Pret');
       
        if ($request->hasFile('Imagine')) { 
            $fileName = $request->file('Imagine')->getClientOriginalName();
            $request->file('Imagine')->storeAs('images', $fileName, 'public');
            $club->Imagine = $fileName;
        }
    
        $club->save();
    
        return redirect('club');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('clubs')->where('id', '=', $id)->delete();
        return redirect('club');
    }

    public function sort(Request $request)
    {
        $criteria = $request->input('criteria');

        $clubsQuery = Club::query();
    
        if ($criteria == 'nume') {
            $clubsQuery = $clubsQuery->orderBy('nume');
        } else if ($criteria == 'pret') {
            $clubsQuery = $clubsQuery->orderBy('pret');
        } 

        $clubs = $clubsQuery->paginate(10);
    
        return view('ShowClub', ['clubs' => $clubs]);
    }
    public function sumaClubs(Request $request)
    {
        $sum = DB::table('clubs')->sum('Pret');
        return view('sumaClub', ['sum' => $sum]);
    }
    
    public function infoClub(string $id)
    {
    $club = Club::find($id);


    $jucatori = Jucator::where('Club', $club->Nume)->get();
    $antrenor = Antrenor::where('Club', $club->Nume)->first();


    $stadion = Stadion::where('Echipa', $club->Nume)->first();

    $liga = Liga::where('Lider', $club->Nume)->first();
    $liderLiga = false;
    if ($liga && $liga->Lider == $club->Nume) {
        $liderLiga = true;
    }

    return view('infoClub', compact('club', 'jucatori', 'antrenor', 'stadion', 'liga', 'liderLiga'));
    }

}
