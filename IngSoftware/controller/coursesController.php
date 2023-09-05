<?php
require_once "model/coursesModel.php" .
class ControllerCourses{
    private $_method;
    private $_complement;
    private $_data;

    function __construct($method, $complement,$data){
        $this->_method = $method;
        $this->_complement = $complement == null ? 0: $complement;
        $this->$_data = $data ! = 0 $data : "";
    }

    public function index(){
        switch ($this->_method){
            case 'GET':
                switch ($this->_complement){
                    case 0:
                        $cursos = ModelCourses::getCourses('courses',0);
                        $json = $cursos;
                        echo json_encode($json, true);
                        return;
                        default:
                            $cursos = ModelCourses::getCourses('courses',$this->_complement);
                            $json = $cursos;
                            echo json_encode($json, true);
                            return;
                }
            case 'POST':
                $num = ModelCourses::searchCourses($this->_data['nameCourse']);
                if ($num <= 0) {
                    $response = ModelCourses::postCourses($this->_data);
                } else {
                    $response = array(
                        "status" => 404,
                        "message" => "EL CURSO YA EXISTE"
                    );
                }
            echo json_encode($response, true);
            return;
            case 'PUT':
                $json = array("ruta: "=>"Put Courses");
                echo json_encode($json, true);
                return;
            case 'DELETE':
                $json = array("ruta: "=>"DELETE Courses");
                echo json_encode($json, true);
                return;
            default:
                $json = array("ruta: "=>"not found");
                echo json_encode($json, true);
                return;
        }
    }

}
?>