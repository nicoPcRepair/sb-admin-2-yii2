<?php
/**
 * forms.php
 *
 * @author Pedro Plowman
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use yii\bootstrap\Html;
use p2m\helpers\FA;

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;


p2m\sbAdmin\assets\SBAdmin2Asset::register($this);

// DEMO ONLY _DON'T_ use this in your production copy.

/* @var $this yii\web\View */

$this->title = 'Forms';
?>
<div id="content-wrapper">

	<!-- ### NOTE ### - 1 or more naked rows go in here -->

	
	<div class="row">
		<div class="col-lg-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					Basic Form Elements
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form role="form">
								<div class="form-group">
									<label>Text Input</label>
									<input class="form-control">
									<p class="help-block">Example block-level help text here.</p>
								</div>
								<button type="submit" class="btn btn-default">Submit Button</button>
								<button type="reset" class="btn btn-default">Reset Button</button>
							</form>
						</div><!-- /.col-lg-6 (nested) -->
						<div class="col-lg-3">
							<?php

							$coord = new LatLng(['lat' => 39.720089311812094, 'lng' => 2.91165944519042]);
							$map = new Map([
							    'center' => $coord,
							    'zoom' => 14,
							]);

							/*NB>>see details in class Map in vendor\2amigos/yii2-google-maps-library*/
							$map->width = 400;
							$map->height = 400;

							// lets use the directions renderer
							$home = new LatLng(['lat' => 39.720991014764536, 'lng' => 2.911801719665541]);
							$school = new LatLng(['lat' => 39.719456079114956, 'lng' => 2.8979293346405166]);
							$santo_domingo = new LatLng(['lat' => 39.72118906848983, 'lng' => 2.907628202438368]);

							// setup just one waypoint (Google allows a max of 8)
							$waypoints = [
							    new DirectionsWayPoint(['location' => $santo_domingo])
							];

							$directionsRequest = new DirectionsRequest([
							    'origin' => $home,
							    'destination' => $school,
							    'waypoints' => $waypoints,
							    'travelMode' => TravelMode::DRIVING
							]);

							// Lets configure the polyline that renders the direction
							$polylineOptions = new PolylineOptions([
							    'strokeColor' => '#FFAA00',
							    'draggable' => true
							]);

							// Now the renderer
							$directionsRenderer = new DirectionsRenderer([
							    'map' => $map->getName(),
							    'polylineOptions' => $polylineOptions
							]);

							// Finally the directions service
							$directionsService = new DirectionsService([
							    'directionsRenderer' => $directionsRenderer,
							    'directionsRequest' => $directionsRequest
							]);

							// Thats it, append the resulting script to the map
							$map->appendScript($directionsService->getJs());

							// Lets add a marker now
							$marker = new Marker([
							    'position' => $coord,
							    'title' => 'My Home Town',
							]);

							// Provide a shared InfoWindow to the marker
							$marker->attachInfoWindow(
							    new InfoWindow([
							        'content' => '<p>This is my super cool content</p>'
							    ])
							);

							// Add marker to the map
							$map->addOverlay($marker);

							// Now lets write a polygon
							$coords = [
							    new LatLng(['lat' => 25.774252, 'lng' => -80.190262]),
							    new LatLng(['lat' => 18.466465, 'lng' => -66.118292]),
							    new LatLng(['lat' => 32.321384, 'lng' => -64.75737]),
							    new LatLng(['lat' => 25.774252, 'lng' => -80.190262])
							];

							$polygon = new Polygon([
							    'paths' => $coords
							]);

							// Add a shared info window
							$polygon->attachInfoWindow(new InfoWindow([
							        'content' => '<p>This is my super cool Polygon</p>'
							    ]));

							// Add it now to the map
							$map->addOverlay($polygon);


							// Lets show the BicyclingLayer :)
							$bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

							// Append its resulting script
							$map->appendScript($bikeLayer->getJs());

							// Display the map -finally :)
							echo $map->display();

							?>
						</div>
					</div><!-- /.row (nested) -->
				</div><!-- /.panel-body -->
			</div><!-- /.panel -->

		</div>
	</div>

	<!-- /### NOTE ### -->

	<!-- this goes on every site file in p2made demos -->
	<br><div class="alert alert-success" role="alert">
		<ul class="fa-ul">
			<li>
				<?= FA::fw(FA::_CODE)->li()->size(FA::SIZE_LARGE) ?> <code><?= __FILE__ ?></code>
			</li>
		</ul>
	</div>

</div><!-- /#content-wrapper -->
