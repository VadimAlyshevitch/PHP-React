<?php
require "libs/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=todo',
        'root');
session_start();