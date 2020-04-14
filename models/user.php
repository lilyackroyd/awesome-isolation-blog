<?php

class User {

    protected $email;
    protected $username;
    protected $password;
    protected $usertype;

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getUsertype() {
        return $this->usertype;
    }

    function setUsertype($usertype) {
        $this->usertype = $usertype;
    }

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUser($usn) {
        $db = Db::getInstance();
        $sql = "SELECT * FROM Users WHERE user_UN= :username";
        $req = $db->prepare($sql);
        $req->execute(['username' => $usn]);
        $result = $req->fetch();
        return $result;
    }

    public function loginUser() {
        $usn = $this->username;
        $user = User::getUser($usn);
        
        //hash passwords, uncomment to turn on
//         $isVerified=password_verify($this->password, $user['user_PWD']);
        $pwd = $this->password;
        if ($pwd === $user['user_PWD']) {
            $pwd = TRUE;
        }
       
        if (/*$isVerified === TRUE*/ $pwd === TRUE && $user['user_TYPE'] === "Admin") {
            $_SESSION['username'] = $user['user_UN'];
            $_SESSION['userid'] = $user['user_ID'];
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['usertype'] = $user['user_TYPE'];
            echo "<script> location.href='/awesome/index.php?controller=user&action=admin';</script>";
        } else if (/*$isVerified === TRUE*/ $pwd === TRUE  && $user['user_TYPE'] === "Blogger") {
            $_SESSION['username'] = $user['user_UN'];
            $_SESSION['userid'] = $user['user_ID'];
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['usertype'] = $user['user_TYPE'];
            echo "<script> location.href='/awesome/index.php?controller=user&action=blogger';</script>";
        } else if (/*$isVerified === TRUE*/ $pwd === TRUE  && $user['user_TYPE'] === "Subscriber") {
            $_SESSION['username'] = $user['user_UN'];
            $_SESSION['userid'] = $user['user_ID'];
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['usertype'] = $user['user_TYPE'];
            echo "<script> location.href='/awesome/index.php?controller=blog&action=home';</script>";
        } else {
            die("Incorrect details");
        }
    }

    public function getallBloggers() {
        $db = Db::getInstance();
        $sql = "SELECT * FROM Users WHERE user_TYPE='Blogger'";
        $req = $db->query($sql);
        //$result = $req->fetchall();
        //return $result;
        foreach ($req->fetchAll() as $blogger) {
            $list[] = new Members(
                    $blogger['user_ID'], $blogger['user_IMG'], $blogger['user_FN'], $blogger['user_LN']);
        }
        return $list;
    }

    public function getallSubscribers() {
        $db = Db::getInstance();
        $sql = "SELECT * FROM Users WHERE user_TYPE='Subscriber'";
        $req = $db->query($sql);
        //$result = $req->fetchall();
        //return $result;
        foreach ($req->fetchAll() as $subscriber) {
            $list[] = new Members(
                    $subscriber['user_ID'], $subscriber['user_IMG'], $subscriber['user_FN'], $subscriber['user_LN']);
        }
        return $list;
    }

