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

            $sql = "INSERT INTO gallery(`title`, `description`, `created_at`)
                        VALUES ('$title', '$desc', NOW())";

            $this->database->execute($sql);

            if ($this->database->result == true) {
                return true;
            } else {
                return false;
            }
        }
        public function getGallery($update)
        {
            $sql = "SELECT `gallery`.`title`, `gallery`.`description` FROM gallery
                        WHERE `gallery`.`id` = '$update'";

            $this->database->execute($sql);

            return $this->database->fetchAll();
        }

        public function getGalleries()
        {
            $sql = "SELECT * FROM gallery";

            $this->database->execute($sql);

            return $this->database->fetchAll();
        }

        public function putGallery($title, $desc, $update)
        {
           $sql = "UPDATE gallery
                   SET `gallery`.`title` = '$title', `gallery`.`description` = '$desc'
                   WHERE `gallery`.`id` = '$update'";

           $this->database->execute($sql);

            if ($this->database->result == true) {
                return true;
            } else {
                return false;
            }
        }


        public function deleteGallery($delete)
        {
            $sql = "DELETE FROM gallery WHERE `id` = '$delete'";

            $this->database->execute($sql);

            if ($this->database->result == true) {
                return true;
            } else {
                return false;
            }
        }
    }



