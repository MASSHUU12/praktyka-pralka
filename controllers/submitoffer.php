<?php

class SubmitOffer extends SubmitOfferModel {
 
    protected function ImgCheck($image) {       
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
                        $fileDestination = '../public/offers/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $fileDestinationActual = 'app/public/offers/'.$fileNameNew;

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


    public function getOfferInfo($title, $description, $condition, $image, $price, $uploader) {
        if (empty($title) || empty($description) || empty($condition) || empty($image || empty($price))) {
            echo 'Uzupełni puste pola';
        }
        else {
            $imageDestination = $this->ImgCheck($image);
                if (isset($imageDestination)) {
                    $this->submitOfferInfo($title, $description, $condition, $imageDestination, $price, $uploader);
                     echo '<h3 class="success">Dodanie aukcji przebiegło pomyślnie. Jeśli chcesz możesz dodać kolejną</3>';
                }
        }
    }

}