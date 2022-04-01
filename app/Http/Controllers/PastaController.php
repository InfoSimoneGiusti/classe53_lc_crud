<?php

namespace App\Http\Controllers;

use App\Pasta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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

        $data = $request->all();

        $pasta = new Pasta();
        
        /*$pasta->src = $data['src'];
        $pasta->title = $data['title'];
        $pasta->type = $data['type'];
        $pasta->cooking_time = $data['cooking_time'];
        $pasta->weight = $data['weight'];
        $pasta->description = $data['description'];*/

        $pasta->fill($data);

        $pasta->save();

        return redirect()->route('pasta.show', ['pastum' => $pasta->id]);

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
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
