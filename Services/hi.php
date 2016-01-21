<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

<!--Submit comments -->
<?php
require "config.php";// connection to database 

//Select Data
$result = mysql_query("

SELECT * FROM hi
ORDER BY id DESC;

");
			
?>
<!--Submit complete -->
<head>     
  <title>YourFirstStep</title>     <!-- Title shows on address bar -->
  <link href="css/scaffold.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
		
<div style="background:#ADD8E6" id="header" class="ui-layout-north"> 
  <h1><a href="/">YourFirstStep<span>.de</span></a></h1>
  <!-- Introductory message, common for all page-->
  <p style="color:#8B0000">Help Yourself to Start Your New Journey at Vienna</p>
  <img src="img/kas2.png" style="width:180px;height:50px;float: right;"> </div>

<style>
  #map {
    width: auto;
    height: auto;
  }
  </style>
  </head>
  <body>

  <div id="wrapper"> <!--Div Wrapper START-->
		
<div id="right" style="margin:-10px 0px 0px 265px;"> 
  <div id="map"></div>
</div>			
		
	<div id="left" style="background: rgba(0, 0, 0, 0.5); padding-left:10px;" >
					<div>
					<img src="../img/hi.jpg" style="width:250px;height:120px">
					<p style="color:#ffffff; font-weight:bold; font-family: cursive; font-size:24px">
						  Health insurance
					</p>
					<p style="color:#ffffff; font-family: cursive; font-size:14px">
						  Available Location for this Service. Use Get Direction to reach at the service point. 
					</p>
					</div>
<br>
<button id="clear"> Get direction </button>
					
<div>
<br>
						<h1 style="color:#1A3F09; font-family: cursive; font-weight:bold; font-size:16px">
						  Related Info:
						 </h1>
						  <p style="font-size:14px">
						  To open a bank account, you will need:<br>
Your Passport/ID Card<br>
Your address in Karlsruhe (You should have one)<br>
Your Student ID or enrollment certificate 
						  </p>
</div>			
					
<br>
					
			<form action="insert_hi.php" method="POST">
					<table>
                  <tr> 
              <td><b>Comments:</b></td>
            </tr>
			<tr> 
              <td><textarea rows="1" cols="33.5" name="name" id="name" required placeholder="Name"></textarea></td>
            </tr><br>
			<tr> 
              <td><textarea rows="4" cols="33.5" name="comment" id="comment" required placeholder="Please share your opinion"></textarea></td>
            </tr>
			<tr> 
              <td><button type="submit" name="submit" id="submit">Post</button></td>
            </tr>
          </table>
		  </form>
			<!-- Opinion column-->					
		<!-- Opinion Showing-->
		<br>
		<tr style="font-style:bold;"> 
         Story Board
      </tr>
		<div class="scroll" style="float:left; margin-left:0px; font-size:12px;"> 
    <table style="width:250px;border-style:solid;" border="1px" align="left">
      
	        <tr> 
        <hr width="100%"></hr>
      </tr>

      <?php
		while($row_result=mysql_fetch_array($result)){
		
		?>
      <tr style="border-width:0px;border-style:solid;"> 
        <tr> 
		<td bgcolor="#CCCCCC; font-style:bold;"> <?php echo $row_result['name'] ?> </td>
		</tr>
		 
		<tr> 
		<td bgcolor="#CCCCCC"> <?php echo $row_result['comment']?> </td>
		</tr>
        <td> <?php 
?> </td>
      </tr>
      <?php

            }
            ?>
    </table>
  </div>


  <div id="map">

  <script src="ol3/ol.js"></script>
  <script type="text/javascript">
  
  
  
  var map = new ol.Map({
    target: 'map',
    layers: [
      new ol.layer.Tile({
        source: new ol.source.OSM()
      })
    ],
    view: new ol.View({
      center: ol.proj.transform([13.409779,52.520645], 'EPSG:4326', 'EPSG:3857'),
      zoom: 14
    }),
    controls: ol.control.defaults({
      attributionOptions: {
        collapsible: false
      }
    })
  });
 
  var params = {
    LAYERS: 'pgrouting:pgrouting',
    FORMAT: 'image/png'
  }

  // The "start" and "destination" features.
  var startPoint = new ol.Feature();
  var destPoint = new ol.Feature();
 

  // The vector layer used to display the "start" and "destination" features.
  var vectorLayer = new ol.layer.Vector({
    source: new ol.source.Vector({
      features: [startPoint, destPoint]

    })
  });
  
 

  map.addLayer(vectorLayer);
 
  
  
  
 
  // A transform function to convert coordinates from EPSG:3857
  // to EPSG:4326.
  var transform = ol.proj.getTransform('EPSG:3857', 'EPSG:4326');
  var result;

  // Register a map click listener.
  map.on('click', function(event) {
    if (startPoint.getGeometry() == null) {
      // First click.
      startPoint.setGeometry(new ol.geom.Point(event.coordinate));
    } else if (destPoint.getGeometry() == null) {
      // Second click.
      destPoint.setGeometry(new ol.geom.Point(event.coordinate));
      // Transform the coordinates from the map projection (EPSG:3857)
      // to the server projection (EPSG:4326).
      var startCoord = transform(startPoint.getGeometry().getCoordinates());
      var destCoord = transform(destPoint.getGeometry().getCoordinates());
      var viewparams = [
        'x1:' + startCoord[0], 'y1:' + startCoord[1],
        'x2:' + destCoord[0], 'y2:' + destCoord[1]
      ];
      params.viewparams = viewparams.join(';');
      result = new ol.layer.Image({
        source: new ol.source.ImageWMS({
          url: 'http://localhost:8082/geoserver/pgrouting/wms',
          params: params
        })
      });
      

      map.addLayer(result);
      
    
    }
  });

  var clearButton = document.getElementById('clear');
  clearButton.addEventListener('click', function(event) {
    // Reset the "start" and "destination" features.
    startPoint.setGeometry(null);
    destPoint.setGeometry(null);
    // Remove the result layer.
    map.removeLayer(result);
  });
  
  //for showing the markers of the activity's location.
