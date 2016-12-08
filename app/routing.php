<?php

/*
 * ADMIN ROUTING
 */

$app->get('/', function($request, $response, $agrs) {
    $controller = new Pangeran\ExampleBundle\FooController;
    return $controller->foo($request, $response, $agrs);
});

$app->get('/admin', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Auth;
    return $controller->dashboard($request, $response, $agrs);
});

/*
 * ADMIN AUTH
 */

$app->get('/admin/login', function($request, $response, $agrs) {
    $controller = new Pangeran\AdminBundle\Controller\AuthController;
    return $controller->login($request, $response, $agrs);
});

$app->post('/admin/login', function($request, $response, $agrs) {
    $controller = new Pangeran\AdminBundle\Controller\AuthController;
    return $controller->_login($request, $response, $agrs);
});

/*
 * ADMIN MOBIL
 */

$app->get('/admin/mobil', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->index($request, $response, $agrs);
});

$app->get('/admin/mobil/add', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->add($request, $response, $agrs);
});

$app->post('/admin/mobil/add', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->_add($request, $response, $agrs);
});

$app->post('/admin/mobil/upload/{extension}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->_upload($request, $response, $agrs);
});

$app->post('/admin/mobil/delete', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->_delete($request, $response, $agrs);
});

$app->get('/admin/mobil/edit/{id}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->edit($request, $response, $agrs);
});

$app->post('/admin/mobil/edit/{id}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->_edit($request, $response, $agrs);
});

$app->get('/admin/mobil/terdp/{id}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->terdp($request, $response, $agrs);
});

$app->get('/admin/mobil/soldout/{id}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\MobilController;
    return $controller->soldout($request, $response, $agrs);
});

/*
 * ADMIN SPONSOR
 */

$app->get('/admin/sponsor', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\SponsorController;
    return $controller->index($request, $response, $agrs);
});

$app->get('/admin/sponsor/add', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\SponsorController;
    return $controller->add($request, $response, $agrs);
});

$app->post('/admin/sponsor/add', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\SponsorController;
    return $controller->_add($request, $response, $agrs);
});

$app->get('/admin/sponsor/edit/{id}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\SponsorController;
    return $controller->edit($request, $response, $agrs);
});

$app->post('/admin/sponsor/edit/{id}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\SponsorController;
    return $controller->_edit($request, $response, $agrs);
});

$app->post('/admin/sponsor/delete', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\SponsorController;
    return $controller->_delete($request, $response, $agrs);
});


$app->post('/admin/sponsor/upload', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\SponsorController;
    return $controller->_upload($request, $response, $agrs);
});

/*
 * ADMIN NEWS
 */
$app->get('/admin/news', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->index($request, $response, $agrs);
});

$app->get('/admin/news/add', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->add($request, $response, $agrs);
});

$app->post('/admin/news/add', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->_add($request, $response, $agrs);
});

$app->get('/admin/news/edit/{id}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->edit($request, $response, $agrs);
});

$app->post('/admin/news/edit/{id}', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->_edit($request, $response, $agrs);
});

$app->post('/admin/news/delete', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->_delete($request, $response, $agrs);
});

$app->get('/admin/about', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->edit($request, $response, $agrs, true);
});

$app->post('/admin/about', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->_edit($request, $response, $agrs, true);
});


$app->post('/admin/news/upload', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\NewsController;
    return $controller->_upload($request, $response, $agrs);
});

/* ADMIN PASSWORD */

$app->get('/admin/sign-out', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\AuthController;
    return $controller->signout($request, $response, $agrs, true);
});

$app->get('/admin/password', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\AuthController;
    return $controller->changePassword($request, $response, $agrs, true);
});

$app->post('/admin/password', function($request, $response, $agrs) {
    isAdmin();
    $controller = new Pangeran\AdminBundle\Controller\AuthController;
    return $controller->_changePassword($request, $response, $agrs, true);
});

/*
 * API ROUTING
 */

$app->get('/api/mobil', function($request, $response, $agrs) {
    $controller = new Pangeran\ApiBundle\Controller\MobilApiController;
    return $controller->getMobil($request, $response, $agrs);
});

$app->get('/api/news', function($request, $response, $agrs) {
    $controller = new Pangeran\ApiBundle\Controller\NewsApiController;
    return $controller->getNews($request, $response, $agrs);
});

$app->get('/api/single/news', function($request, $response, $agrs) {
    $controller = new Pangeran\ApiBundle\Controller\NewsApiController;
    return $controller->getSingleNews($request, $response, $agrs);
});

$app->get('/api/aboutus', function($request, $response, $agrs) {
    $controller = new Pangeran\ApiBundle\Controller\AboutUsApiController;
    return $controller->getAboutUs($request, $response, $agrs);
});

$app->get('/api/merek', function($request, $response, $agrs) {
    $controller = new Pangeran\ApiBundle\Controller\MobilApiController;
    return $controller->getMerek($request, $response, $agrs);
});

$app->get('/api/sponsor', function($request, $response, $agrs) {
    $controller = new Pangeran\ApiBundle\Controller\SponsorApiController;
    return $controller->getSponsor($request, $response, $agrs);
});
