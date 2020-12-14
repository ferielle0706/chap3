<?php
Class Library {
    public function getBooks()
    {
        $books = array ("java","html" , "css" , "linux" , "python" , "docker" , "php");
        return $books ;
    }
    public function greetUser($name)
    {
        return array ("message"=>"hello," . $name);
    }

}

?>