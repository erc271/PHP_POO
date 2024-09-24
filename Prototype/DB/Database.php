<?php

class Database
{
    public $Books = [];

    public function __construct()
    {
        $this->retrieveData();
    }

    private function retrieveData()
    {
        $file_path = "../DB/DataBase.txt";

        if (file_exists($file_path)) {
            $content = file_get_contents($file_path);
            
            // Check if unserialization is successful
            $Data = unserialize($content);

            if ($Data !== false && isset($Data->Books)) {
                $this->Books = $Data->Books;
            } else {
                // Handle the case of corrupted or invalid data
                echo "Warning: Data in the file is invalid. Initializing with empty books.";
                $this->Books = [];
            }
        }
    }

    private function storeData()
    {
        $file_path = "../DB/DataBase.txt";

        // Serialize the current instance (with the updated Books)
        $Data = serialize($this);
        
        // Write the serialized data back to the file
        if (file_put_contents($file_path, $Data) === false) {
            echo "Error: Failed to write data to file.";
        }
    }

    public function saveData()
    {
        $this->storeData();
    }
}
