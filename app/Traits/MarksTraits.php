<?php

namespace App\Traits;


use App\Models\Marks;
use App\Services;

trait MarksTraits{


    public function getMarksToTable() {

        $tableData      = [];
        $data           = Marks::join('students as s', 's.id', '=', 'marks.student_id')
            ->select('s.name', 'marks.*')
            ->get();

        $permissions    = ['add' => true, 'edit' => 'false', 'delete' => true, 'view' => 'true'];


        foreach ($data as $index => $item) {

            $action = '<a href="edit-marks?id=' . $item['id'] . '"><i class="feather icon-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <a href="delete-marks?id=' . $item['id'] . '"><i class="feather icon-trash-2"></i></a>';


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
                'Term' =>
                    [
                        'value' => $item['term'],
                        'visible' => true
                    ],
                'Maths' =>
                    [
                        'value' => $item['maths'],
                        'visible' => true
                    ],
                'Science' =>
                    [
                        'value' => $item['science'],
                        'visible' => true
                    ],
                'History' =>
                    [
                        'value' => $item['history'],
                        'visible' => true
                    ],
                'Total' =>
                    [
                        'value' => $item['total'],
                        'visible' => true
                    ],
                'Created On' =>
                    [
                        'value' => date('d-M-Y  h:i', strtotime($item['created_at'])),
                        'visible' => true
                    ],
                'Action' =>
                    [
                        'value' => $action,
                        'visible' => true
                    ],
                ];

        }

        $tableHeadCount = (!empty($tableData))?8:0;

        return ['data' => $tableData, 'tableHeadsCount' => $tableHeadCount, 'permissions' => $permissions];

    }

    public function getMarksById($id) {

        if ($id) {
            return Marks::find($id);
        }

    }

    public function getMarksByStudentAndTerm($studentId, $term) {

        if ($studentId && $term) {
            return Marks::where('student_id', $studentId)->where('term', $term)->first();
        }

    }

    public function patchMarksById($id, $request) {
        if ($request) {
            return Marks::where('id', $id)->update($request);

        }
    }

    public function removeMarksById($id) {
        if ($id) {
            return Marks::find($id)->delete();
        }
    }

}
