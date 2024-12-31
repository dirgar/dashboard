var highlightLayer;
function highlightFeature(e) {
	highlightLayer = e.target;

	if (e.target.feature.geometry.type === 'LineString' || e.target.feature.geometry.type === 'MultiLineString') {
		highlightLayer.setStyle({
		color: '#ffff00',
		});
	} else {
		highlightLayer.setStyle({
		fillColor: '#ffff00',
		fillOpacity: 1
		});
	}
}
var map = L.map('map', {
	zoomControl:false, maxZoom:28, minZoom:1
}).fitBounds([[-2.120697078614069,111.20542229920403],[-2.0818482848455906,111.32547383483444]]);
var hash = new L.Hash(map);
map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
// remove popup's row if "visible-with-data"
function removeEmptyRowsFromPopupContent(content, feature) {
	var tempDiv = document.createElement('div');
	tempDiv.innerHTML = content;
	var rows = tempDiv.querySelectorAll('tr');
	for (var i = 0; i < rows.length; i++) {
		var td = rows[i].querySelector('td.visible-with-data');
		var key = td ? td.id : '';
		if (td && td.classList.contains('visible-with-data') && feature.properties[key] == null) {
			rows[i].parentNode.removeChild(rows[i]);
		}
	}
	return tempDiv.innerHTML;
}
// add class to format popup if it contains media
function addClassToPopupIfMedia(content, popup) {
	var tempDiv = document.createElement('div');
	tempDiv.innerHTML = content;
	if (tempDiv.querySelector('td img')) {
		popup._contentNode.classList.add('media');
			// Delay to force the redraw
			setTimeout(function() {
				popup.update();
			}, 10);
	} else {
		popup._contentNode.classList.remove('media');
	}
}
var zoomControl = L.control.zoom({
	position: 'topleft'
}).addTo(map);
L.control.locate({locateOptions: {maxZoom: 19}}).addTo(map);
var measureControl = new L.Control.Measure({
	position: 'topleft',
	primaryLengthUnit: 'meters',
	secondaryLengthUnit: 'kilometers',
	primaryAreaUnit: 'sqmeters',
	secondaryAreaUnit: 'hectares'
});
measureControl.addTo(map);
document.getElementsByClassName('leaflet-control-measure-toggle')[0].innerHTML = '';
document.getElementsByClassName('leaflet-control-measure-toggle')[0].className += ' fas fa-ruler';
var bounds_group = new L.featureGroup([]);
function setBounds() {
}
function pop_Master_Blok_2025_SMG_0(feature, layer) {
	layer.on({
		mouseout: function(e) {
			for (var i in e.target._eventParents) {
				if (typeof e.target._eventParents[i].resetStyle === 'function') {
					e.target._eventParents[i].resetStyle(e.target);
				}
			}
		},
		mouseover: highlightFeature,

	});
	var popupContent = '<table>\
			<tr>\
				<th scope="row">BLOK</th>\
				<td>' + (feature.properties['BLOK'] !== null ? autolinker.link(feature.properties['BLOK'].toLocaleString()) : '') + '</td>\
			</tr>\
			<tr>\
				<th scope="row">KEBUN</th>\
				<td>' + (feature.properties['KEBUN'] !== null ? autolinker.link(feature.properties['KEBUN'].toLocaleString()) : '') + '</td>\
			</tr>\
			<tr>\
				<th scope="row">AFDELING</th>\
				<td>' + (feature.properties['AFDELING'] !== null ? autolinker.link(feature.properties['AFDELING'].toLocaleString()) : '') + '</td>\
			</tr>\
			<tr>\
				<th scope="row">LUAS</th>\
				<td>' + (feature.properties['LUAS'] !== null ? autolinker.link(feature.properties['LUAS'].toLocaleString()) : '') + '</td>\
			</tr>\
		</table>';
	var content = removeEmptyRowsFromPopupContent(popupContent, feature);
	layer.on('popupopen', function(e) {
		addClassToPopupIfMedia(content, e.popup);
	});
	layer.bindPopup(content, { maxHeight: 400 });
}

function style_Master_Blok_2025_SMG_0_0() {
	return {
		pane: 'pane_Master_Blok_2025_SMG_0',
		opacity: 1,
		color: 'rgba(35,35,35,1.0)',
		dashArray: '',
		lineCap: 'butt',
		lineJoin: 'miter',
		weight: 1.0, 
		fill: true,
		fillOpacity: 1,
		fillColor: 'rgba(249,253,199,1.0)',
		interactive: true,
	}
}
map.createPane('pane_Master_Blok_2025_SMG_0');
map.getPane('pane_Master_Blok_2025_SMG_0').style.zIndex = 400;
map.getPane('pane_Master_Blok_2025_SMG_0').style['mix-blend-mode'] = 'normal';
var layer_Master_Blok_2025_SMG_0 = new L.geoJson(json_Master_Blok_2025_SMG_0, {
	attribution: '',
	interactive: true,
	dataVar: 'json_Master_Blok_2025_SMG_0',
	layerName: 'layer_Master_Blok_2025_SMG_0',
	pane: 'pane_Master_Blok_2025_SMG_0',
	onEachFeature: pop_Master_Blok_2025_SMG_0,
	style: style_Master_Blok_2025_SMG_0_0,
});
bounds_group.addLayer(layer_Master_Blok_2025_SMG_0);
map.addLayer(layer_Master_Blok_2025_SMG_0);
var osmGeocoder = new L.Control.Geocoder({
	collapsed: true,
	position: 'topleft',
	text: 'Search',
	title: 'Testing'
}).addTo(map);
document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
.className += ' fa fa-search';
document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
.title += 'Search for a place';
var overlaysTree = [
	{label: '<img src="legend/Master_Blok_2025_SMG_0.png" /> Master_Blok_2025_SMG', layer: layer_Master_Blok_2025_SMG_0},]
