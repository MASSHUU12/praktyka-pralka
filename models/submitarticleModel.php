<?php

class SubmitArticleModel extends Dbh {

    protected function submitArticleInfo($images, $title, $description, $descriptionTwo) {
        $sql = "INSERT INTO articles (ImageArticles, TitleArticles, DescArticles, DescTwoArticles, DateArticles) values(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $date = date("H:i j/m/y");
        $imagesNew = $images[0].', '.$images[1].', '.$images[2];
        $stmt->execute([$imagesNew, $title, $description, $descriptionTwo, $date]);
    }

    protected function getArticle($column, $value) {
        $sql = "SELECT * FROM articles WHERE ". $column ."= '". $value ."' ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    }
}