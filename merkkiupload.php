
<?php    
    // Gets data from URL parameters.
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];

//tietokanta
$username= 'root';
$password= '';
$host= 'shell.metropolia.fi';
$database='ilkkaper';

//Connect to database
$dbh = new PDO("mysql:host=lo;dbname=$database", $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    // Prepare INSERT statement new sigting
        $stmt3 = $dbh->prepare("INSERT INTO markers (ID, name, address, lat, lng, type)  VALUES (NULL, ?, ?, ?, ?, ?)");
        // Assign parameters
        $stmt3->bindParam(1,$name);
        $stmt3->bindParam(2,$address);
        $stmt3->bindParam(3,$lat);
        $stmt3->bindParam(4,$lng);
        $stmt3->bindParam(5,$type);
        
        $stmt3->execute();
        $data[] = array("name"=>$name, "lat"=>round($lat,6), "lng"=>round($lng,6),"address"=>$address,"type"=>$type);
        //Data for success
        echo json_encode($data);
}
catch(PDOException $e) {
    echo ("Error Message");// Remove or modify after testing 
}


//Close the connection
$dbh = null; 
?>