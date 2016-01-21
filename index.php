<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<?php
require "config.php";// connection to database 


//Select Data
$result = mysql_query("

SELECT * FROM info
ORDER BY id DESC;

");

?>

<head>     
  <title>YourFirstStep</title>     <!-- Title shows on address bar -->
  <link href="css/scaffold.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
		
<div style="background:#ADD8E6" id="header" class="ui-layout-north"> 
  <h1><a href="/">YourFirstStep<span>.de</span></a></h1>
  <!-- Introductory message, common for all page-->
  <p style="color:#8B0000">Help Yourself to Start Your New Journey at Vienna</p>
  <img src="img/kas2.png" style="width:180px;height:50px;float: right;"> </div>
</head>

<body>

<div id="wrapper"> <!--Div Wrapper START-->
		
		

							
		<div id="left" style="background: rgba(0, 0, 0, 0.5); padding-left:10px;" >

					<div>
					<img src="img/ks.jpg" style="width:250px;height:170px;margin-top:5px;">
					<p style="color:#ffffff; font-weight:bold; font-family: cursive; font-size:16px">
						  Information for foreign students in Vienna.
					</p>
					<br>
					</div>
								

					
					
					<div>       <!-- Content -->
					 
					 <input type="button" name="b1" value="City Registration & Visa" onclick="location.href='services/crv.php'" style="background:#E6E6FA; width: 215px; height: 30px">
					 <img src="img/m1.png" style= "width:25px;height:25px">
					 <!--</button> --> 
       				 <br>
					 <input type="button" name="b2" value="International Office of the Uni" onclick="location.href='services/iou.php'" style="background:#E6E6FA; width: 215px; height: 30px">
					 <img src="img/m2.png" style= "width:25px;height:25px">
					 <!--</button> -->   				 
					 <br>
					 <input type="button" name="b3" value="Health Insurance" onclick="location.href='services/hi.php'" style="background:#F5F5F5; width: 215px; height: 30px">
					 <img src="img/m3.png" style= "width:25px;height:25px"><!--</button> --> 
					 <br>
					 <input type="button" name="b4" value="Bank Account" onclick="location.href='services/ba.php'" style="background:#FFFFFF; width: 215px; height: 30px">
					 <img src="img/m4.png" style= "width:25px;height:25px"><!--</button> --> 
					 <br>
					 <input type="button" name="b5" value="Transportation Ticket" onclick="location.href='services/tp.php'" style="background:#FFFFFF; width: 215px; height: 30px">
					 <img src="img/m5.png" style= "width:25px;height:25px"><!--</button> -->  
					 <br>
					 <input type="button" name="b6" value="Supermarket & Services" onclick="location.href='services/sos.php'" style="background:#F5F5F5; width: 215px; height: 30px">
					 <img src="img/m6.png" style= "width:25px;height:25px"><!--</button> -->  
					 <br>
					 <input type="button" name="b7" value="Accommodation" onclick="location.href='services/acco.php'" style="background:	#E6E6FA; width: 215px; height: 30px">
					 <img src="img/m7.png" style= "width:25px;height:25px"><!--</button> -->   
					 <br>
					 <input type="button" name="b8" value="Mensa, Drinks & Fun" onclick="location.href='services/mfd.php'" style="background:#E6E6FA; width: 215px; height: 30px">
					 <img src="img/m8.png" style= "width:25px;height:25px"><!--</button> -->  
					 <br>
					 </div>
		
					<!-- Opinion column-->
					<br>
					<form action="insert.php" method="POST">
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
  
  

		<!-- Opinion Showing finish-->
	</div>

  <div id="right" style="margin:-10px 0px 0px 265px;"> 
    <div id="map"></div>
  </div>		



<script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script>
    map = new OpenLayers.Map("map");
    map.addLayer(new OpenLayers.Layer.OSM());
    
    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)
   
    var lonLat = new OpenLayers.LonLat( 16.3667 ,48.2000 ).transform(epsg4326, projectTo);
          
    
    var zoom=14;
    map.setCenter (lonLat, zoom);

    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
    
    // Define markers as "features" of the vector layer:
  
