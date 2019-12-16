<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotebookController extends Controller
{
    public function index()
    {
        return Notebook::all();
    }
 
    public function show($id)
    {
        return Notebook::find($id);
    }

    public function store(Request $request)
    {
        return Notebook::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->update($request->all());

        return $notebook;
    }

    public function delete(Request $request, $id)
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->delete();

        return 204;
    }
}
