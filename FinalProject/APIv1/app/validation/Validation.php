<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * Validation factory for the different formats and for error reporting
 */

class Validation {
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function errorReporting () {

    }

//    public function validateID ($page, $id) {
//        switch ($page) {
//            case 'students':
//                $idName = 'student_number';
//                break;
//            case 'tasks':
//                $idName = 'task_id';
//                break;
//            case 'courses':
//                $idName = 'id_course';
//                break;
//            default:
//                $idName = 'id';
//                break;
//        }
//        $res = $this->commonDAO->getById($page, $idName, $id);
//        return empty($res);
//    }
}