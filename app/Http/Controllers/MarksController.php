<?php

namespace App\Http\Controllers;

use App\Models\Marks;
use App\Traits\FunctionalTraits;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    use FunctionalTraits;

    public $successStatus = 200;
    public $errorStatus   = 401;

    public function index() {

        $pageTitle      = 'Marks';
        $breadcrumbs    = 'Marks';
        $browserTitle   = 'Marks';
        $contentHeader  = 'Marks';
        $tableData      = $this->getMarksToTable();

        //dd($tableData);

        $parameters = compact(
            [
                'pageTitle', 'breadcrumbs','browserTitle', 'contentHeader', 'tableData'
            ]
        );
        return view('marks.index', $parameters);
    }

    public function showAddMarks() {

        $pageTitle      = 'Add Marks';
        $breadcrumbs    = 'Add Marks';
        $browserTitle   = 'Add Marks';
        $contentHeader  = 'Add Marks';
        $students       = $this->getStudentsToDropDown();


        $parameters = compact(
            [
                'pageTitle', 'breadcrumbs','browserTitle', 'contentHeader', 'students'
            ]
        );

        return view('marks.add', $parameters);
    }

    public function storeMarks(Request $request) {

        $input  = $request->all();

        //Custom Validation Rules Traits
        $requestInputFields = ['student', 'term', 'maths', 'science', 'history'];
        $alertValues        = ['Student', 'Term', 'Maths', 'Science', 'History'];


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

        if ($this->getMarksByStudentAndTerm($input['student'], $input['term'] )) {
            return back()->with(['error'=>'Marks already added for this student for the term '.$input['term']])->withInput();
        }

        $total  = $input['maths'] + $input['science'] + $input['history'];

        if(Marks::create([
            'student_id'    => $input['student'],
            'term'          => $input['term'],
            'maths'         => $input['maths'],
            'science'       => $input['science'],
            'history'       => $input['history'],
            'total'         => $total
        ]))
        {

            $response   =   [
                'status'    =>  'success',
                'message'   =>  $this->saveSuccess(),
            ];
            return back()->with([$response['status']=>$response['message']]);
        }


    }

    public function showEditMarks(Request $request) {

        $pageTitle      = 'Edit Marks';
        $breadcrumbs    = 'Edit Marks';
        $browserTitle   = 'Edit Marks';
        $contentHeader  = 'Edit Marks';
        $students       = $this->getStudentsToDropDown();
        $marksData      = $this->getMarksById($request->get('id'));


        $parameters = compact(
            [
                'pageTitle', 'breadcrumbs','browserTitle', 'contentHeader', 'students', 'marksData'
            ]
        );

        return view('marks.edit', $parameters);
    }

    public function updateMarks(Request $request) {

        $input  = $request->all();


        ///Custom Validation Rules Traits
        $requestInputFields = ['student', 'term', 'maths', 'science', 'history'];
        $alertValues        = ['Student', 'Term', 'Maths', 'Science', 'History'];


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

        if (!$this->getMarksById($input['id'])) {
            return  back()->with(['error'=>$this->invalid('Marks')]);
        }

        $total  = $input['maths'] + $input['science'] + $input['history'];


        $data   = [
            'term'          => $input['term'],
            'maths'         => $input['maths'],
            'science'       => $input['science'],
            'history'       => $input['history'],
            'total'         => $total
        ];


        if ($this->patchMarksById($input['id'], $data)) {
            return redirect('marks')->with(['success'=>$this->updateSuccess()]);
        }

    }

    public function deleteMarks(Request  $request) {
        $id = $request->get('id');
        if ($this->getMarksById($id)) {
            if ($this->removeMarksById($id)) {
                return back()->with(['success'=>$this->deleteSuccess('Marks')]);
            }
            else {
                return back()->with(['error'=>$this->deleteFail('Marks')]);
            }
        }

    }
}
