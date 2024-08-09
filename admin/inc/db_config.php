<?php
    $servername = "127.0.0.1:3308";
    $username = "root";
    $password = "";
    $dbname = "hotelwebsite";

    $connect=mysqli_connect($servername,$username,$password,$dbname);

    if(!$connect){
        echo "Error :". mysqli_connect_error();
    }

    function filteration ($data) {
        foreach ($data as $key => $value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);

            $data[$key] =$value;
        }
        return $data;
    }

    function selectAll($table) {
        global $connect;
        $quotedTable = "`" . str_replace("`", "``", $table) . "`";
        
        $query = "SELECT * FROM $quotedTable";
        $res = mysqli_query($connect, $query);
    
        if (!$res) {
            die("SQL query failed: " . mysqli_error($connect));
        }
    
        return $res;
    }

    function select($sql,$values,$datatypes) {
        $connect = $GLOBALS['connect'];
        if ($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if (mysqli_stmt_execute($stmt)){
                $res= mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Select");
            }
        }
        else {
            die("Query cannot be prepared - Select");
        }
    }

    function update ($sql,$values,$datatypes) {
        $connect = $GLOBALS['connect'];
        if ($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if (mysqli_stmt_execute($stmt)){
                $res= mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update");
            }
        }
        else {
            die("Query cannot be prepared - Update");
        }
    }

    function insert ($sql,$values,$datatypes) {
        $connect = $GLOBALS['connect'];
        if ($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if (mysqli_stmt_execute($stmt)){
                $res= mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Insert");
            }
        }
        else {
            die("Query cannot be prepared - Insert");
        }
    }

    function delete ($sql,$values,$datatypes) {
        $connect = $GLOBALS['connect'];
        if ($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if (mysqli_stmt_execute($stmt)){
                $res= mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Delete");
            }
        }
        else {
            die("Query cannot be prepared - Delete");
        }
    }
?>