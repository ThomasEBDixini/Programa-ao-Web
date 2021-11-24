<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TemporadasController extends Controller
{
    public function index(): Response
    {
        return response(Temporada::all(), Response::HTTP_OK);
    }

    public function store(Request $request): Response
    {
        /** @todo criação da regra para salvar 1 temporada */
        $temporadaCadastrada = Temporada::update($request->all());
        return response('', Response::HTTP_CREATED);
    }

    public function show(int $id): Response
    {
        /** @todo buscar a temporada e retornar seus dados */
        $temporada = Temporada::findOrFail($id);
        return response($temporada, Response::HTTP_OK);
    }

    public function update(UpdateSerieRequest $request, int $id): Response
    {
        /** @todo atualização de temporada */
        $serie = Temporada::find($id);
        $serie->temporada = $request['temporada'];
        $serie->update();
        return response('No Content', Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        /** @todo exclusão de temporada */
        Temporada::destroy($id);
        return response('OK', Response::HTTP_OK);
    }
}
