<?php

namespace App\Http\Controllers;

use App\Pasta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pastas = Pasta::all();
        return view('pasta.index', compact('pastas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'src' => 'required|url',
                'title' => 'required|min:5',
                'type' => ['required', Rule::in(['corte', 'cortissime', 'lunghe'])],
                'cooking_time' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
                'description' => 'required|min:20'
            ]
        );

        $data = $request->all();

        $pasta = new Pasta();

        /*$pasta->src = $data['src'];
        $pasta->title = $data['title'];
        $pasta->type = $data['type'];
        $pasta->cooking_time = $data['cooking_time'];
        $pasta->weight = $data['weight'];
        $pasta->description = $data['description'];
        */

        $pasta->fill($data);

        $pasta->save();

//        return redirect()->route('pasta.show', ['pastum' => $pasta->id]);

        return redirect()->route('pasta.index')->with('status', 'Pasta creata!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pastum) //tecnica con dependency injection
    {

        //select * from pastas where id = X
        //$pastum = Pasta::find($id);

        //if ($pastum) {

            return view('pasta.show', compact('pastum'));

        //} else {
        //    abort(404);
        //}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id) //senza dependency injection
    {
        $pasta = Pasta::find($id);

        if ($pasta) {
            return view('pasta.edit', compact('pasta'));
        } else {
            abort(404);
        }

    }*/

    public function edit(Pasta $pastum) {
        return view('pasta.edit', compact('pastum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasta $pastum)
    {

        $request->validate(
            [
                'src' => 'required|url',
                'title' => 'required|min:5',
                'type' => ['required', Rule::in(['corte', 'cortissime', 'lunghe'])],
                'cooking_time' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
                'description' => 'required|min:20'
            ],
            ['src.required' => 'Url non può essere vuoto!']
        );

        $data = $request->all();

        /*$pastum->src = $data['src'];
        $pastum->title = $data['title'];
        $pastum->type = $data['type'];
        $pastum->cooking_time = $data['cooking_time'];
        $pastum->weight = $data['weight'];
        $pastum->description = $data['description'];
        */

        $pastum->update($data);

        $pastum->save();

        return redirect()->route('pasta.show', ['pastum' => $pastum->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pastum)
    {

        $pastum->delete();

        return redirect()->route('pasta.index')->with('status', 'Elemento correttamente cancellato!');

    }


}
