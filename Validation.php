
 <?php
    // All about Validation
   
    class Account {
        
    private $errorArray;
        
    public function __construct() {
        $this->errorArray = array();
    }
        
    public function register($username, $firstname, $email, $email2, $password, $password2) {
        $this->validateUsername($username);
        $this->validateFirstname($firstname);
        $this->validateEmail($email, $email2);
        $this->validatePassword($password, $password2);
    }
    
    // Get all errors
    public function getError($error) {
        if(!in_array($error, $this->errorArray)) {
           $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }    
   
    
    private function validateUsername($username) {
        if(strlen($username) < 5 || strlen($username) > 25) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
    }
        
    private function validateFirstname($firstname) {
       if(strlen($firstname) < 5 || strlen($firstname) > 25) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
       } 
   }
    
    private function validateEmail($email, $email2) {
        if($email != $email2) {
            array_push($this->errorArray, Constants::$emailsDoNotMatch);
            return;
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }
    }
        
    private function validatePassword($password, $password2) {
        if($password != $password2) {
            array_push($this->errorArray, Constants::$passwordsDoNoMatch);
            return;
        }
        
        if(strlen($password) < 5 || strlen($password2) > 25) {
            array_push($this->errorArray, Constants::$passwordCharacters);
            return;
        }
        
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
            return;
        }
    }

}
?>


