<?php
// connects to database 
function ConnectDB() {
    $host = "db";
    $user = "myuser";
    $password = "password";
    $db = "mydb";
    if ($database=mysqli_connect($host, $user, $password, $db)){
            return $database;
    }
    else {
            echo "<h1>Could Not Connect to Database</h1>";
    }
}
// executes a query
function Query($query){
    $database = ConnectDB();
    if ( !( $result = mysqli_query( $database,$query ) ) )
    {
        print( "Could not execute query! <br />" );
        die( mysqli_error() );
    }
    mysqli_close($database);
}
// returns data from a query
function ReturnQuery($query){
    $database = ConnectDB();
    if ( !( $result = mysqli_query( $database, $query) ) )
    {
        print( "Could not execute query! <br />" );
        die( mysqli_error() );
    }
    mysqli_close($database);
    return $result;
}
// returns the ID of the last entry inserted
function ReturnIdQuery($query){
    $database = ConnectDB();
    if ( !( $result = mysqli_query( $database,$query ) ) )
    {
        print( "Could not execute query! <br />" );
        die( mysqli_error() );
    }
    else {
        $last_id = mysqli_insert_id($database);
        mysqli_close($database);
        return $last_id;
    }
    mysqli_close($database);
}
?>