<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Traits\FunctionalTraits;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    use FunctionalTraits;

    public $successStatus = 200;
    public $errorStatus   = 401;

    public function index() {

        $pageTitle      = 'Students';
        $breadcrumbs    = 'Students';
        $browserTitle   = 'Students';
        $contentHeader  = 'Students';
        $tableData      = $this->getStudentsDataToTable();

        $parameters = compact(
            [
                'pageTitle', 'breadcrumbs','browserTitle', 'contentHeader', 'tableData'
            ]
        );
        return view('student.index', $parameters);
    }

    public function showAddStudent() {

        $pageTitle      = 'New Student';
        $breadcrumbs    = 'New Student';
        $browserTitle   = 'New Student';
        $contentHeader  = 'New Student';
        $teachers       = $this->getTeachers();


        $parameters = compact(
            [
                'pageTitle', 'breadcrumbs','browserTitle', 'contentHeader', 'teachers'
            ]
        );

        return view('student.add', $parameters);
    }

    public function storeStudent(Request $request) {

        $input  = $request->all();

        //Custom Validation Rules Traits
        $requestInputFields = ['name', 'age', 'gender', 'teacher'];
        $alertValues        = ['Student Name', 'Student Age', 'Student Gender', 'Teacher'];


        if($this->notSetRule($input, $requestInputFields, $alertValues )['status'] == 'error'){
            return back()->with(
                [
                    $this->notSetRule($input, $requestInputFields, $alertValues )['status']=>$this->notSetRule($input, $requestInputFields, $alertValues )['message']
                ]
            )->withInput();
        }


        if($this->emptyRules($input, $requestInputFields, $alertValues)['status'] == 'error'){
            return back()->with(
                [
                    $this->emptyRules($input, $requestInputFields, $alertValues )['status']=>$this->emptyRules($input, $requestInputFields, $alertValues )['message']
                ]
            )->withInput();
        }

        if(Students::create([
            'name'      => $input['name'],
            'age'       => $input['age'],
            'gender'    => $input['gender'],
            'teacher_id'=> $input['teacher']
        ]))
        {

            $response   =   [
                'status'    =>  'success',
                'message'   =>  $this->saveSuccess(),
            ];
            return back()->with([$response['status']=>$response['message']]);
        }


    }

    public function showEditStudent(Request $request) {

        $pageTitle      = 'Edit Student';
        $breadcrumbs    = 'Edit Student';
        $browserTitle   = 'Edit Student';
        $contentHeader  = 'Edit Student';
        $teachers       = $this->getTeachers();
        $studentData    = $this->getStudentBydId($request->get('id'));


        $parameters = compact(
            [
                'pageTitle', 'breadcrumbs','browserTitle', 'contentHeader', 'teachers', 'studentData'
            ]
        );

        return view('student.edit', $parameters);
    }

    public function updateStudent(Request $request) {
        $input  = $request->all();

        $input  = $request->all();

        //Custom Validation Rules Traits
        $requestInputFields = ['name', 'age', 'gender', 'teacher'];
        $alertValues        = ['Student Name', 'Student Age', 'Student Gender', 'Teacher'];


        if($this->notSetRule($input, $requestInputFields, $alertValues )['status'] == 'error'){
            return back()->with(
                [
                    $this->notSetRule($input, $requestInputFields, $alertValues )['status']=>$this->notSetRule($input, $requestInputFields, $alertValues )['message']
                ]
            )->withInput();
        }


        if($this->emptyRules($input, $requestInputFields, $alertValues)['status'] == 'error'){
            return back()->with(
                [
                    $this->emptyRules($input, $requestInputFields, $alertValues )['status']=>$this->emptyRules($input, $requestInputFields, $alertValues )['message']
                ]
            )->withInput();
        }

        $data   = [
            'name'      => $input['name'],
            'age'       => $input['age'],
            'gender'    => $input['gender'],
            'teacher_id'=> $input['teacher']
        ];


        if ($this->getStudentBydId($input['id'])) {

            if ($this->patchStudentById($input['id'], $data)) {
                return redirect('students')->with(['success'=>$this->updateSuccess()]);
            }

        }

    }

    public function deleteStudent(Request  $request) {
        $id = $request->get('id');
        if ($this->getStudentBydId($id)) {
            if ($this->removeStudentById($id)) {
                return back()->with(['success'=>$this->deleteSuccess('Student')]);
            }
            else {
                return back()->with(['error'=>$this->deleteFail('Student')]);
            }
        }

    }

}
