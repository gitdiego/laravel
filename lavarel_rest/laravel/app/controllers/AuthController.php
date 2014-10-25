<?php  
class AuthController extends AuthController {  
    public function login() {  
        $username = Request::get('username');  
        $password = Request::get('password');  
   
        $userdata = array(  
            'username' => $username,  
            'password' => $password  
        );  
   
        $error = true;  
        $user = array();  
   
        if (Auth::attemp($userdata)) {  
            $error = false;  
            $user = array(  
                'id' => Auth::user()->id,  
                'username' => Auth::user()->username  
            );  
        }  
   
        return Response::json(array(  
            'error' => $error,  
            'user' => $user  
        ), 200);  
    }  
}  
?>  