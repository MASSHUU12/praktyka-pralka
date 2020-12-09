<?php

class SubmitArticle extends SubmitArticleModel {

    public static $message;
 
    protected function ImgCheck($image, $dirName) {       
            $fileName = $image['name'];
            $fileTmpName = $image['tmp_name'];
            $fileSize = $image['size'];
            $fileError = $image['error'];
            $fileType = $image['type'];
        
            $fileExt = explode('.', $fileName);
            $fileActalExt = strtolower(end($fileExt));
        
            $allowed = array('jpg', 'jpeg', 'png');
                     
            if (in_array($fileActalExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 10000000) {
                        $fileNameNew = uniqid('', true).".".$fileActalExt;
                        $fileDestination = '../public/articles/'. $dirName .'/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $fileDestinationActual = 'app/public/articles/'. $dirName .'/'.$fileNameNew;

                        return $fileDestinationActual;
                    }
                    else {
                        echo 'Plik jest za duży';
                    }
                }
                else {
                    echo 'Błąd przesyłania zdjęcia';
                }   
            }
            else{
                echo 'Rozszerzenie pliku jest niepoprawne';
            }   
        }


    public function getArticleInfo() {
        if (isset($_POST['article-submit'])) {
            $image = $_FILES['main-img'];
            $title = $_POST['title'];
            $description = $_POST['first'];
            $imgSmallOne = 'aaa'; //$FILES['img-small-one'];
            $imgSmallTwo = 'aaa'; //$FILES['img-small-two'];
            $descriptionTwo = $_POST['second'];

            if (empty($image) || empty($title) || empty($description) || empty($descriptionTwo)) {
                self::$message = 'Oj Michale, uzupełni puste pola';
            }
            else {
                $dirName = preg_replace('/\s+/', '_', $title);
                mkdir('articles/'.$dirName);
                $imageDestination = $this->ImgCheck($image, $dirName);
                    if (isset($imageDestination)) {
                        $this->submitArticleInfo($imageDestination, $title, $description, $imgSmallOne, $imgSmallTwo, $descriptionTwo);
                        self::$message = 'Ah Michale, cóż za wspaniały artykuł. Może napiszesz jeszcze jeden?';
                    }
            }
        }

    }

}