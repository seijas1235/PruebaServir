<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentEditRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
{
    public function index(){
        return view('departments.index');
    }
    public function getJson(){
        $result = Department::all();
        $api_Result['data'] = $result;

        return Response::json( $api_Result );
    }

    public function newDepartment(){

        return view('departments.newDepartment');
    }

    public function saveDepartment(Request $request){
        $request->validate([
            'code'=>'required|unique:departments',
            'name'=>'required'
        ]);
        $data=$request->all();
        $department= Department::create($data);
        return redirect()->route('department.show', $department->id)->with('success', 'Departamento creado correctamente');

    }

    public function showDepartment(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function updateDepartment(DepartmentEditRequest $request, Department $department)
    {
        $data = $request->only('name', 'code', 'description');


        $department->update($data);

        return redirect()->route('department.show', $department->id)->with('success', 'Departamento actualizado correctamente');
    }

    public function deleteDepartment(Department $department)
    {
        $department->delete();
        return Response::json(['success' => 'Éxito']);
    }
}
