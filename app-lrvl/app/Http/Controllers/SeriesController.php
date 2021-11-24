<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;
use App\Models\Serie;
use Illuminate\Http\Response;

class SeriesController extends Controller
{
    public function index(): Response
    {
        return response(Serie::all(), Response::HTTP_OK);
    }

    public function store(StoreSerieRequest $request): Response
    {
        $serieCadastrada = Serie::create($request->all());
        return response($serieCadastrada, Response::HTTP_CREATED);
    }

    public function show(int $id): Response
    {
       $serie = Serie::findOrFail($id);
       return response($serie, Response::HTTP_OK);
    }

    public function update(UpdateSerieRequest $request, int $id): Response
    {
        $serie = Serie::find($id);
<<<<<<< HEAD
        $serie->nome = $request['nome'];
        $serie->status = $request['status'];
        $serie->categoria = $request['categoria'];
        $serie->streaming = $request['streaming'];
=======
        
            $serie->nome = $request['nome'];
            $serie->status = $request['status'];
            $serie->categoria = $request['categoria'];
            $serie->streaming = $request['streaming'];

>>>>>>> d656a7348b2dd98c5e6fea0dfbf038a852afc7a7
        $serie->update();

        return response('No Content', Response::HTTP_NO_CONTENT);
    }

    public function status(int $id): Response
    {
        $serie = Serie::find($id);
        if ($serie->status === 'não-assistido') {
            $serie->status = 'assistido';
        } else {
            $serie->status = 'não-assistido';
        }
        $serie->save();

        return response('No Content', Response::HTTP_NO_CONTENT);
    }

    public function destroy(int $id): Response
    {
        Serie::destroy($id);
        return response('OK', Response::HTTP_OK);
    }
}