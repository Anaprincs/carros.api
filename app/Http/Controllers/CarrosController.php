<?php

namespace App\Http\Controllers;

use App\Service\CarroService;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    protected $carroService;
    public function __construct(CarroService $carroService)
    {
        $this->carroService=$carroService;
    }

    public function store (Request $request)
    {

        $user = $this->carroService->create($request->all());
        return response()->json($user);

    }

    public function index()
    {
        $result=$this->carroService->getAll();
        return response()->json($result);
    } 

    public function update(Request $request ){
        $result = $this->carroService->update($request->all());
        return response()->json($result);
    }

    public function delete($id)
    {
        $result = $this->carroService->delete($id);

        return response()->json($result);
    }

    public function findById($id)
    {
        $result = $this->carroService->findById($id);
        return response()->json($result);
    }

    public function searchByName(Request $request)
    {
        $result = $this->carroService->searchByName($request->nome);
        return response()->json($result);
    }
}
