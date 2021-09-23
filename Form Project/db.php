<?php
$pdo = new PDO('mysql:dbname=leoni;host=localhost', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::Attr_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);