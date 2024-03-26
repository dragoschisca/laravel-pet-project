<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;
use DB;

class LigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ligas = DB::table('ligas')->paginate(10);
        return view('ShowLiga', ['ligas' => $ligas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddLiga');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Liga = new Liga;
        $Liga->Nume = $request->Nume;
        $Liga->Tara = $request->Tara;
        $Liga->Nr_Echipe = $request->Nr_Echipe;
        $Liga->Lider = $request->Lider;

        $Liga->save();
        return redirect('liga');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ShowLiga');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ligas = DB::table('ligas')->select('*')->where('id', '=', $id)->get();
        return view('EditLiga', ['ligas' => $ligas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('Ligas')->where('id', $id)->update([
            "Nume" => $request->Nume,
            "Tara" => $request->Tara,
            "Nr_Echipe" => $request->Nr_Echipe,
            "Lider" => $request->Lider,
        ]);
        return redirect('liga');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('Ligas')->where('id', '=', $id)->delete();
        return redirect('liga');
    }

    public function sort(Request $request)
    {
        $criteria = $request->input('criteria');
        
        $ligaQuery = Liga::query();

        if ($criteria == 'nume') {
            $ligaQuery = $ligaQuery->orderBy('nume');
        } else if ($criteria == 'nr_echipe') {
            $ligaQuery = $ligaQuery->orderBy('nr_echipe');
        } 

        $ligas = $ligaQuery->paginate(10);
    
        return view('ShowLiga', ['ligas' => $ligas]);
    }
    public function groupByAllLiga()
    {
    $ligasByCountry = Liga::select('Tara', DB::raw('count(*) as count'))->groupBy('Tara')->get();
    $ligasByNrTeams = Liga::select('Nr_Echipe', DB::raw('count(*) as count'))->groupBy('Nr_Echipe')->get();

    return view('groupByAllLiga', compact('ligasByCountry', 'ligasByNrTeams'));
    }

}
