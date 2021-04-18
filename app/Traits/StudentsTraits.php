<?php

namespace App\Traits;


use App\Models\Students;
use App\Services;

trait StudentsTraits{


    public function getStudentsDataToTable() {

        $tableData      = [];
        $data           = Students::leftJoin('teachers as t', 'students.teacher_id','=', 't.id')
            ->select('students.*', 't.id as teacher_id', 't.teacher_name')
            ->get();
        $permissions    = ['add' => true, 'edit' => 'false', 'delete' => true, 'view' => 'true'];


        foreach ($data as $index => $item) {

            $action = '<a href="edit-student?id=' . $item['id'] . '"><i class="feather icon-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <a href="delete-student?id=' . $item['id'] . '"><i class="feather icon-trash-2"></i></a>';


            $tableData[] = [
                'Sl.No' =>
                    [
                        'value' => ++$index,
                        'visible' => true
                    ],
                'Name' =>
                    [
                        'value' => $item['name'],
                        'visible' => true
                    ],
                'Age' =>
                    [
                        'value' => $item['age'],
                        'visible' => true
                    ],
                'Gender' =>
                    [
                        'value' => $item['gender'],
                        'visible' => true
                    ],
                'Reporting Teacher' =>
                    [
                        'value' => $item['teacher_name'],
                        'visible' => true
                    ],
                'Action' =>
                    [
                        'value' => $action,
                        'visible' => true
                    ],
                ];

        }

        $tableHeadCount = (!empty($tableData))?6:0;

        return ['data' => $tableData, 'tableHeadsCount' => $tableHeadCount, 'permissions' => $permissions];

    }

    public function getStudentsToDropDown() {
        return Students::pluck('name', 'id')->toArray();
    }

    public function getStudentBydId($id) {

        if ($id) {
            return Students::find($id);
        }

    }

    public function removeStudentById($id) {
        if ($id) {
            return Students::find($id)->delete();
        }
    }

    public function patchStudentById($id, $request) {
        if ($request) {
            return Students::where('id', $id)->update($request);

        }
    }


}
