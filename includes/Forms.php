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

    }
    // class Form Ends
?>