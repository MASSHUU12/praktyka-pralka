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
                    echo 'Błąd';
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
            $this->submitOfferInfo($title, $description, $condition, $imageDestination, $price, $uploader);
        }
    }
}