//All Bank: DB, Post Bank, Sparkase, Commerz Bank, BB Bank

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 16.3668 ,48.199000 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.deutsche-bank.de/index.htm">Deutsche Bank</a>'} ,
            {externalGraphic: 'img/m4.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20 }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.393273400000023 ,49.00980370000018 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.sparkasse.de/">Sparkasse Bank</a>'} ,
            {externalGraphic: 'img/m4.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.404416299999953 ,49.009038599999855 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.commerzbank.de/">CommerzBank</a>'} ,
            {externalGraphic: 'img/m4.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.410276000000037 ,49.00936230000025 ).transform(epsg4326, projectTo),
            {description:'<a href="https://immobilien.postbank.de/karlsruhe">PostBank</a>'} ,
            {externalGraphic: 'img/m4.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.400367653438142 ,49.01083490000005 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.bbbank.de/">BB Bank</a> '} ,
            {externalGraphic: 'img/m4.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.409759749999985 ,49.00898919999982 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.bbbank.de/">BB Bank</a>'} ,
            {externalGraphic: 'img/m4.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.396222700000013 ,49.00982480000015 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.sparda-bw.de">Sparda Bank</a>'} ,
            {externalGraphic: 'img/m4.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

//All Health Insurance + Stadt Clinick:

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.410988352380974 ,49.00911437619098  ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.tk.de/karlsruhe">Techniker krankenkasse</a>'} ,
            {externalGraphic: 'img/m3.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.416509600000017 ,49.00875519999999 ).transform(epsg4326, projectTo),
            {description:'<a href="https://website:www.aok.de">AOK</a>'} ,
            {externalGraphic: 'img/m3.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.483192499999967 ,49.25718400000015  ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.dak.de">DAK</a>'} ,
            {externalGraphic: 'img/m3.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.374582936457987 ,49.01565225000016  ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.klinikum-karlsruhe.com/">Stadt Klinikum</a>'} ,
            {externalGraphic: 'img/m3.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

// Transportation Ticket

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.404218999999957 ,49.0087236  ).transform(epsg4326, projectTo),
            {description:'<a href="http://www.kvv.de/">KVV</a>'} ,
            {externalGraphic: 'img/m5.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);


var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.398365300000009 ,48.99403410000003  ).transform(epsg4326, projectTo),
            {description:'<a href="https://http://www.kvv.de/">KVV</a>'} ,
            {externalGraphic: 'img/m5.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

//City Registration & Visa Office

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.373895400000038 ,49.0109082000001 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.karlsruhe.de/b4/buergerdienste/oa/tel-bd.de">Citizen Offices(Bürgerbüro)</a>'} ,
            {externalGraphic: 'img/m1.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);


var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.40324575770885 , 49.00862575 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.karlsruhe.de/b4/buergerdienste/oa/bbmitte.de">Rathaus - Markplatz</a>'} ,
            {externalGraphic: 'img/m1.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);


// International Office of University

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.418751356997074 , 49.010312450000264 ).transform(epsg4326, projectTo),
            {description:'<a href="http://www.intl.kit.edu/istudies/3191.php">KIT International office</a>'} ,
            {externalGraphic: 'img/m2.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.390818527911309 , 49.0163725000002 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.karlsruhe.de/b4/buergerdienste/oa/bbmitte.de">HsKa International Office</a>'} ,
            {externalGraphic: 'img/m2.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);


//Mensa, Drink & Fun

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.394084138980228 , 49.014846399999975 ).transform(epsg4326, projectTo),
            {description:'<a href="http://www.studentenwerk-karlsruhe.de/en/essen/">HsKa Mensa</a>'} ,
            {externalGraphic: 'img/m8.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.416467999999984 , 49.01192689999994 ).transform(epsg4326, projectTo),
            {description:'<a href="https://http://www.studentenwerk-karlsruhe.de/en/essen/ ">KIT Mensa</a>'} ,
            {externalGraphic: 'img/m8.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);


var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.416467999999984 , 49.0100009999994 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.studentenwerk-karlsruhe.de">studentenwerk karlsruhe</a> '} ,
            {externalGraphic: 'img/m8.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);
var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point(8.4106442 , 48.9996277000001 ).transform(epsg4326, projectTo),
            {description:'<a href="hwww.agostea-karlsruhe.de">Agostea club</a> '} ,
            {externalGraphic: 'img/m8.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point(8.396882200000123 , 49.01051759999982 ).transform(epsg4326, projectTo),
            {description:'<a href="http://app-club.de/">APP club</a> '} ,
            {externalGraphic: 'img/m8.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point(8.404602099999984 , 49.009706900000296 ).transform(epsg4326, projectTo),
            {description:'<a href="www.nordsee.com">Resturent </a> '} ,
            {externalGraphic: 'img/m8.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point(8.402446300000063 , 49.00864730000012 ).transform(epsg4326, projectTo),
            {description:'<a href="www.viva-restaurant.de/">Resturent </a> '} ,
            {externalGraphic: 'img/m8.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point(8.416062700000095 , 49.00884089999975 ).transform(epsg4326, projectTo),
            {description:'<a href="cym18.tripod.com/deutschland.html#KARLSRUHE">RED Light zone</a> '} ,
            {externalGraphic: 'img/m8.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);

// Accomodation


var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.389726600000028, 49.02401979999988 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.studentenwerk-karlsruhe.de">studentenwerk karlsruhe</a>'} ,
            {externalGraphic: 'img/m777.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.393039991231454,49.01561289999986 ).transform(epsg4326, projectTo),
            {description:'<a href="https://http:www.jugendherberge.de">Jugendherberge Karlsruhe</a>'} ,
            {externalGraphic: 'img/m7.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.422246029273888,49.02007575000016 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.hadiko.de/">HaDiKo</a> '} ,
            {externalGraphic: 'img/m7.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

// Supermarket & Services

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.416467999999984 , 49.02192689999994 ).transform(epsg4326, projectTo),
            {description:'<a href="https://www.asta-kit.de/kontakt">KIT Asta</a>'} ,
            {externalGraphic: 'img/m6.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);


	map.addLayer(vectorLayer);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.410276000000037 , 49.00936230000025).transform(epsg4326, projectTo),
            {description:'<a href="https://www.rewe.de">REWE shop</a>'} ,
            {externalGraphic: 'img/m6.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.385843599995807 , 49.00828905000014).transform(epsg4326, projectTo),
            {description:'<a href="https://www.rewe.de">REWE shop</a>'} ,
            {externalGraphic: 'img/m6.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);



var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.423727200000037 , 49.00966129999998).transform(epsg4326, projectTo),
            {description:'<a href="https://www.rewe.de">REWE city</a>'} ,
            {externalGraphic: 'img/m6.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.438193307174519 ,49.00955335000024).transform(epsg4326, projectTo),
            {description:'<a href="https://www.rewe.de">REWE </a>'} ,
            {externalGraphic: 'img/m6.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);

var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.398497099999881 ,49.01070080000016).transform(epsg4326, projectTo),
            {description:'<a href="http://www.aldi.com/">ALDI </a>'} ,
            {externalGraphic: 'img/m6.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature);


var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.438697061361394 ,49.00952325000012).transform(epsg4326, projectTo),
            {description:'<a href="http://www.aldi.com/">ALDI </a>'} ,
            {externalGraphic: 'img/m6.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20   }
        );    
    vectorLayer.addFeatures(feature); 
  
  
  /*  var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.383974 ,49.010908 ).transform(epsg4326, projectTo),
            {description:'This is the value of<br>the description attribute'} ,
            {externalGraphic: 'img/marker2.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);
    
    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.394156 ,49.014736  ).transform(epsg4326, projectTo),
            {description:'Big Ben'} ,
            {externalGraphic: 'img/marker3.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 8.400604 ,49.009880 ).transform(epsg4326, projectTo),
            {description:'London Eye'} ,
            {externalGraphic: 'img/marker4.png', graphicHeight: 35, graphicWidth: 35, graphicXOffset:-12, graphicYOffset:-20  }
        );    
    vectorLayer.addFeatures(feature);

   
    map.addLayer(vectorLayer);
 
    */
	
    //Add a selector control to the vectorLayer with popup functions
    var controls = {
      selector: new OpenLayers.Control.SelectFeature(vectorLayer, { onSelect: createPopup, onUnselect: destroyPopup })
    };

    function createPopup(feature) {
      feature.popup = new OpenLayers.Popup.FramedCloud("pop",
          feature.geometry.getBounds().getCenterLonLat(),
          null,
          '<div class="markerContent">'+feature.attributes.description+'</div>',
          null,
          true,
          function() { controls['selector'].unselectAll(); }
      );
      //feature.popup.closeOnMove = true;
      map.addPopup(feature.popup);
    }

    function destroyPopup(feature) {
      feature.popup.destroy();
      feature.popup = null;
    }
    
    map.addControl(controls['selector']);
    controls['selector'].activate();
  
  </script>
  
  
   
  
  
 </div> <!---Div Wrapper END->
</body>

</html>
