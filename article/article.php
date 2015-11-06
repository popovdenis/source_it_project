<?php
/*
 * 1. Создать класс Article
a. DB таблица ​
article​
.
b. Поля DB таблицы
id ­ int, 5, primary key, autoincrement,
title ­ varchar, 70
description
created_at
c. Сущности
title
description
createdAt
d. Методы
getArticle ­ получить статью
getArticles­ получить список статей
postArticle ­ сохранить статью
putArticle ­ обновить статью
deleteArticle ­ удалить статью
 */
header("Content-type:text/html; charset=utf-8");
include_once "../_autoload.php";

class Article
{
//    public $base;
    public $id;


    public function  __construct()
    {
        $this->base = new DataBase();
    }

    public function postArticle($title_use,$description_use) // сохранить статью
    {
        $s = "INSERT INTO article (`title`,`description`,`created_at`)
              VALUES ('".$this->base->escape($title_use)."','".$this->base->escape($description_use)."',NOW())";
        $this->base->execute($s);
        return true;

    }

    public function getArticle($get) // получить статью
    {
        $this-> id = $get;
        $edit =  "SELECT * FROM `article` WHERE `id` = $this->id";
        $this->base->execute($edit);

        return $this->base->fetchAll();
    }

    public function getArticles() // получение списков статей
    {
        $sql="SELECT * FROM article";
        $this->base->execute($sql);
        return $this->base->fetchAll();
    }


    public function putArticle($id, $title, $description) // обновить статью
    {
        $update = "UPDATE article
              SET `article`.`title`= '".$this->base->escape($title)."',
              `article`.`description` = '".$this->base->escape($description)."'
              WHERE `article`.`id` = '".$this->base->escape($id)."' ";
        $this->base->execute($update);

        return true;
    }


    public function deleteArticle($id) // удалить статью
    {
        $sql = "DELETE FROM article WHERE id= ' ".$this->base->escape($id)." ' ";
        return $this->base->execute($sql);
    }
}



//$article = new Article('Bogdan','Gutenev');
//echo $article->title;
//echo $article->description;
//echo $article->createdAt;
//$article->postArticle();
//var_dump($article->getArticles());