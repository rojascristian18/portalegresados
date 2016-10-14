<?php
App::uses('CakeEventManager', 'Event');
App::uses('EmpleoListener', 'Lib/Event');

CakeEventManager::instance()->attach(new EmpleoListener());
