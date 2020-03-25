<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
   integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
   crossorigin=""/>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/nezasa/iso8601-js-period/master/iso8601.min.js"></script>
<script type="text/javascript" src="http://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.js"></script>
<script type="text/javascript" src="http://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.util.js"></script>
<script type="text/javascript" src="http://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.layer.js"></script>
<script type="text/javascript" src="http://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.layer.wms.js"></script>
<script type="text/javascript" src="http://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.layer.geojson.js"></script>
<script type="text/javascript" src="hhttp://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.player.js"></script>
<script type="text/javascript" src="hhttp://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.control.js"></script>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<title>Rothamsted Site Meteorological Metadata</title>
<body onLoad="MM_preloadImages('Images/Park Grass.png.PNG')">
<h1>Rothamsted Site Meteorological Metadata</h1>

<p>Summary metadata for Rothamsted. All figures are based on the ROTHMET dataset available from the e-RA Data Extraction Tool.</p>

<p><a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="out"><img style="width:50px;"  alt="Creative Commons License"  
src="includes/cc4.png" align="middle" /></a> This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>
<ul>
<li><A href="<?php echo $request; ?>#SEC1">Temperature</A> </li>
<li><A href="<?php echo $request; ?>#SEC2">Precipitation</A> </li>
<li><A href="<?php echo $request; ?>#SEC3">Wind</A> </li>
<li><A href="<?php echo $request; ?>#SEC4">Sunshine</A> </li>
<li><A href="<?php echo $request; ?>#SEC5">Total Radiation</A></li>
<li><A href="<?php echo $request; ?>#SEC6">Relative humidity</A> </li>
</ul>

<A id="SEC1"></a>
<h2>Temperature:</h2>
<h3>Average temperature for 1986 to 2015 showing minimum and maximum and long-term averages</h3>
<style>
 #mapid { height: 700px; }
</style>
<div id="mapid"></div>
<script>


var map = L.map('mapid',{
	zoom: 19,
	timeDimension: true,
	timeDimensionOptions: {
		timeInterval: "1844-01-01/2014-10-30",
		period: "PT1H"
	},
	timeDimensionControl: true
}); 

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

$.getJSON("http://local-info.rothamsted.ac.uk/eRA/tera/home/allgj.geojson", function(data) {
	var geojson = L.geoJson(data, {
      onEachFeature: function (feature, layer) {
        layer.bindPopup(feature.properties.Serial);
      }
    });
	map.fitBounds(geojson.getBounds());
	
	var testTimeLayer = L.timeDimension.layer.GeoJson(geojson);
	testTimeLayer.addTo(map);
	
	geojson.addTo(map);
});

/* 
var mymap =  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 20
});

$.getJSON("http://local-info.rothamsted.ac.uk/eRA/tera/home/allgj.geojson", function(data) {
    
    var nmap = L.map('mapid',{
		zoom: 10,
		timeDimension: true,
		timeDimensionOptions: {
			timeInterval: "1844-01-01/2014-10-30",
			period: "PY10y"
		},
		timeDimensionControl: true
	}).fitBounds(geojson.getBounds());
    mymap.addTo(nmap);
    geojson.addTo(nmap);
  });
 */
</script>
<p><a href="<?php echo $request; ?>#top">Back to top</a></p>
<p> <A id="pixies"></a>
<div id="pixies">
