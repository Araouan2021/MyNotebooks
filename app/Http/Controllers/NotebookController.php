<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notebook;

class NotebookController extends Controller
{
    public function index()
    {
        return Notebook::all();
    }
 
    public function show(Notebook $notebook)
    {
        return $notebook;
    }

    public function store(Request $request)
    {
        $notebook = Notebook::create($request->all());

        return response()->json($notebook, 201);
    }

    public function update(Request $request, Notebook $notebook)
    {
        $notebook->update($request->all());

        return response()->json($notebook, 200);
    }

    public function delete(Notebook $notebook)
    {
        $notebook->delete();

        return response()->json(null, 204);
    }
}
