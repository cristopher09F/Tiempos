<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sorteo;

class SorteosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sorteos = Sorteo::query();
        if ($request->has('nombre') && $request->nombre) {
            $sorteos->where('nombre', $request->nombre);
        }

        if ($request->has('date') && $request->fecha) {
            $sorteos->where('date', $request->fecha);
        }

        if ($request->has('hour') && $request->hora) {
            $courses->where('hour', $request->hora);
        }
        return view('sorteos.index', ['sorteos' => $sorteos->orderBy('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('sorteos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sorteo::create($request->all());
        return redirect ('/sorteos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sorteo = Sorteo::find($id);
        return view('sorteos.show', ['sorteo' => $sorteo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sorteo = Sorteo::find($id);
        return view('sorteos.edit', ['sorteo' => $sorteo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sorteo = Sorteo::find($id);
        $sorteo->update($request->all());
        return redirect('/sorteos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sorteo::destroy($id);
        return redirect('/sorteos');
    }
}