var lay = L.control.layers.tree(null, overlaysTree,{
	//namedToggle: true,
	//selectorBack: false,
	//closedSymbol: '&#8862; &#x1f5c0;',
	//openedSymbol: '&#8863; &#x1f5c1;',
	//collapseAll: 'Collapse all',
	//expandAll: 'Expand all',
	collapsed: false, 
});
lay.addTo(map);
document.addEventListener("DOMContentLoaded", function() {
	// set new Layers List height which considers toggle icon
	function newLayersListHeight() {
		var layerScrollbarElement = document.querySelector('.leaflet-control-layers-scrollbar');
		if (layerScrollbarElement) {
			var layersListElement = document.querySelector('.leaflet-control-layers-list');
			var originalHeight = layersListElement.style.height 
				|| window.getComputedStyle(layersListElement).height;
			var newHeight = parseFloat(originalHeight) - 50;
			layersListElement.style.height = newHeight + 'px';
		}
	}
	var isLayersListExpanded = true;
	var controlLayersElement = document.querySelector('.leaflet-control-layers');
	var toggleLayerControl = document.querySelector('.leaflet-control-layers-toggle');
	// toggle Collapsed/Expanded and apply new Layers List height
	toggleLayerControl.addEventListener('click', function() {
		if (isLayersListExpanded) {
			controlLayersElement.classList.remove('leaflet-control-layers-expanded');
		} else {
			controlLayersElement.classList.add('leaflet-control-layers-expanded');
		}
		isLayersListExpanded = !isLayersListExpanded;
		newLayersListHeight()
	});	
	// apply new Layers List height if toggle layerstree
	if (controlLayersElement) {
		controlLayersElement.addEventListener('click', function(event) {
			var toggleLayerHeaderPointer = event.target.closest('.leaflet-layerstree-header-pointer span');
			if (toggleLayerHeaderPointer) {
				newLayersListHeight();
			}
		});
	}
	// Collapsed/Expanded at Start to apply new height
	setTimeout(function() {
		toggleLayerControl.click();
	}, 10);
	setTimeout(function() {
		toggleLayerControl.click();
	}, 10);
	// Collapsed touch/small screen
	var isSmallScreen = window.innerWidth < 650;
	if (isSmallScreen) {
		setTimeout(function() {
			controlLayersElement.classList.remove('leaflet-control-layers-expanded');
			isLayersListExpanded = !isLayersListExpanded;
		}, 500);
	}  
});       
setBounds();
var i = 0;
layer_Master_Blok_2025_SMG_0.eachLayer(function(layer) {
	var context = {
		feature: layer.feature,
		variables: {}
	};
	layer.bindTooltip((layer.feature.properties['BLOK'] !== null?String('<div style="color: #323232; font-size: 10pt; font-family: \'Open Sans\', sans-serif;">' + layer.feature.properties['BLOK']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_Master_Blok_2025_SMG_0'});
	labels.push(layer);
	totalMarkers += 1;
		layer.added = true;
		addLabel(layer, i);
		i++;
});
resetLabels([layer_Master_Blok_2025_SMG_0]);
map.on("zoomend", function(){
	resetLabels([layer_Master_Blok_2025_SMG_0]);
});
map.on("layeradd", function(){
	resetLabels([layer_Master_Blok_2025_SMG_0]);
});
map.on("layerremove", function(){
	resetLabels([layer_Master_Blok_2025_SMG_0]);
});


function showModalMaps(param){
  
    $("#bodyModal").load(param, function(response,status,xhr){
        if (status == "success"){
            $("#modal-lg").modal("show");
        }
    });
}

$(function() {
	$('#jsMapsProduksi').datagrid({
		onClickRow: function(index,row){
			var tblok = row.PARAM;
			var td1 = $('#mapsDatePicker').datepicker({dateFormat: 'mm-dd-yy'}).datepicker('getDate');
		
			var tmon1 = td1.getMonth()+1;
			var tday1 = td1.getDate();
			var tyear1 = td1.getFullYear();
			var tdate = tmon1+"-"+tday1+"-"+tyear1;
			
			$.getJSON('http://10.20.10.246:8282/mapsproduksidata/'+tblok+'/'+tdate, function(data){
						
				var markers = data;
				//alert(<?php echo $tdate  ?>);
				if (markers != "400") {

					var layerGroup = markers[0][11];
					map.eachLayer(function (layer) { 
						if (layer.options.name === layerGroup) {
							alert(layerGroup);
						} 
					});

					var pentol = new L.LayerGroup();
										
					for (var i = 0; i < markers.length; i++) {
							var domelem = document.createElement('a');
							var imgfoto = markers[i][11];

							domelem.id = markers[i][0];
							domelem.id2 = markers[i][11];
							domelem.id3 = markers[i][12];
							domelem.innerHTML = "<b>TPH : "+markers[i][0]+"</b><br>Total Janjang : "+markers[i][3]+"<br>Total Brondolan : "+markers[i][4]+"<br>Jam Checking : "+markers[i][5]+"<br><a href='#' class='easyui-linkbutton c7' plain='false' iconCls='icon-reload'>Show Detail</a>";
							domelem.onclick = function() {
								showModalMaps(this.id3);
								// do whatever else you want to do - open accordion etc
							};
										
						marker = new L.marker([markers[i][1],markers[i][2]])
						.addTo(pentol)
						.addTo(map)
						.bindPopup(domelem);     
						marker.name = layerGroup;
					}
				}
			});

		}
	})
});