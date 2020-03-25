<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
   integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
   crossorigin=""/>
<link rel="stylesheet" href="http://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.control.css" />
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
<script type="text/javascript" src="http://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.player.js"></script>
<script type="text/javascript" src="http://local-info.rothamsted.ac.uk/eRA/tera/home/leafletTime/leaflet.timedimension.control.js"></script>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<title>Broadbalk Plot Map</title>
<body onLoad="MM_preloadImages('Images/Park Grass.png.PNG')">
<h1>Broadbalk Plot Map</h1>

<p>Broadbalk Plot Map showing changes over time	.</p>

<p><a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="out"><img style="width:50px;"  alt="Creative Commons License"  
src="includes/cc4.png" align="middle" /></a> This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>

<A id="SEC1"></a>
<h2>Temperature:</h2>
<h3>Average temperature for 1986 to 2015 showing minimum and maximum and long-term averages</h3>
<style>
 #map { height: 700px; width:99%;}
</style>
<div id="map"></div>
<script>

L.TimeDimension.Layer.CDrift = L.TimeDimension.Layer.GeoJson.extend({

    // CDrift data has property time in seconds, not in millis.
    _getFeatureTimes: function(feature) {
        if (!feature.properties) {
            return [];
        }
        if (feature.properties.hasOwnProperty('coordTimes')) {
            return feature.properties.coordTimes;
        }
        if (feature.properties.hasOwnProperty('times')) {
		console.log('hello: ' +feature.properties.times);
            return feature.properties.times.split(',');
        }
        if (feature.properties.hasOwnProperty('linestringTimestamps')) {
            return feature.properties.linestringTimestamps;
        }
        if (feature.properties.hasOwnProperty('time')) {
            return [feature.properties.time * 1000];
        }
        return [];
    },

    // Do not modify features. Just return the feature if it intersects
    // the time interval
    _getFeatureBetweenDates: function(feature, minTime, maxTime) {
        var featureStringTimes = this._getFeatureTimes(feature);
        if (featureStringTimes.length == 0) {
            return feature;
        }
        var featureTimes = [];
        for (var i = 0, l = featureStringTimes.length; i < l; i++) {
            var time = featureStringTimes[i]
            if (typeof time == 'string' || time instanceof String) {
                time = Date.parse(time.trim());
            }
            featureTimes.push(time);
        }

        if (featureTimes[0] > maxTime || featureTimes[l - 1] < minTime) {
            return null;
        }
        return feature;
    },

});

L.timeDimension.layer.cDrift = function(layer, options) {
    return new L.TimeDimension.Layer.CDrift(layer, options);
};

var startDate = new Date();
startDate.setUTCHours(0, 0, 0, 0);

var map = L.map('map', {
    zoom: 20,
    fullscreenControl: true,
    timeDimensionControl: true,
    timeDimensionControlOptions: {
        position: 'bottomleft',
        autoPlay: false,
        timeSlider: true,
        loopButton: true,
        playerOptions: {
            transitionTime: 125,
            loop: false,
        }
    },
    timeDimension: true,
    center: [51.809464,-0.372865]
});

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

$.getJSON('http://local-info.rothamsted.ac.uk/eRA/tera/home/allgj.geojson', function(data) {
    var cdriftLayer = L.geoJson(data, {
        style: function(feature) {
            var color = "#FFFF00";
			if (feature.properties.sequence == '1') {
                color = "#00ffbf";
            } else if (feature.properties.confidence == '2') {
                color = "#00ffff";
            } else if (feature.properties.confidence == '3') {
                color = "#00bfff";
            } else {
				color = "#ff0000";
			}
            return {
                "color": color,
                "weight": 2,
                "opacity": 0.4
            };
        }
    });

    var cdriftTimeLayer = L.timeDimension.layer.cDrift(cdriftLayer, {
        updateTimeDimension: true,
        updateTimeDimensionMode: 'replace',
        addlastPoint: false,
        duration: 'P5Y',
    });
    cdriftTimeLayer.addTo(map);
    map.fitBounds(cdriftLayer.getBounds());

    /*var cDriftLegend = L.control({
        position: 'bottomright'
    });
     cDriftLegend.onAdd = function(map) {
        var div = L.DomUtil.create('div', 'info legend');
        div.innerHTML += '<ul><li class="p05">50% probability</li><li class="p075">75% probability</li><li class="p09">90% probability</li></ul>';
        return div;
    }; 
    cDriftLegend.addTo(map);*/

    map.timeDimension.on('timeload', function(data) {
        var date = new Date(map.timeDimension.getCurrentTime());
        if (data.time == map.timeDimension.getCurrentTime()) {
            var totalTimes = map.timeDimension.getAvailableTimes().length;
            var position = map.timeDimension.getAvailableTimes().indexOf(data.time);
            $(map.getContainer()).find('.animation-progress-bar').width((position*100)/totalTimes + "%");
            // update map bounding box
            map.fitBounds(cdriftTimeLayer.getBounds());
        }
    });

});
/* 
var sorrento = L.circleMarker([39.6145, 1.99363], {
    color: '#FFFFFF',
    fillColor: "#f28f43",
    fillOpacity: 1,
    radius: 5,
    weight: 2
}).addTo(map); */


/* var baseLayers = getCommonBaseLayers(map); // see baselayers.js
L.control.layers(baseLayers, {}).addTo(map); */
</script>
<p><a href="<?php echo $request; ?>#top">Back to top</a></p>
<p> <A id="pixies"></a>
<div id="pixies">
