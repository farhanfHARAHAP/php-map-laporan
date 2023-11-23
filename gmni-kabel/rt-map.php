<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Many markers</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
  <link rel="stylesheet" href="style.css" />
  <style>
    *,
    :after,
    :before {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    html {
      height: 100%;
    }

    body,
    html,
    #map {
      width: 100%;
      height: 100%;
    }

    body {
      position: relative;
      min-height: 100%;
      margin: 0;
      padding: 0;
      background-color: #f1f1f1;
    }
  </style>
</head>

<body>
  <div id="map"></div>
  <?php
    require_once('lib/connectDB.php'); // Connect to DB

    // Get database
    require_once('lib/query.php');
    $data = getLocations();
  ?> 
  <script> 
    let coordinates = []; 
  </script>
  <?php
    while ($row = $data->fetch_assoc()) {
  ?>      	
	<script>
	  coordinates.push([<?php echo $row['coor_x']; ?>, <?php echo $row['coor_y']; ?>, '<?php echo $row['imageLink']; ?>']);	
	</script>
  <?php
    }
    require_once('lib/disconnectDB.php'); // Disconnect from DB
  ?>
  
  <script>
		// config map
		let config = {
		  minZoom: 7,
		  maxZoom: 18,
		};
		// magnification with which the map will start
		const zoom = 18;
		// co-ordinates
		const lat = -6.1788;
		const lng = 106.8037;

		// calling map
		const map = L.map("map", config).setView([lat, lng], zoom);

		// Used to load and display tile layers on the map
		// Most tile servers require attribution, which you can set under `Layer`
		L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
		  attribution:
			'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		}).addTo(map);

		// loop that adds many markers to the map
		for (let i = 0; i < coordinates.length; i++) {
		  const [lat, lng, popupText] = coordinates[i];
			  
			  var openImage = "<a href= "+popupText+"> <p> Lihat gambar laporan </p></a>";
			  
			  var marker = L.marker([lat, lng])
				.bindPopup(openImage)
				.addTo(map);
		}
	</script>
  
</body>
</html>
