<?php
require_once "ConDB.php";

class ModelCourses{
    static public function getCourses($table,$param){
        $param = is_numeric($param) ? $param : 0;
        $query = "";
        $query = $param == 0 ? " SELECT * FROM $table;" : "SELECT * FROM $table WHERE
        idCourse = $param";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    static public function postCourse(array ,$param){
        $query = "INSERT INTO courses VALUES('',?,?); ";
        $statement = Connection::connection()->prepare($query);
        if ($statement->execute([
            $data['nameCourse'],
            $data['durationCourse']
        ])) {
            return "ok";
            } else {
                return Connection::connection()->errorInfo();
        }

        static public function putCourses(array $data){
            //realizar
            return $result = 200;
        }

        static public function deleteCourses(array $data){
            //realizar
            return $result = 200;
        }

        static public function searchCourses($course){
            if (($course != null) || (!empty($course))){
                $query = "SELECT * FROM courses WHERE nameCourse = '$course'";
                $statement = Connection::connection()->prepare($query);
                $statement->execute();
                $count = $statement -> rowCount();
                return $count;
            }
        }
    }
}
?>