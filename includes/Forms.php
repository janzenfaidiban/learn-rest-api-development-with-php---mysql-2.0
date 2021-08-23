<?php
//Class Form Starts
class Forms{
private $HTML; //create HTML
private $StickyData; //array for sticky data
private $ValidationError; //array for checking errors

public function __construct(){
    $this->StickyData = array();
    $this->ValidationError = array();
}

//create form_open
public function form_open($Action, $id){
$this->HTML = '<form action ="'.htmlspecialchars($Action).'" method="POST" id="'.$id.'" 
                enctype="multipart/form-data"> ';
}

// create input
public function makeInput($LabelText, $ControlName){//waiting for 2 params

    $StickyValue = "";// The stickydata will be empty in the beginning

    if(isset($this->StickyData[$ControlName])){
        $StickyValue = $this->StickyData[$ControlName];
    }

    $ErrorMessage = ""; //The Error message will be empty in the beginning
    if(isset($this->ValidationError[$ControlName])){
        $ErrorMessage = $this->ValidationError[$ControlName];
    }

    //create HTML
    $this->HTML.='<div class="form-group">
    <label for="'.$ControlName.'">'.$LabelText.'</label>
    <input type="text" name="'.$ControlName.'" class="form-control" 
    value="'.$StickyValue.'" placeholder="Enter '.$ControlName.'">
    <div id="errorMessage">'.$ErrorMessage.'</div> 
    </div>';

}// create Input Ends




// create Email
public function makeInputEmail($LabelText, $ControlName){//waiting for 2 params

    $StickyValue = "";// The stickydata will be empty in the beginning

    if(isset($this->StickyData[$ControlName])){
        $StickyValue = $this->StickyData[$ControlName];
    }

    $ErrorMessage = ""; //The Error message will be empty in the beginning
    if(isset($this->ValidationError[$ControlName])){
        $ErrorMessage = $this->ValidationError[$ControlName];
    }

    //create HTML
    $this->HTML.='<div class="form-group">
    <label for="'.$ControlName.'">'.$LabelText.'</label>
    <input type="email" name="'.$ControlName.'" class="form-control" 
    value="'.$StickyValue.'" placeholder="Enter '.$ControlName.'">
    <div id="errorMessage">'.$ErrorMessage.'</div> 
    </div>';

}// create Email Ends



// create Password
public function makePassword($LabelText, $ControlName){//waiting for 2 params

    $StickyValue = "";// The stickydata will be empty in the beginning

    if(isset($this->StickyData[$ControlName])){
        $StickyValue = $this->StickyData[$ControlName];
    }

    $ErrorMessage = ""; //The Error message will be empty in the beginning
    if(isset($this->ValidationError[$ControlName])){
        $ErrorMessage = $this->ValidationError[$ControlName];
    }

    //create HTML
    $this->HTML.='<div class="form-group">
    <label for="'.$ControlName.'">'.$LabelText.'</label>
    <input type="password" name="'.$ControlName.'" class="form-control" 
    placeholder="Enter '.$ControlName.'">
    <div id="errorMessage">'.$ErrorMessage.'</div> 
    </div>';

}// create Password Ends

//create submit
public function makeSubmit($ControlName){
$this->HTML.='<input type="submit" class="btn btn-primary" name="'.$ControlName.'"
value="'.$ControlName.'"> ' ;
}

//Validation Methods

//check Empty field
public function checkEmpty($ControlName){

    $Value="";
    if(isset($this->StickyData[$ControlName]) == TRUE){
        $Value = $this->StickyData[$ControlName];
    }

    if(empty($Value)){
        $this->ValidationError[$ControlName] = 'Must not be empty';
    }
}

//compare two fields
public function compare($Control1, $Control2){

    if($this->StickyData[$Control1] != $this->StickyData[$Control2]){
        $this->ValidationError[$Control2] = 'Not Equal';
    }
}


//Check valid email
 public function checkEmail($ControlName){
 $Value = "";
 if(isset($this->StickyData[$ControlName]) == TRUE){
     $Value = $this->StickyData[$ControlName];
 }

 if(!filter_var($Value, FILTER_VALIDATE_EMAIL)){
     $this->ValidationError[$ControlName] = 'Must be a Valid Email';
 }
}

public function raiseCustomError($Control, $ErrorMessage){
$this->ValidationError[$Control] = $ErrorMessage;
}

//methods to access the private attributes

public function __get($key){

    switch($key){
        case 'HTML' :
        return $this->HTML.'</form>';
        break;

        case 'valid':
        if(count($this->ValidationError) == 0){
            return true;
        }else{
            return false;
        }
        break;

    default:
        die("Accessing the getter attribute {$key} that does not exist. \n");
    }
}

public function __set($key, $value){

    switch ($key){
        case 'StickyData' :
        $this->StickyData = $value;
        break;
    
    default:
    die("Accessing the setter attribute {$key} that does not exist. \n");
    }
}

}// Class Form Ends

//Instance of the class
$form = new Forms();