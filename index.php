<?php 

    include("Validation.php");
    include("Constants.php");

    $account = new Account(); 

   /* Sanitizing will remove any illegal character from the data. Validating will determine if the data is in proper form */
    function sanitizeformUsername($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        return $inputText;
    }

    function sanitizeformString($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ", "", $inputText);
        $inputText = ucfirst(strtolower($inputText));
        return $inputText;
    }

    function sanitizeformPassword($inputText) {
        $inputText = strip_tags($inputText);
        return $inputText;
    }
    
    /* END Sanitizing */


if(isset($_POST["registerButton"])) {
    // register button was pressed
    $username = sanitizeformUsername($_POST["username"]);
    $firstname = sanitizeformString($_POST["firstname"]);
    $email = sanitizeformString($_POST["email"]);
    $email2 = sanitizeformString($_POST["email2"]);
    $password = sanitizeformPassword($_POST["password"]);
    $password2 = sanitizeformPassword($_POST["password2"]);
    
    $account->register($username, $firstname, $email, $email2, $password, $password2);
      
    
}


    //Remembering form values
    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }

?>



<!DOCTYPE html>
<html>
<head>
    <title>Registration & Login Form</title>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>
       <div id="background">

		    <div id="loginContainer">

			    <div id="inputContainer">
       
                    <form id="loginForm" action="register.php" method="POST">
                       <h2>Login to your account</h2>
                        <p>
                            <label for="loginUsername">Username</label>
                            <input type="text" id="loginUsername" name="loginUsername" placeholder="Enter username" value="<?php getInputValue('loginUsername') ?>" required>
                        </p>

                        <p>
                            <label for="loginPassword">Password</label>
                            <input type="password" id="loginPassword" name="loginPassword" placeholder="Enter password" required>
                        </p>

                        <button type="submit" name="loginButton">Sign In</button>
                        
                        <div class="hasAccountText">
						    <span id="hideLogin">Don't have an account yet? Signup here</span>
					    </div>

                    </form>
                    
                    

                    <form id="registerForm" method="POST" action="register.php">
                        <h2>Create your free account</h2>
                        <p>
                            <?php echo $account->getError(Constants::$usernameCharacters); ?>
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter username" value="<?php getInputValue('username') ?>" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" name="firstname" placeholder="Enter name" value="<?php getInputValue('firstname') ?>" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                            <?php echo $account->getError(Constants::$emailInvalid); ?>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter email" value="<?php getInputValue('email') ?>" required>
                        </p>

                        <p>
                          <label for="email2">Confirm email</label>
                           <input type="email" id="email2" name="email2" placeholder="Confirm email" value="<?php getInputValue('email2') ?>" required>
                       </p>

                        <p>
                            <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                            <?php echo $account->getError(Constants::$passwordCharacters); ?>
                            <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Set password" required>
                        </p>

                        <p>
                            <label for="password2">Password</label>
                            <input type="password" id="password2" name="password2" placeholder="Confirm password" required>
                        </p>

                        <button type="submit" name="registerButton">SIGN UP</button>
                        
                        <div class="hasAccountText">
						    <span id="hideRegister">Already have an account? Log in here.</span>
					    </div>
                   
                    </form>
                    
                </div>
                
                <div id="loginText">
                    <h1>Registration &amp; Login Form</h1>
                    <h2>Registration and Login Form Validation and Sanitize Using (PHP)</h2>
                    <ul>
                        <li>Sign Up Form Validation and Sanitize Completed. </li>
                        <li>Sign In Validation and Sanitize is in Proceeding...</li>
                        <li>and MySQL is in Proceeding... </li>
                        
                    </ul>
			    </div>
                
           </div>
    </div>
    
    
</body>
</html>