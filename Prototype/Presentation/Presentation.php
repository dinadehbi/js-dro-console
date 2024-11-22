<?php

require('../Services/Services.php');
require('../Entities/categorie.php');

class Presentation {
    public function viewBook(){
        echo "\n View Books available ";

        $BookServices = new Services();
        $book = $BookServices->getBook();
      if(!empty($book)){  
        foreach($book as $ct){
            echo "---------------------------------\n";
            echo "Titles: " . $ct->getTitle() . "\n";
            echo "Image: " . $ct->getImage() . "\n";
        }
    }else{
        echo "Books not available";
    }
    echo "---------------------------------\n\n";
}

    public function addBook(){
        echo "\n Adding new Book : \n";

        $title = askQuestion("Enter The title of Book or 'back' for go back : \n");
        if(strtolower($title) === 'back'){
            return;
        }

         $image = askQuestion("Enter The image of Book or 'back' for go back : \n");
        if(strtolower($image) === 'back'){
            return;
        }

        $new_book = new Book($title,$image);
        $BookServices = new Services();
        $BookServices->setBook($new_book);
        echo "Book  added successfully\n\n";

    }
    public function editBook() {
        echo "\n Edit Book: \n";
    
        $title = askQuestion("Enter the title of the Book to edit: ");
        
        $BookServices = new Services();
        $book = $BookServices->getBook();
        
        $found = false;

        foreach ($book as $book) {
            if ($book->getTitle() === $title) {
                $found = true;
                $newTitle = askQuestion("Enter the new title or 'skip' to keep the current title: ");
                $newImage = askQuestion("Enter the new image or 'skip' to keep the current image: ");
                
                $updatedTitle = ($newTitle !== 'skip') ? $newTitle : $book->getTitle();
                $updatedImage = ($newImage !== 'skip') ? $newImage : $book->getImage();
    
                $newBook = new Book($updatedTitle, $updatedImage);
                $BookServices->editBookByTitle($title, $newBook);
    
                echo "Book updated successfully.\n\n";
                break;
            }
        }
    
        if (!$found) {
            echo "Book with title '$title' not found.\n\n";
        }
    }

    public function deleteBook() {
        echo "\n Delete Book: \n";
    
        $title = askQuestion("Enter the title of the Book to delete: ");
        
        $BookServices = new Services();
        $deleted = $BookServices->deleteBookByTitle($title);
    
        if ($deleted) {
            echo "Book with title '$title' deleted successfully.\n\n";
        } else {
            echo "Book with title '$title' not found.\n\n";
        }
    }
    
    
     
}
    


?>