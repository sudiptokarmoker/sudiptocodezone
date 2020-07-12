<?php 
try {
    $dbh = new PDO('mysql:host=premium72.web-hosting.com;dbname=solvkzto_db_seisdream_sandbox', 'solvkzto_seisdbu', 'P72B%Lh+7I7k');
    foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>