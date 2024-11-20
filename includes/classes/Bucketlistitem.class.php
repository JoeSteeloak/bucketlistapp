<?php

class Bucketlistitem
{
    // Properties
    private $db;
    private $activity;
    private $description;
    private $priority;

    // Constructor
    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

        // Felkontroll
        if ($this->db->connect_error > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    // Returnera bucketlist
    public function getListitems(): array
    {
        $sql = "SELECT * FROM bucketlist;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Lägg till aktivitet 
    public function addListitem(string $activity, string $description, int $priority): bool
    {
        // Kontrollera input
        if (!$this->setActivity($activity)) return false;
        if (!$this->setDescription($description)) return false;
        if (!$this->setPriority($priority)) return false;

        $sql = "INSERT INTO bucketlist(activity, description, priority)VALUES('$this->activity', '$this->description', '$this->priority');";

        return mysqli_query($this->db, $sql);

    }

    /** Set- och get-metoder */

    public function setActivity(string $activity): bool
    {
        //  Kontrollera längden
        if ($activity != "") {
            $this->activity = $this->db->real_escape_string($activity);
            return true;
        } else {
            return false;
        }
    }
    public function setDescription(string $description): bool
    {
        //  Kontrollera längden
        if ($description != "") {
            $this->description = $this->db->real_escape_string($description);
            return true;
        } else {
            return false;
        }
    }

    public function setPriority(string $priority): bool
    {
        //  Kontrollera längden
        if (strlen($priority) != 1) {
            return false;
        } else {
            $this->priority = $this->db->real_escape_string($priority);
            return true;
        }
    }
    public function getActivity(): string
    {
        return $this->activity;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPriority(): string
    {
        return $this->priority;
    }
}