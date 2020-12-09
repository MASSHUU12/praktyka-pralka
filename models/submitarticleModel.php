<?php

class SubmitArticleModel extends Dbh {

    protected function submitArticleInfo($image, $title, $description, $imgSmallOne, $imgSmallTwo, $descriptionTwo) {
        $sql = "INSERT INTO articles (ImageArticles, TitleArticles, DescArticles, ImgSmallOneArticles, ImgSmallTwoArticles, DescTwoArticles, DateArticles) values(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $date = date("H:i j/m/y");
        $stmt->execute([$image, $title, $description, $imgSmallOne, $imgSmallTwo, $descriptionTwo, $date]);
    }
}