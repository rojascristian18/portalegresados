<?php
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

Router::connect('/admin', array('controller' => 'administradores', 'action' => 'index', 'admin' => true));
Router::connect('/admin/login', array('controller' => 'administradores', 'action' => 'login', 'admin' => true));

Router::connect('/businesses', array('controller' => 'empresas', 'action' => 'index', 'businesses' => true));
Router::connect('/businesses/registro', array('controller' => 'empresas', 'action' => 'registro', 'businesses' => true));
Router::connect('/businesses/recuperarclave', array('controller' => 'empresas', 'action' => 'recuperarclave', 'businesses' => true));
Router::connect('/businesses/login', array('controller' => 'empresas', 'action' => 'login', 'businesses' => true));

Router::connect('/graduate', array('controller' => 'usuarios', 'action' => 'index', 'graduate' => true));
Router::connect('/graduate/login', array('controller' => 'usarios', 'action' => 'login', 'graduate' => true));

Router::connect('/seccion/*', array('controller' => 'pages', 'action' => 'display'));

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
