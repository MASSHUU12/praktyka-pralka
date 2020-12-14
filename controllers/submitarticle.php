<?php

class SubmitArticle extends SubmitArticleModel {

    public static $message;
    public static $imageOne;
    public static $imageTwo;
    public static $imageThree;
 
    protected function ImgCheck($image, $dirName) {
        $images = array();
        for ($i=0; $i <= 2; $i++) {   
            $fileName = $image['name'][$i];
            $fileTmpName = $image['tmp_name'][$i];
            $fileSize = $image['size'][$i];
            $fileError = $image['error'][$i];
            $fileType = $image['type'][$i];
            $fileExt = explode('.', $fileName);
            $fileActalExt = strtolower(end($fileExt));
        
            $allowed = array('jpg', 'jpeg', 'png');
                     
            if (in_array($fileActalExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 10000000) {
                        
                        $fileNameNew = $i.'.'.$fileActalExt;
                        $fileDestination = '../public/articles/'. $dirName .'/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $fileDestinationActual = 'app/public/articles/'. $dirName .'/'.$fileNameNew;

                        $images[] = $fileDestinationActual;
                    }
                    else {
                        self::$message = 'Plik jest za duży';
                    }
                }
                else {
                    self::$message = 'Błąd przesyłania zdjęcia';
                }   
            }
            else{
                self::$message = 'Rozszerzenie pliku jest niepoprawne';
            }
        } 
        return $images;
    }


    public function getArticleInfo() {
        if (isset($_POST['article-submit'])) {
            $image = $_FILES['main-img'];
            $title = $_POST['title'];
            $description = $_POST['first'];
            $descriptionTwo = $_POST['second'];

            if (empty($image) || empty($title) || empty($description) || empty($descriptionTwo)) {
                self::$message = 'Oj Michale, uzupełni puste pola';
            }
            else {
                $count = count($image['name']);
                if ($count != 3) 
                    self::$message = 'Oj Michale, Umawialismy się na trzy zdjęcia';
                else {
                    $dirName = 'article'.mt_rand();
                    mkdir('articles/'.$dirName);
                    $images = $this->ImgCheck($image, $dirName);
                        if (isset($images)) {
                            $this->submitArticleInfo($images, $title, $description, $descriptionTwo);
                            self::$message = 'Ah Michale, cóż za wspaniały artykuł. Może napiszesz jeszcze jeden?';
                        }
                }
            }
        }
    }

    public function showArticle($column, $value) {
        $results = $this->getArticle($column, $value);
        if (!empty($results[0]['ImageArticles'])) {
            $images = $results[0]['ImageArticles'];
            $images = explode(', ', $images);
            self::$imageOne = $images[0];
            self::$imageTwo = $images[1];
            self::$imageThree = $images[2];
        }
        return $results;
    }

}