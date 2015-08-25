<?php

// Confirmation
Route::post('payu/confirmation', 'PayuLatamController@confirmation');
Route::get('payu/response', 'PayuLatamController@response');