//Health 1  
  var iconFeature1 = new ol.Feature({
	geometry : new ol.geom.Point(ol.proj.transform([8.410988352380974 ,49.00911437619098], 'EPSG:4326', 'EPSG:3857'))
  });
  
  var iconStyle1 = new ol.style.Style({
	image : new ol.style.Icon({
	src : 'img/m31.png'
     })
  });
  
  iconFeature1.setStyle(iconStyle1);
  
  var vectorSource1 = new ol.source.Vector ({
	features : [ iconFeature1 ]
  });

 var vectorLayer1 = new ol.layer.Vector ({
	source : vectorSource1
 });
 
 map.addLayer(vectorLayer1);

 //Health 2 
 
 var iconFeature2 = new ol.Feature({
	geometry : new ol.geom.Point(ol.proj.transform([8.416509600000017 ,49.00875519999999], 'EPSG:4326', 'EPSG:3857'))
  });
  
  var iconStyle2 = new ol.style.Style({
	image : new ol.style.Icon({
	src : 'img/m32.png'
     })
  });
  
  iconFeature2.setStyle(iconStyle2);
  
  var vectorSource2 = new ol.source.Vector ({
	features : [ iconFeature2 ]
  });

 var vectorLayer2 = new ol.layer.Vector ({
	source : vectorSource2
 });
 
 map.addLayer(vectorLayer2);
 
 //Health 3  
  var iconFeature3 = new ol.Feature({
	geometry : new ol.geom.Point(ol.proj.transform([8.483192499999967 ,49.25718400000015], 'EPSG:4326', 'EPSG:3857'))
  });
  
  var iconStyle3 = new ol.style.Style({
	image : new ol.style.Icon({
	src : 'img/m33.png'
     })
  });
  
  iconFeature3.setStyle(iconStyle3);
  
  var vectorSource3 = new ol.source.Vector ({
	features : [ iconFeature3 ]
  });

 var vectorLayer3 = new ol.layer.Vector ({
	source : vectorSource3
 });
 
 map.addLayer(vectorLayer3);
 
 //Health 4  
  var iconFeature4 = new ol.Feature({
	geometry : new ol.geom.Point(ol.proj.transform([8.374582936457987 ,49.01565225000016], 'EPSG:4326', 'EPSG:3857'))
  });
  
  var iconStyle4 = new ol.style.Style({
	image : new ol.style.Icon({
	src : 'img/m34.png'
     })
  });
  
  iconFeature4.setStyle(iconStyle4);
  
  var vectorSource4 = new ol.source.Vector ({
	features : [ iconFeature4 ]
  });

 var vectorLayer4 = new ol.layer.Vector ({
	source : vectorSource4
 });
 
 map.addLayer(vectorLayer4);
 //end of adding markers
  
  </script>
  </div>
  </body>
</html>