    public static function update($id) {
        $db = Db::getInstance();

        //checks firstname 
        if (isset($_POST['firstName']) && $_POST['firstName'] != "") {
            $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        //checks lastname
        if (isset($_POST['lastName']) && $_POST['lastName'] != "") {
            $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        //checks username
        if (isset($_POST['userName']) && $_POST['userName'] != "") {
            $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        //checks genre
        if (isset($_POST['email']) && $_POST['email'] != "") {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $req = $db->prepare("Update Users set user_FN=:firstname, user_LN=:lastname, user_UN=:username, user_EMAIL=:email WHERE user_ID=:id");
        $req->bindParam(':firstname', $firstName);
        $req->bindParam(':lastname', $lastName);
        $req->bindParam(':username', $userName);
        $req->bindParam(':email', $email);
        $req->bindParam(':id', $id);
        $req->execute();
    }

    public function checkUserExists() {
        $db = Db::getInstance();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $check = $db->prepare("SELECT * from Users WHERE user_EMAIL = :email OR user_UN = :username");
        $check->bindParam(':username', $username);
        $check->bindParam(':email', $email);
        $check->execute();

        $rows = $check->fetchAll();
        $numrows = count($rows);
        return $numrows;
    }
    
      public function hashPassword($password) {
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashedpassword;
    }
    
    
    
    
    
           
    public function createUser() {
        $db = Db::getInstance();
      
        //call an error method with all post inputs? If error array is 0 then do the rest, otherwise send back the array?
        $num_rows = self::checkUserExists();
        echo $num_rows;
        
        //if user is new:
        if ($num_rows == 0) {
            //santize and prep all the inputs for insertion
            if (isset($_POST['username']) && $_POST['username'] != "") {
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if (isset($_POST['password']) && $_POST['password'] != "") {
                $password = $_POST['password'];
                 $hashedpassword = self::hashPassword($password);
            }
            if (isset($_POST['email']) && $_POST['email'] != "") {
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if (isset($_POST['usertype']) && $_POST['usertype'] != "") {
                $usertype = ucfirst(filter_input(INPUT_POST, 'usertype', FILTER_SANITIZE_SPECIAL_CHARS));
            }
            if (isset($_POST['firstname']) && $_POST['firstname'] != "") {
                $firstname = ucfirst(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
            }
            if (isset($_POST['surname']) && $_POST['surname'] != "") {
                $lastname = ucfirst(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS));
            }
            if ($usertype=='Admin'||$usertype=='Blogger'){
                $imagepath="Views/images/".$firstname.$lastname.".jpg";
            }

            //prepare the statements for each user type: (do we need 2 diff for admin / blogger?
            $subscriber = $db->prepare("INSERT INTO Users (user_EMAIL, user_UN, user_PWD, user_TYPE) VALUES (:email, :username, :password, :usertype)");
            $admin = $db->prepare("INSERT INTO Users (user_EMAIL, user_UN, user_PWD, user_TYPE, user_FN, user_LN, user_IMG) VALUES (:email, :username, :password, :usertype,:firstname,:lastname,:image)");
            $blogger = $db->prepare("INSERT INTO Users (user_EMAIL, user_UN, user_PWD, user_TYPE, user_FN, user_LN, user_IMG) VALUES (:email, :username, :password, :usertype,:firstname,:lastname,:image)");


           //execute the correct query, with the relevant info for each user type:
//            try {
                if ($usertype == 'Subscriber') {

                    $subscriber->execute([':username' => $username,
                        ':password' =>  $hashedpassword,
                        ':email' => $email,
                        ':usertype' => $usertype,]);
                    
                         header("Location: index.php?controller=user&action=login"); 
                }
                if ($usertype == 'Admin') {

                    $admin->execute([':username' => $username,
                        ':password' =>  $hashedpassword,
                        ':email' => $email,
                        ':usertype' => $usertype,
                        ':firstname' => $firstname,
                        ':lastname' => $lastname,
                        ':image' => $imagepath]);
                    self::uploadFile($imagepath);
                     
                    header("Location: index.php?controller=user&action=login"); 
                }
                if ($usertype == 'Blogger') {

                    $blogger->execute([':username' => $username,
                        ':password' =>  $hashedpassword,
                        ':email' => $email,
                        ':usertype' => $usertype,
                        ':firstname' => $firstname,
                        ':lastname' => $lastname,
                        ':image' => $imagepath]);
                     self::uploadFile($imagepath);
                         header("Location: index.php?controller=user&action=login"); 
                }
                
                //and then add their details to the session
//                $_SESSION["username"] = $_POST['username'];
//                header("Location:../../index.php");
//                return userAdded($username);
//                }
                
                // otherwise send an error message
//                catch (PDOException $e) {
//                $error = $e->errorInfo();
//                die("Eek, sorry, we couldn't sign you up. Try again?" . $error . $e->getMessage());
//            }
//            unset($req);
//        } else {
//            return userExists($username);    
//        }
    }else {echo "error adding";}

    }
    
    
  
    const AllowedTypes = [ 'image/jpg'];
    const InputKey = 'userimage';


    public static function uploadFile(string $imagepath) {

    	   $tempFile = $_FILES[self::InputKey]['tmp_name'];
            $path = realpath(__DIR__ . '/..') . '/' .  $imagepath;
	       $destinationFile = $path ;
            $error = $_FILES[self::InputKey]['error'];
//        if($error === 0) {           
	if (!move_uploaded_file($tempFile, $destinationFile)) {
		echo "";            
        } 
        if (file_exists($tempFile)) {
		unlink($tempFile); 
        } 
        }
                
    
    
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
