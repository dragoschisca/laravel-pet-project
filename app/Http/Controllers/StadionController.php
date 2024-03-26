<?php

namespace App\Http\Controllers;

use App\Models\Stadion;
use Illuminate\Http\Request;
use DB;

class StadionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stadions = DB::table('stadions')->paginate(10);
        return view('ShowStadion', ['stadions' => $stadions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddStadion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Stadion = new Stadion;
        $Stadion->Nume = $request->Nume;
        $Stadion->Adresa = $request->Adresa;
        $Stadion->Capacitate = $request->Capacitate;
        $Stadion->Echipa = $request->Echipa;
    
    
        $Stadion->save();
        return redirect('stadion');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ShowStadion');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stadions = DB::table('stadions')->select('*')->where('id', '=', $id)->get();
        return view('EditStadion', ['stadions' => $stadions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('stadions')->where('id', $id)->update([
            "Nume" => $request->Nume,
            "Adresa" => $request->Adresa,
            "Capacitate" => $request->Capacitate,
            "Echipa" => $request->Echipa,

        ]);
        return redirect('stadion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('stadions')->where('id', '=', $id)->delete();
        return redirect('stadion');
    }

    public function sort(Request $request)
    {
        $criteria = $request->input('criteria');

        $stadionQuery = Stadion::query();
    
        if ($criteria == 'nume') {
            $stadionQuery = $stadionQuery->orderBy('nume');
        } else if ($criteria == 'capacitate') {
            $stadionQuery = $stadionQuery->orderBy('capacitate');
        } 

        $stadions = $stadionQuery->paginate(10);
    
        return view('ShowStadion', ['stadions' => $stadions]);
    }
    public function groupByAllStadion()
{
    $stadionsByCountry = Stadion::select(DB::raw('SUBSTRING_INDEX(Adresa, ",", -1) as Tara'), DB::raw('count(*) as count'))->groupBy('Tara')->get();

    $smallStadions = Stadion::where('Capacitate', '<=', 20000)->get();
    $mediumStadions = Stadion::whereBetween('Capacitate', [20001, 50000])->get();
    $largeStadions = Stadion::where('Capacitate', '>=', 50001)->get();

    return view('groupByAllStadion', compact('stadionsByCountry', 'smallStadions', 'mediumStadions', 'largeStadions'));
}

}
