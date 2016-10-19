<?php
App::uses('CakeEventManager', 'Event');
App::uses('EmpleoListener', 'Lib/Event');
App::uses('RecuperarClaveListener', 'Lib/Event');

CakeEventManager::instance()->attach(new EmpleoListener());
CakeEventManager::instance()->attach(new RecuperarClaveListener());