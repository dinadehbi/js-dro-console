<?php

require('../DataAccess/DAO.php');

class Services {
    public function getBook(){
        $DataBase2 = new DAO();
        return $DataBase2->getBook();
    }


    public function setBook($book){
        $DataBase2 = new DAO();
        $DataBase2->setBook($book);
    }

    public function editBookByTitle($title, $book) {
        $DataBase2 = new DAO();
        return $DataBase2->editBookByTitle($title, $book);
    }

    public function deleteBookByTitle($title) {
        $DataBase2 = new DAO();
        return $DataBase2->deleteBookByTitle($title);
    }
    
    
    
}




?>