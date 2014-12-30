<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * Model component
 */

include_once("db/DAO_factory.php");
include_once("validation/Validation.php");

class Model
{
    private $DAOFactory = null;
    private $commonDAO = null;
    public $outputString = null;
    private $validation = null;

    function __construct()
    {
        $this->DAOFactory = new DAO_factory();
        $this->DAOFactory->initDBResources();
        $this->commonDAO = $this->DAOFactory->getCommonDAO();
        $this->validation = new Validation();
    }

    public function getAll($page)
    {
        $res = $this->commonDAO->getAll($page);
        $this->outputString = json_encode($res);
    }

    public function getById($page, $id)
    {
        switch ($page) {
            case 'students':
                $idName = 'student_number';
                break;
            case 'tasks':
                $idName = 'task_id';
                break;
            case 'courses':
                $idName = 'id_course';
                break;
            default:
                $idName = 'id';
                break;
        }
        $res = $this->commonDAO->getById($page, $idName, $id);
        if (empty($res)) {
            $this->outputString = '{"code" : "404", "error":"ID not found in ' . $page . '"}';
        } else {
            $this->outputString = json_encode($res[0]);
        }
    }

    public function searchQuestionnaire($parameters)
    {
        $res = $this->commonDAO->searchQuestionnaire($parameters);
        $this->outputString = json_encode($res);
    }

    public function addNewElement($page, $json)
    {
        $tab = json_decode($json, true);
        if ($this->validation->validateID($page, $tab)) {
            $res = $this->commonDAO->addNewElement($page, $tab);
            if ($res) {
                $this->outputString = '{"code" : "200", "success":"New element added"}';
            } else {
                $this->outputString = '{"code" : "500", "error":"Internal server error"}';
            }
        } else {
            $this->outputString = '{"code" : "405", "error":"Validation exception"}';
        }
    }

    public function preparePublications()
    {
        $pubsDAO = $this->commonDAO;
        $res = $pubsDAO->getPublications();

        $this->outputString = json_encode($res);
    }

    public function preparePublicationById($id)
    {
        $pubsDAO = $this->commonDAO;
        $res = $pubsDAO->getPublicationById($id);

        $this->outputString = json_encode($res);
    }

    public function preparePublicationByName($name)
    {
        $pubsDAO = $this->commonDAO;
        $res = $pubsDAO->getPublicationByName($name);

        $this->outputString = json_encode($res);
    }

    public function CreatePublication($publicationString)
    {
        $tab = json_decode($publicationString, true);
        if (array_key_exists('title', $tab) && array_key_exists('authors', $tab) && array_key_exists('year', $tab) && array_key_exists('proceeding', $tab)) {
            $pubsDAO = $this->commonDAO;
            $res = $pubsDAO->CreateNewPublication($tab);

            $this->outputString = json_encode($res);
        } else {
            $this->outputString = '';
        }
    }

    public function reportError($httpStatus, $page = null)
    {
        $this->outputString = '{"code" : "' . $httpStatus . '", "error":"';
        $this->outputString .= 'Table not found';
        $this->outputString .= '"}';
    }

    function __destruct()
    {
        $this->DAOFactory->clearDBResources();
    }
}

?>
