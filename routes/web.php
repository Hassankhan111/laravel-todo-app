<?php

use Illuminate\Support\Facades\Route;

route::view('/','login');
route::view('/register','register');
route::view('index','index');

route::view('/dashboard','admin.Dashboard');
route::view('/task','admin.AllTask');
route::view('/complete','admin.complete');
route::view('/pending','admin.panding');
route::view('/overdue','admin.overdue');