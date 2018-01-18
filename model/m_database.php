<?php

class M_database
{

    private $__conn;

    function M_database()
    {
        if (!isset($this->__conn))
        {
            $this->__conn = mysqli_connect(CONST_DB_SERVER_ADDRESS, CONST_DB_USER_NAME, CONST_DB_USER_PASSWORD, CONST_DB_DATABASE_NAME);
            mysqli_query($this->__conn, "set names utf8");
        }
    }

    function GetAll($table)
    {
        $sql    = "select * from " . $table;
        $query  = mysqli_query($this->__conn, $sql);
        $result = array();
        while ($row    = mysqli_fetch_assoc($query))
        {
            $result[] = $row;
        }
        return $result;
    }

    function GetAllQuery($sql)
    {
        $query  = mysqli_query($this->__conn, $sql);
        $result = array();
        while ($row    = mysqli_fetch_assoc($query))
        {
            $result[] = $row;
        }
        return $result;
    }

    function GetAllpt_where($table, $limit, $page, $where)
    {
        $sql    = 'select * from ' . $table . ' where ' . $where . ' limit ' . $limit * ($page - 1) . ',' . $limit;
        $query  = mysqli_query($this->__conn, $sql);
        $result = array();

        while ($row = mysqli_fetch_assoc($query))
        {
            $result[] = $row;
        }
        return $result;
    }

    function GetAllwhere($table, $where)
    {
        $sql    = "select * from " . $table . " " . $where;
        $query  = mysqli_query($this->__conn, $sql);
        $result = array();
        while ($row    = mysqli_fetch_assoc($query))
        {
            $result[] = $row;
        }
        return $result;
    }

    function GetRow($table, $where)
    {
        $sql   = "select * from " . $table . " where " . $where;
        $query = mysqli_query($this->__conn, $sql);
        $row   = mysqli_fetch_assoc($query);
        return $row;
    }

    function Insert($table, $data)
    {
        $list_key    = "";
        $list_values = "";
        foreach ($data as $keys => $values)
        {
            $list_key    .= $keys . ",";
            $list_values .= "'" . $values . "',";
        }
        $sql    = "insert into " . $table . " (" . rtrim($list_key, ',') . ") values(" . rtrim($list_values, ',') . ")";
        $result = mysqli_query($this->__conn, $sql);
        return $result;
    }

    function InsertMessage($fkUserSend, $fkUserReceive, $message)
    {
        $sql    = "insert into messages (fk_user_send,fk_user_receive,content, create_date) values($fkUserSend,$fkUserReceive,'$message', now()) ";
        $result = mysqli_query($this->__conn, $sql);
        return $result;
    }

    function Update($table, $data, $id_table, $id)
    {
        $sql = "";
        foreach ($data as $keys => $values)
        {
            $sql .= $keys . "='" . $values . "',";
        }
        $sql    = "update " . $table . " set " . rtrim($sql, ',') . " where " . $id_table . "=" . $id;
        $result = mysqli_query($this->__conn, $sql);
        return $result;
    }

    function Delete($table, $id_table, $id)
    {
        $sql    = "delete from " . $table . " where " . $id_table . "=" . $id;
        $result = mysqli_query($this->__conn, $sql);
        return $result;
    }

    function Login($tendangnhap, $matkhau)
    {
        $matkhau  = md5($matkhau);
        $sqlkt1   = "select * from users where login_name='" . $tendangnhap . "'";
        $querykt1 = mysqli_query($this->__conn, $sqlkt1);
        $sqlkt2   = "select * from users where login_name='" . $tendangnhap . "' and password='" . $matkhau . "'";
        $querykt2 = mysqli_query($this->__conn, $sqlkt2);
        $row      = mysqli_fetch_array($querykt2);
        $dem1     = mysqli_num_rows($querykt1);
        $dem2     = mysqli_num_rows($querykt2);
        $err      = '';
        if ($dem1 < 1)
        {
            $err = 'Tên đăng nhập chưa đúng';
        }
        elseif ($dem2 > 0)
        {
            $_SESSION['user_chat']['id']         = $row['id'];
            $_SESSION['user_chat']['login_name'] = $row['login_name'];
            $_SESSION['user_chat']['name']       = $row['name'];
            $_SESSION['user_chat']['avatar']     = $row['avatar'];
        }
        header('location:' . SITE_ROOT);
    }

}
