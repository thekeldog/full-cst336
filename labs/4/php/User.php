<?php
    class User{
        /**
         * User class holds:
         * @var user_name
         * @var password
         */
        public $user_name;
        
        private $password;
        
        public function __construct($name, $password) {
            
            $this->user_name = $name;
            $this->password = $password;
        }
    }
?>