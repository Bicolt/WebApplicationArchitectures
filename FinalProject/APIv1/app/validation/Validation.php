<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * Validation factory for the different formats and for error reporting
 */

class Validation {
    private $model, $commonDAO;

    public function __construct(Model $model, commonDAO $commonDAO){
        $this->model = $model;
        $this->commonDAO = $commonDAO;
    }

    public function IDIsFree ($page,$idName,$id) {
        $res = $this->commonDAO->getById($page, $idName, $id);
        return empty($res);
    }

    public function IDExists ($page, $idName, $id) {
        $res = $this->commonDAO->getById($page, $idName, $id);
        return !empty($res);
    }
}