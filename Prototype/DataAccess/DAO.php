<?php

require('../DB/DataBase.php');

class DAO {
    public function getBook(){
        $DataBase = new DataBase();
        return $DataBase->Books;
    }

    public function setBook($book){
        $DataBase = new DataBase();
        $DataBase->Books[] = $book;
        $DataBase->saveData();

    }
    public function editBookByTitle($title, $newbook) {
        $DataBase = new DataBase();
        foreach ($DataBase->Books as $index => $book) {
            if ($book->getTitle() === $title) {
                $DataBase->Books[$index] = $newbook;
                $DataBase->saveData();
                return true;
            }
        }
        return false;
    }

    public function deletebookByTitle($title) {
        $DataBase = new DataBase();
        foreach ($DataBase->Books as $index => $book) {
            if ($book->getTitle() === $title) {
                unset($DataBase->Books[$index]);
                $DataBase->Books = array_values($DataBase->Books); // Reindex the array
                $DataBase->saveData();
                return true;
            }
        }
        return false;
    }
    
    
    
}


?>