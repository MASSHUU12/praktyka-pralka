<?php

class SubmitOffer extends SubmitOfferModel {
 
    protected function ImgCheck($image, $uniqueId) {       
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
                        mkdir('offers/'.$uniqueId);
                        $fileDestination = '../public/offers/'.$uniqueId.'/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $fileDestinationActual = 'app/public/offers/'.$uniqueId.'/'.$fileNameNew;

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


    public function getOfferInfo($title, $description, $condition, $category, $image, $price, $uploader) {
        if (empty($title) || empty($description) || empty($condition) || empty($category) || empty($image || empty($price))) {
            echo 'Uzupełni puste pola';
        }
        else {
            $uniqueId = mt_rand().mt_rand();
            $imageDestination = $this->ImgCheck($image, $uniqueId);
                if (isset($imageDestination)) {
                    $this->submitOfferInfo($uniqueId, $title, $description, $condition, $category, $imageDestination, $price, $uploader);
                     echo '<h3 class="success">Dodanie aukcji przebiegło pomyślnie. Jeśli chcesz możesz dodać kolejną</h3>';
                }
        }
    }

    public function ChangeToSold($uniqueId) {
        $this->ChangeToSoldDb($uniqueId);
    }

    public function getOrderInfo($paypalId, $uniqueId, $buyer, $seller, $amount, $address) {
        $this->submitOrderInfo($paypalId, $uniqueId, $buyer, $seller, $amount, $address);
    }

}