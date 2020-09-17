<?php
class Authorization
{
    private $id;
    private $con;

    function __construct($con, $ids)
    {
        $this->id = $ids;
        $this->con = $con;
    }

    function check_user()
    {
        $sql = "SELECT roleuser FROM tbuser WHERE id = '$this->id'";
        $result = mysqli_query($this->con, $sql);
        if ($result) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($row['roleuser'] == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
