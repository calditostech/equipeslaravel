<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::all();
        return view('equipes.index', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nome' => 'required|max:255',
            'idade' => 'required',
            'posicao' => 'required',
            'equipe' => 'required',
            'gols' => 'required',
            'assistencia' => 'required'
        ]);

        $show = Equipe::create($validateData);
        return redirect('/equipes')->with('sucesso', 'Jogador Adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipes = Equipe::findOrFail($id);
        return view('equipes.show', compact('equipes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipes = Equipe::findOrFail($id);
        return view('equipes.edit', compact('equipes'));
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
        $validateData = $request->validate([
           'nome' => 'required|max:255',
           'idade' => 'required',
           'posicao' => 'required',
           'equipe' => 'required',
           'gols' => 'required',
           'assistencia' => 'required'
        ]);
        Equipe::whereId($id->update($validateData));
        return redirect('/equipes')->with('sucesso', 'Dados atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipes = Equipe::findOrFail($id);
        $equipe->delete();
        return redirect('/equipes')->with('sucesso', 'Dados de corona removido com sucesso');
    }
}
