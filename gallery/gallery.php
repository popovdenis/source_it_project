<?php
include_once "../_autoload.php";

class Gallery
{
    public function __construct()
    {
        $this->database = new DataBase();
    }

    public function postGallery($title, $desc)
    {
        $query = "INSERT INTO gallery(`title`, `description`, `created_at`) VALUES (:title, :description, :createdAt)";
        $this->database
            ->prepare($query)
            ->bindValue(':title', $this->database->escape($title))
            ->bindValue(':description', $this->database->escape($desc))
            ->bindValue(':createdAt', (new DateTime())->format('Y-m-d H:i:s'))
            ->execute();

        return true;
    }

    public function getGallery($update)
    {
        $query = "SELECT `title`, `description` FROM gallery WHERE `id` = :id";
        $this->database
            ->prepare($query)
            ->bindValue(':id', $this->database->escape($update), DataBase::PARAM_INT)
            ->execute();

        return $this->database->fetchAll();
    }

    public function getGalleries()
    {
        $query = "SELECT * FROM gallery";
        $this->database
            ->prepare($query)
            ->execute();

        return $this->database->fetchAll();
    }

    public function putGallery($title, $desc, $update)
    {
        $query = "UPDATE gallery SET `title` = :title, `description` = :description WHERE `id` = :id";
        $this->database
            ->prepare($query)
            ->bindValue(':title', $this->database->escape($title))
            ->bindValue(':description', $this->database->escape($desc))
            ->bindValue(':id', $this->database->escape($update), DataBase::PARAM_INT)
            ->execute();

        return true;
    }

    public function deleteGallery($delete)
    {
        $query = "DELETE FROM gallery WHERE `id` = :id";
        $this->database
            ->prepare($query)
            ->bindValue(':id', $this->database->escape($delete), DataBase::PARAM_INT)
            ->execute();

        return true;
    }
}



