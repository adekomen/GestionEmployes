<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Employer::query();
        $departments = Department::all();

        // Recherche d'employé par nom, email et position
        if($search = $request->search){
            $query->where('name', 'LIKE', '%'. $search . '%')
                ->orWhere('email', 'LIKE', '%'. $search . '%')
                ->orWhere('position', 'LIKE', '%'. $search . '%');
        }

        // Filtrer par département
        if ($request->has('department_id') && !empty($request->input('department_id')))
        {
            $query->where('department_id', $request->input('department_id'));
        }

        // Pagination
        $employers = $query->paginate(8);
        return view('employer.index', compact('employers', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('employer.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            
            'name' => 'required | string | min:3',
            'email' => 'required | email|unique:employers,email',
            'position' => 'required'
        ];
        $validateData = $request->validate($rules);
        $employer = new Employer();
        $employer->name = $request->input('name');
        $employer->email = $request->input('email');
        $employer->position = $request->input('position');
        $employer->department_id = $request->input('department_id');
        $employer->save();

        return redirect()->route('employer.index')->with('status', "Employé ajouté.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        $departments = Department::all();
        return view('employer.edit', compact('employer', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employer = Employer::findOrFail($id);
        $employer->name = $request->input('name');
        $employer->email = $request->input('email');
        $employer->position = $request->input('position');
        $employer->department_id = $request->input('department_id');
        $employer->update();

        return redirect()->route('employer.index')->with('status', "Employé modifié.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employer = Employer::findOrFail($id);
        $employer->delete();

        return redirect()->route('employer.index')->with('status', "L'employé a bien été supprimé.");
    }
}
