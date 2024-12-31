<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'options'], static function (RouteCollection $routes): void {
    $routes->options('mapsproduksi', '\Dummy');
    $routes->options('mapsproduksi/(:any)', '\Dummy');
    $routes->options('maps', '\Dummy');
    $routes->options('maps/(:any)', '\Dummy');
    $routes->options('/', '\Dummy');
    $routes->resource('mapsproduksi');
});

$uri = service('uri');
$rute = ucfirst($uri->getSegment(1));

$routes->get('/', 'Dashboard::index');
$routes->get('/produksi', $rute.'::index');
$routes->get('/produksidetail', 'ProduksiDetail::index');
$routes->get('/produksidetail/(:any)', 'ProduksiDetail::index');

$routes->get('/orcl', 'Orcl::index');

$routes->get('/produksiafd', 'ProduksiAfd::index');
$routes->get('/produksiafd/(:any)', 'ProduksiAfd::index/$1');

$routes->get('/produksidetailafd', 'ProduksiDetailAfd::index');
$routes->get('/produksidetailafd/(:any)', 'ProduksiDetailAfd::index/$1');


$routes->get('/listafd', 'ListAfdController::index');
$routes->get('/listafdrestan', 'ListAfdRestanController::index');
$routes->get('/listbloks', 'ListBlokController::index');
$routes->get('/listblok/(:any)', 'ListBlokController::listBlok/$1');

$routes->get('/produksidetail2/(:any)', 'ProduksiDetail2::index/$1');
$routes->get('/produksidetail2index', 'ProduksiDetail2Index::index');
$routes->get('/produksidetail2modal/(:any)', 'ProduksiDetail2Modal::index/$1');

$routes->get('/restan', 'Restan::index');
$routes->get('/restandata', 'RestanData::index');
$routes->get('/restandata/(:any)', 'RestanData::index/$1');

$routes->get('/restandetaildata/(:any)', 'RestanDetailData::index/$1');

$routes->get('/restandetail', 'RestanDetail::index');
$routes->get('/restandetail/(:any)', 'RestanDetail::index/$1');
$routes->get('/restandetail2/(:any)', 'RestanDetail2::index/$1');

$routes->get('/sab', 'Sab::index');
$routes->get('/sabdata', 'SabData::index');
$routes->get('/sabdata/(:any)', 'SabData::index/$1');
$routes->get('/sabdetail2/(:any)', 'SabDetail2::index/$1');

$routes->get('/ktph', 'Ktph::index');
$routes->get('/ktphdata', 'KtphData::index');
$routes->get('/ktphdata/(:any)', 'KtphData::index/$1');

$routes->get('/ktphdetail2', 'KtphDetail2::index/');
$routes->get('/ktphdetail2/(:any)', 'KtphDetail2::index/$1');

$routes->get('/qrktph/(:any)', 'Qrcode\QrKtph::index/$1');

//$routes->get('/mapsproduksi', 'MapsProduksi::index');
$routes->get('/mapsproduksidata/(:any)', 'Mapsproduksidata::getMapsMarkerData/$1');

