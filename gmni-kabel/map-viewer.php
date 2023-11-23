<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Real Time Map Reports</title>
	<!-- Link to Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
    />
	<script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
	<style>
	body {
	  position: relative;
	  min-height: 100%;
	  margin: 0;
	  padding: 0;
	  background-color: #f1f1f1;
	}
	.map-iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		border: none;
	}
	</style>
	</head>
	
<body>
	<header class="bg-danger text-white text-center py-3">
	<h1 class="h3">Real Time Laporan Kabel Bermasalah Jakarta Barat</h1>
	</header>

  <!-- Your content goes here -->
  <div style="height: 2rem;"></div>
  <div class="form-group">
		<label for="map">Location:</label>
		<div class="map-container">
			<div id="map" style="width: 100%; height: 400px;">
			<iframe src="rt-map.php" frameborder="0" width="100%" height="100%"></iframe>
			</div>			
		</div>
	</div>
  
  <!-- Link to Bootstrap JS (optional, needed for certain Bootstrap components) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
