<?php
namespace Libs;
use Mysqli;

abstract class Model extends Mysqli
{

    //DB connect
    public function __construct($connectConfig = array())
    {
        @parent::__construct(db_host, db_login, db_password, db_name);
        if ($this->connect_error) {
            throw new \Exception (
                $this->connect_error,
                $this->connect_errno
            );
        }
    }

}