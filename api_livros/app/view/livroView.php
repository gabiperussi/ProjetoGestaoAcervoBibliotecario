<?php 

class LivroView{
    public function sendResponse($data, $statuscode=200){
        http_response_code(statuscode);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
        exit;
    }
}

?>