<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeEditRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index');
    }


    public function getJson(){
        $result  = Employee::with('department')->get();
        $api_Result['data'] = $result;

        return Response::json( $api_Result );
    }

    public function newEmployee(){
        $departments=Department::get();
        return view('employees.newEmployee', compact('departments'));
    }

    public function saveEmployee(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'department_id'=>'required'
        ]);
        $data=$request->all();
        $employee= Employee::create($data);
        return redirect()->route('employee.show', $employee->id)->with('success', 'Empleado creado correctamente');

    }

    public function showEmployee(Employee $employee)
    {
        $departments=Department::get();
        return view('employees.show', compact('employee','departments'));
    }

    public function updateEmployee(EmployeeEditRequest $request, Employee $employee)
    {
        $data = $request->all();
        $employee->update($data);

        return redirect()->route('employee.show', $employee->id)->with('success', 'Empleado actualizado correctamente');
    }

    public function deleteEmployee(Employee $employee)
    {
        $employee->delete();
        return Response::json(['success' => 'Éxito']);

    }

}
