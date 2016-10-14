<?php
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

Router::connect('/admin', array('controller' => 'administradores', 'action' => 'index', 'admin' => true));
Router::connect('/admin/login', array('controller' => 'administradores', 'action' => 'login', 'admin' => true));

Router::connect('/job', array('controller' => 'empresas', 'action' => 'index', 'job' => true));
Router::connect('/job/registro', array('controller' => 'empresas', 'action' => 'registro', 'job' => true));
Router::connect('/job/login', array('controller' => 'empresas', 'action' => 'login', 'job' => true));

Router::connect('/student', array('controller' => 'usuarios', 'action' => 'index', 'student' => true));
Router::connect('/student/login', array('controller' => 'usarios', 'action' => 'login', 'student' => true));

Router::connect('/seccion/*', array('controller' => 'pages', 'action' => 'display'));

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
