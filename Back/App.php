<?php

class App
{
    private $dbName;

    public function __construct($dbName = 'ajaxdata'/*'movies_project'*/)
    {
        $this->dbName = $dbName;

    }

    public function getDbName()
    {
        return  $this->dbName;
    }
}

?>