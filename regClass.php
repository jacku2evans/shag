<?php
class Registration {
    private $email;
    private $username;
    private $password;
    private $confirmPassword;
    
    public function __constract(Array $data){
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->username = isset($data['username']) ? $data['username'] : null;
        $this->password = isset($data['password']) ? $data['password'] : null;
        $this->confirmPassword = isset($data['confirmPassword']) ? $data['confirmPassword'] : null;
        
    }
    //метод проверки совпадения паролей
    public function passwordMatch(){
        return $this->password == $this->confirmPassword;
    }
    //метод валидации данных на пустоту
    public function validate(){
        return !empty($this->email) && !empty($this->username) && !empty($this->password) && !empty($this->confirmPassword) && $this->passwordMatch();
    }
    public function getEmail (){
        return $this->email;
        
    }
    public function getUsername (){
        return $this->username;
        
}
    public function getPassword (){
        return $this->password;
    }
}