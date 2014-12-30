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
    public $outputArray = null;
    private $validation = null;

    function __construct()
    {
        $this->DAOFactory = new DAO_factory();
        $this->DAOFactory->initDBResources();
        $this->commonDAO = $this->DAOFactory->getCommonDAO();
        $this->validation = new Validation($this, $this->commonDAO);
    }

    public function getAll($page)
    {
        $res = $this->commonDAO->getAll($page);
        $this->outputArray = $res;
    }

    public function getById($page, $id)
    {
        $idName = $this->findIdName($page);
        $res = $this->commonDAO->getById($page, $idName, $id);
        if (empty($res)) {
            $this->outputArray = $this->reportResult(HTTPSTATUS_NOTFOUND, $page);
        } else {
            $this->outputArray = $res[0];
        }
    }

    public function searchQuestionnaire($parameters)
    {
        $res = $this->commonDAO->searchQuestionnaire($parameters);
        $this->outputArray = $res;
    }

    public function addNewElement($page, $json)
    {
        $tab = json_decode($json, true);
        $idName = $this->findIdName($page);
        if ($this->validation->IDIsFree($page,$idName, $tab[$idName])) {
            $res = $this->commonDAO->addNewElement($page, $tab);
            if ($res) {
                $this->outputArray = $this->reportResult(HTTPSTATUS_CREATED, $page);
            } else {
                $this->outputArray = $this->reportResult(HTTPSTATUS_INTSERVERERR, $page);
            }
        } else {
            $this->outputArray = $this->reportResult(HTTPSTATUS_NOTALLOWED, $page);
        }
    }

    public function updateElement($page, $json) {
        $tab = json_decode($json, true);
        $idName = $this->findIdName($page);
        if ($this->validation->IDExists($page,$idName, $tab[$idName])) {
            $res = $this->commonDAO->updateElement($page, $tab, $idName);
            if ($res) {
                $this->outputArray = $this->reportResult(HTTPSTATUS_NOCONTENT, $page);
            } else {
                $this->outputArray = $this->reportResult(HTTPSTATUS_INTSERVERERR, $page);
            }
        } else {
            $this->outputArray = $this->reportResult(HTTPSTATUS_NOTALLOWED, $page);
        }
    }

    public function deleteElement($page, $id) {
        $idName = $this->findIdName($page);
        if ($this->validation->IDExists($page,$idName, $id)) {
            $res = $this->commonDAO->deleteElement($page, $idName, $id);
            if ($res) {
                $this->outputArray = $this->reportResult(HTTPSTATUS_NOCONTENT, $page);
            } else {
                $this->outputArray = $this->reportResult(HTTPSTATUS_INTSERVERERR, $page);
            }
        } else {
            $this->outputArray = $this->reportResult(HTTPSTATUS_NOTALLOWED, $page);
        }
    }

    public function reportResult($httpStatus, $page = null)
    {
        $resultArray = ['code' => $httpStatus];
        switch ($httpStatus) {
            case HTTPSTATUS_NOTFOUND:
                $description = 'Not found';
                if (!is_null($page)) {
                    $description .= " in table $page";
                }
                break;
            case HTTPSTATUS_OK:
                $description = 'Success';
                break;
            case HTTPSTATUS_CREATED:
                $description = 'Element created';
                if (!is_null($page)) {
                    $description .= " in table $page";
                }
                break;
            case HTTPSTATUS_NOCONTENT:
                $description = 'Success - No content to provide';
                break;
            case HTTPSTATUS_BADREQUEST:
                $description = 'Bad request';
                break;
            case HTTPSTATUS_NOTALLOWED:
                $description = 'Validation Exception - Method Not Allowed';
                if (!is_null($page)) {
                    $description .= " on table $page";
                }
                break;
            case HTTPSTATUS_INTSERVERERR:
            default:
                $description = 'Error';
            if (!is_null($page)) {
                $description .= " on table $page";
            }
                break;
        }
        $resultArray['description'] = $description;
        return $resultArray;
    }

    public function findIdName($page)
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
        return $idName;
    }

    function __destruct()
    {
        $this->DAOFactory->clearDBResources();
    }
}

?>
