<?php
include('./User.php');
    class Users {
        /**
        * Will hold users and have methods to check if credentials are valid
        * @var all_users is an array that will hold user objects for querrying
        */
        private $all_users;
        
        private function is_valid_user($name, $password) {
            /**
             * Function assumes basic checking was done on front-end
             * before calling. At minimum name and password will exist
             * and name will not be in password. Password meets all 'requirements'
             */
            if(! empty($this->all_users)) {
                //ensure no duplicate userNames
                //passwords CAN be duplicated
                return (! in_array($password, $this->all_users, true));
            }
            else{
                return true;
            }
        }
        
        private function add_user($user) {
            array_push($this->all_users, $user);
        }
        // Wrapper function for private add_user that accesses users
        public function make_user($name, $password) {
            if (is_valid_user($name, $password)) {
                $new_user = new User($name, $password);
                add_user($new_user);
                
            }
        }
        
        
        public function __construct() {
            $this->all_users = array();
        }
        
        public function suggest_password() {
            /**
             * Special thanks to Stack Overflow
             * https://stackoverflow.com/questions/6101956/generating-a-random-password-in-php
             */ 
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }
    }
?>