<?php 
    // class Form Starts
    class Forms{
        
        private $HTML; // create HTML
        private $StickyData; // array for sticky data
        private $ValidationError; // array for checking errors

        public function __construct(){
            $this->StickyData = array();
            $this->ValidationError = array();
        }

        // create form_open
        public function form_open($Action, $id){
            $this->HTML = '<form action="' . htmlspecialchars($Action) . '" method="post" id="' . $id . '" enctype="multipart/form-data">';
        }

        // create Input field
        public function makeInput($LabelText, $ControlName){ // waiting for 2 prams
            $StickyValue = ""; // The stickyData empty in the begining

            if(isset($this->StickyData[$ControlName])){
                $StickyValue = $this->StickyData[$ControlName];
            }

            $ErrorMessage = ""; // The error message will be empty in the begining

            if(isset($this->StickyData[$ControlName])){
                $ErrorMessage = $this->StickyData[$ControlName];
            }

            // create HTML
            $this->HTML.= '<div class="form-group">
                <label for="' . $ControlName . '">' . $LabelText . '</label>
                <input type="text" name="' . $ControlName . '" class="form-control" value="' . $StickyValue . '" placeholder="Enter ' . $ControlName . '">
                <div id="errorMessage">' . $ErrorMessage . '</div>
            </div>';
        }

        // create Email
        public function makeInputEmail($LabelText, $ControlName){ // waiting for 2 prams
            $StickyValue = ""; // The stickyData empty in the begining

            if(isset($this->StickyData[$ControlName])){
                $StickyValue = $this->StickyData[$ControlName];
            }

            $ErrorMessage = ""; // The error message will be empty in the begining

            if(isset($this->StickyData[$ControlName])){
                $ErrorMessage = $this->StickyData[$ControlName];
            }

            // create HTML
            $this->HTML.= '<div class="form-group">
                <label for="' . $ControlName . '">' . $LabelText . '</label>
                <input type="email" name="' . $ControlName . '" class="form-control" value="' . $StickyValue . '" placeholder="Enter ' . $ControlName . '">
                <div id="errorMessage">' . $ErrorMessage . '</div>
            </div>';
        }

        // create Password
        public function makePassword($LabelText, $ControlName){ // waiting for 2 prams
            $StickyValue = ""; // The stickyData empty in the begining

            if(isset($this->StickyData[$ControlName])){
                $StickyValue = $this->StickyData[$ControlName];
            }

            $ErrorMessage = ""; // The error message will be empty in the begining

            if(isset($this->StickyData[$ControlName])){
                $ErrorMessage = $this->StickyData[$ControlName];
            }

            // create HTML
            $this->HTML.= '<div class="form-group">
                <label for="' . $ControlName . '">' . $LabelText . '</label>
                <input type="password" name="' . $ControlName . '" class="form-control" value="' . $StickyValue . '" placeholder="Enter ' . $ControlName . '">
                <div id="errorMessage">' . $ErrorMessage . '</div>
            </div>';
        }

        // create submit
        public function makeSubmit($ControlName){
            $this->HTML.= '<input type="submit" class="btn btn-dark" name="' . $ControlName . '" vlaue="' . $ControlName . '">';
        }

        // Validation Methods
        public function checkEmpty($ControlName){
            $Value = "";
            if(isset($this->$StickyData[$ControlName]) == TRUE){
                $Value = $this->$StickyData[$ControlName];
            }

            if(empty($Value)){
                $this->ValidationError[$ControlName] = 'Must not be empty';
            }

        }

        // compare two values
        public function compare($Control, $Control2){
            if($this->StickyData[$Control1] != $this->StickyData[$Control2]){
                $this->ValidationError[$ControlName] = 'Not equal';
            }
        }

        // check valid email format
        public function checkEmail($ControlName){
            $Value = "";
            if(isset($this->$StickyData[$ControlName]) == TRUE){
                $Value = $this->$StickyData[$ControlName];
            }

            if(!filter_var($Value, FILTER_VALIDATE_EMAIL)){
                $this->ValidationError[$ControlName] = 'Must be a valid Email';
            }
        }

        public function raiseCustomError($Control, $ErrorMessage){
            $this->ValidationError[$Control] = $ErrorMessage;
        }

        // Methos to access the private attributes 

        public function __get($key){
            switch($key){
                case 'HTML' :
                return $this->HTML . '</form>';
                break;

                case 'valid' :
                    if(count($this->ValidationError) == 0){ // getting from array of error
                        return true;
                    } else {
                        return false;
                    }
                    break;

                    define:
                    die("Accessing the getter attribute {$key} that does not exist. \n ");
            }
        }

        public function __set($key, $value){
            switch($key){
                case 'StickyData' :
                    $this->StickyData = $Value;
                    break;

                    default:
                    die("Accessing the setter attribute {$key} that does not exist. \n ");
            };
        }

    }
    // class Form Ends

    // Instance of the Class
    $form = new Forms();
?>