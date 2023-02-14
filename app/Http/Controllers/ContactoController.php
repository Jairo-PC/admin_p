<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Http\Controllers\storage;
use Illuminate\Http\Request;

/**
 * Class ContactoController
 * @package App\Http\Controllers
 */
class ContactoController extends Controller
{
    
    public function index()
    {
        $contactos = Contacto::paginate();

        return view('contacto.index', compact('contactos'))
            ->with('i', (request()->input('page', 1) - 1) * $contactos->perPage());
    }

    
    public function create()
    {
        $contacto = new Contacto();
        return view('contacto.create', compact('contacto'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Contacto::$rules);

        $contacto = Contacto::create($request->all());

        $contacto->imagen = $request->file(key: "imagen")->store(path:'portadas',options:'public');

        return redirect()->route('contactos.index')
            ->with('success', 'Registro exitoso.');
    }

    
    public function show($id)
    {
        $contacto = Contacto::find($id);

        return view('contacto.show', compact('contacto'));
    }

    
    public function edit($id)
    {
        $contacto = Contacto::find($id);

        return view('contacto.edit', compact('contacto'));
    }

    
    public function update(Request $request, Contacto $contacto)
    {
        request()->validate(Contacto::$rules);

        $contacto->update($request->all());

        if($request->hasFile('imagen')) {
            
            $contacto->imagen = $request->file(key: "imagen")->store(path:'portadas',options:'public');
        }
        return redirect()->route('contactos.index')
            ->with('success', 'Registro actualizado exitosamente');
        
    }

    
    public function destroy($id)
    {
        $contacto = Contacto::find($id)->delete();

        return redirect()->route('contactos.index')
            ->with('success', 'Registro eliminado exitosamente');
    }
}
