<?php
/**
 * @author Nicolas Benning <nicolas.benning@mydit.ie>
 * publications DAO
 */

include_once 'base_DAO.php';

class commonDAO extends BaseDAO
{
    /**
     * Overiding parent's constructor
     */
    function __construct($dbManager)
    {
        parent::__construct($dbManager);
    }

    public function getAll($page)
    {
        $db = $this->getDBManager();
        $queryString = "SELECT * FROM $page;";
        $stmt = $db->prepareQuery($queryString);

        $db->executeQuery($stmt);
        $result = $db->fetchQuery($stmt);

        return $result;
    }

    public function getById($page, $idName, $id)
    {
        $db = $this->getDBManager();
        $queryString = "SELECT * FROM $page WHERE $idName='$id';";
        $stmt = $db->prepareQuery($queryString);

        $db->executeQuery($stmt);
        $result = $db->fetchQuery($stmt);

        return $result;
    }

    public function searchQuestionnaire($parameters)
    {
        $db = $this->getDBManager();
        $queryString = "SELECT q.*,n.description,c.id_course,l.name FROM questionnaire q, students s, lecturers l, nationalities n, tasks t, courses c ";
        $queryString .= "WHERE q.task_number = t.task_id ";
        $queryString .= "AND q.student_number = s.student_number ";
        $queryString .= "AND s.id_nationality = n.id ";
        $queryString .= "AND t.course_id = c.id_course ";
        $queryString .= "AND c.lecturer_id = l.id ";
        if (!is_null($parameters['student'])) {
            $queryString .= "AND s.student_number = '" . $parameters['student'] . "' ";
        }
        if (!is_null($parameters['nationality'])) {
            $queryString .= "AND n.id = '" . $parameters['nationality'] . "' ";
        }
        if (!is_null($parameters['task'])) {
            $queryString .= "AND t.task_id = '" . $parameters['task'] . "' ";
        }
        if (!is_null($parameters['lecturer'])) {
            $queryString .= "AND l.id = '" . $parameters['lecturer'] . "' ";
        }
        if (!is_null($parameters['course'])) {
            $queryString .= "AND c.id_course = '" . $parameters['course'] . "' ";
        }
        $queryString .= ";";
        $stmt = $db->prepareQuery($queryString);

        $db->executeQuery($stmt);
        $result = $db->fetchQuery($stmt);

        return $result;
    }

    public function addNewElement($page,$tab) {
        $db = $this->getDBManager();
        foreach ($tab as $key => $value) {
            $values[] = "$key = '$value'";
        }
        $sqlClause = implode(", ",$values);
        $queryString = "INSERT INTO $page SET $sqlClause";
        $stmt = $db->prepareQuery($queryString);

        return $db->executeQuery($stmt);
    }

    public function updateElement($page,$tab,$idName) {
        $db = $this->getDBManager();
        foreach ($tab as $key => $value) {
            $values[] = "$key = '$value'";
        }
        $sqlClause = implode(", ",$values);
        $queryString = "UPDATE $page SET $sqlClause WHERE $idName='$tab[$idName]';";
        $stmt = $db->prepareQuery($queryString);

        return $db->executeQuery($stmt);
    }

    public function deleteElement($page,$idName,$id) {
        $db = $this->getDBManager();
        $queryString = "DELETE FROM $page WHERE $idName='$id';";
        $stmt = $db->prepareQuery($queryString);

        return $db->executeQuery($stmt);
    }

}

?>
