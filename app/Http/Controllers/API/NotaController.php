<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Http\Resources\NotaResource;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Le ponemos paginate(20) para que nos devuelva 20 registros
        // por cada página (per_page).
        return NotaResource::collection(Nota::paginate(20));

    }

    public function notaMediaUsuario($materia_id) {

        $media = DB::table('notas')->where('materia_id', $materia_id)->avg('nota');

        return response()->json([
            'data' => $media
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {

        $this->authorize('create', Nota::class);
        
        $nota = json_decode($request->getContent(), true);

        $nota = Nota::create($nota);

        return new NotaResource($nota);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        return new NotaResource($nota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request, Nota $nota)
    {

        $this->authorize('update', $nota);

        $notaData = json_decode($request->getContent(), true);
        $nota->update($notaData);

        return new NotaResource($nota);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Nota $nota)
    {

        $this->authorize('delete', $nota);

        $nota->delete();
    }
}
