<?php

	require 'medoo.php';
	
    $db = new Database("10.20.10.246", "root", "P@ssw0rd1324", "db");

	$query = "SELECT * FROM db.MST_MAPS";
    //$params = array('SMG','BLOK',"A007");
    $result = $db->query($query);

    $rows = $result->num_rows ;

	$koma = ',';
	//echo $rows."<br>";
	$Header_JSON = '{"type": "FeatureCollection",
					"crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
    				"features": [';
    $Body_JSON = '';

    $i = 1;
    while($rst = mysqli_fetch_assoc($result)) {

        if ($i == $rows){
			$koma = '';
		}
		$Body_JSON .= '{ "type": "Feature", "properties": '. $rst['PROPERTIES'].', "geometry": { "type": "'. $rst['TYPE'] .'", "coordinates": '.$rst['GEO'].'}}'.$koma;	
      
      $i++;

    }
    $Footer_JSON = '	] }';
    echo $Header_JSON.$Body_JSON.$Footer_JSON;
	//$rows =  $database->count('MST_MAPS', ['AFDELING' => '"I"']);
	?>