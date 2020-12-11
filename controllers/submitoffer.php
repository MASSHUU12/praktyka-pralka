<?php

class SubmitOffer extends SubmitOfferModel {

    public static $message;
 
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


    public function getOfferInfo() {
        if (isset($_POST['offer-submit'])) {
            $image = $_FILES['image'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $condition = $_POST['condition'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $uploader = $_SESSION['email'];

            if (empty($title) || empty($description) || empty($condition) || empty($category) || empty($image || empty($price))) {
                self::$message = 'Uzupełni puste pola';
            }
            else {
                $uniqueId = mt_rand().mt_rand();
                $imageDestination = $this->ImgCheck($image, $uniqueId);
                    if (isset($imageDestination)) {
                        $this->submitOfferInfo($uniqueId, $title, $description, $condition, $category, $imageDestination, $price, $uploader);
                        self::$message = 'Dodano pomyśnie';
                    }
            }
        }
    }

    public function getOrderInfo($paypalId, $uniqueId, $buyer, $seller, $amount, $address, $title, $description, $condition, $category, $image, $date) {
        $this->submitOrderInfo($paypalId, $uniqueId, $buyer, $seller, $amount, $address, $title, $description, $condition, $category, $image, $date);
    }

}