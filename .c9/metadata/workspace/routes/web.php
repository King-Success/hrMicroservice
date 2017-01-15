{"filter":false,"title":"web.php","tooltip":"/routes/web.php","undoManager":{"mark":49,"position":49,"stack":[[{"start":{"row":129,"column":46},"end":{"row":129,"column":47},"action":"insert","lines":["\\"],"id":3}],[{"start":{"row":129,"column":47},"end":{"row":129,"column":48},"action":"insert","lines":["\\"],"id":4}],[{"start":{"row":129,"column":47},"end":{"row":129,"column":48},"action":"remove","lines":["\\"],"id":5}],[{"start":{"row":129,"column":46},"end":{"row":129,"column":47},"action":"remove","lines":["\\"],"id":6}],[{"start":{"row":129,"column":45},"end":{"row":129,"column":46},"action":"remove","lines":["o"],"id":7}],[{"start":{"row":129,"column":44},"end":{"row":129,"column":45},"action":"remove","lines":["f"],"id":8}],[{"start":{"row":129,"column":43},"end":{"row":129,"column":44},"action":"remove","lines":["n"],"id":9}],[{"start":{"row":129,"column":42},"end":{"row":129,"column":43},"action":"remove","lines":["i"],"id":10}],[{"start":{"row":113,"column":42},"end":{"row":113,"column":43},"action":"remove","lines":["o"],"id":11}],[{"start":{"row":113,"column":41},"end":{"row":113,"column":42},"action":"remove","lines":["f"],"id":12}],[{"start":{"row":113,"column":40},"end":{"row":113,"column":41},"action":"remove","lines":["n"],"id":13}],[{"start":{"row":113,"column":39},"end":{"row":113,"column":40},"action":"remove","lines":["i"],"id":14}],[{"start":{"row":147,"column":46},"end":{"row":147,"column":47},"action":"remove","lines":["o"],"id":15}],[{"start":{"row":147,"column":45},"end":{"row":147,"column":46},"action":"remove","lines":["f"],"id":16}],[{"start":{"row":147,"column":44},"end":{"row":147,"column":45},"action":"remove","lines":["n"],"id":17}],[{"start":{"row":147,"column":43},"end":{"row":147,"column":44},"action":"remove","lines":["i"],"id":18}],[{"start":{"row":156,"column":48},"end":{"row":156,"column":49},"action":"remove","lines":["o"],"id":19}],[{"start":{"row":156,"column":47},"end":{"row":156,"column":48},"action":"remove","lines":["f"],"id":20}],[{"start":{"row":156,"column":46},"end":{"row":156,"column":47},"action":"remove","lines":["n"],"id":21}],[{"start":{"row":156,"column":45},"end":{"row":156,"column":46},"action":"remove","lines":["i"],"id":22}],[{"start":{"row":165,"column":42},"end":{"row":165,"column":43},"action":"remove","lines":["o"],"id":23}],[{"start":{"row":165,"column":41},"end":{"row":165,"column":42},"action":"remove","lines":["f"],"id":24}],[{"start":{"row":165,"column":40},"end":{"row":165,"column":41},"action":"remove","lines":["n"],"id":25}],[{"start":{"row":165,"column":39},"end":{"row":165,"column":40},"action":"remove","lines":["i"],"id":26}],[{"start":{"row":174,"column":53},"end":{"row":174,"column":54},"action":"remove","lines":["o"],"id":27}],[{"start":{"row":174,"column":52},"end":{"row":174,"column":53},"action":"remove","lines":["f"],"id":28}],[{"start":{"row":174,"column":51},"end":{"row":174,"column":52},"action":"remove","lines":["n"],"id":29}],[{"start":{"row":174,"column":50},"end":{"row":174,"column":51},"action":"remove","lines":["i"],"id":30}],[{"start":{"row":224,"column":96},"end":{"row":225,"column":0},"action":"insert","lines":["",""],"id":35}],[{"start":{"row":225,"column":0},"end":{"row":226,"column":0},"action":"insert","lines":["",""],"id":36}],[{"start":{"row":226,"column":0},"end":{"row":233,"column":3},"action":"insert","lines":["Route::group(['prefix' => 'tax'], function() {","    Route::get('/', 'TaxController@index')->name('tax_index');","    Route::get('/create', 'TaxController@create')->name('create_tax');","    Route::post('/create', 'TaxController@store')->name('store_tax');","    Route::get('/{id}/edit', 'TaxController@edit')->name('edit_tax');","    Route::put('/{id}/edit', 'TaxController@update')->name('update_tax');","    Route::get('/{id}/delete', 'TaxController@delete')->name('delete_tax');","});"],"id":37}],[{"start":{"row":233,"column":3},"end":{"row":234,"column":0},"action":"insert","lines":["",""],"id":42}],[{"start":{"row":234,"column":0},"end":{"row":235,"column":0},"action":"insert","lines":["",""],"id":43}],[{"start":{"row":235,"column":0},"end":{"row":242,"column":3},"action":"insert","lines":["Route::group(['prefix' => 'employeepension', 'middleware' => ['auth']], function() {","    // Route::get('/', 'EmployeePensionController@index')->name('employeepensioninfo_index');","    // Route::get('/create', 'EmployeePensionController@create')->name('create_employeepensioninfo');","    Route::post('/create', 'EmployeePensionController@store')->name('store_employeepensioninfo');","    // Route::get('/{id}/edit', 'EmployeePensionController@edit')->name('edit_employeepensioninfo');","    // Route::put('/{id}/edit', 'EmployeePensionController@update')->name('update_employeepensioninfo');","    // Route::get('/{id}/delete', 'EmployeePensionController@delete')->name('delete_employeepensioninfo');","});"],"id":44}],[{"start":{"row":233,"column":3},"end":{"row":234,"column":0},"action":"insert","lines":["",""],"id":45}],[{"start":{"row":234,"column":0},"end":{"row":235,"column":0},"action":"insert","lines":["",""],"id":46}],[{"start":{"row":235,"column":0},"end":{"row":242,"column":3},"action":"insert","lines":["Route::group(['prefix' => 'employeetax'], function() {","    Route::get('/', 'EmployeeTaxController@index')->name('employeetax_index');","    Route::get('/create', 'EmployeeTaxController@create')->name('create_employeetax');","    Route::post('/create', 'EmployeeTaxController@store')->name('store_employeetax');","    Route::get('/{id}/edit', 'EmployeeTaxController@edit')->name('edit_employeetax');","    Route::put('/{id}/edit', 'EmployeeTaxController@update')->name('update_employeetax');","    Route::get('/{id}/delete', 'EmployeeTaxController@delete')->name('delete_employeetax');","});"],"id":47}],[{"start":{"row":236,"column":4},"end":{"row":236,"column":7},"action":"insert","lines":["// "],"id":48}],[{"start":{"row":237,"column":4},"end":{"row":237,"column":7},"action":"insert","lines":["// "],"id":49}],[{"start":{"row":239,"column":4},"end":{"row":239,"column":7},"action":"insert","lines":["// "],"id":50}],[{"start":{"row":240,"column":4},"end":{"row":240,"column":7},"action":"insert","lines":["// "],"id":51}],[{"start":{"row":241,"column":4},"end":{"row":241,"column":7},"action":"insert","lines":["// "],"id":52}],[{"start":{"row":244,"column":0},"end":{"row":251,"column":3},"action":"remove","lines":["Route::group(['prefix' => 'employeepension', 'middleware' => ['auth']], function() {","    // Route::get('/', 'EmployeePensionController@index')->name('employeepensioninfo_index');","    // Route::get('/create', 'EmployeePensionController@create')->name('create_employeepensioninfo');","    Route::post('/create', 'EmployeePensionController@store')->name('store_employeepensioninfo');","    // Route::get('/{id}/edit', 'EmployeePensionController@edit')->name('edit_employeepensioninfo');","    // Route::put('/{id}/edit', 'EmployeePensionController@update')->name('update_employeepensioninfo');","    // Route::get('/{id}/delete', 'EmployeePensionController@delete')->name('delete_employeepensioninfo');","});"],"id":53}],[{"start":{"row":243,"column":0},"end":{"row":244,"column":0},"action":"remove","lines":["",""],"id":54}],[{"start":{"row":242,"column":3},"end":{"row":243,"column":0},"action":"remove","lines":["",""],"id":55}],[{"start":{"row":226,"column":31},"end":{"row":226,"column":57},"action":"insert","lines":[", 'middleware' => ['auth']"],"id":56}],[{"start":{"row":235,"column":39},"end":{"row":235,"column":65},"action":"insert","lines":[", 'middleware' => ['auth']"],"id":57}],[{"start":{"row":232,"column":4},"end":{"row":232,"column":7},"action":"insert","lines":["// "],"id":58}],[{"start":{"row":228,"column":4},"end":{"row":228,"column":7},"action":"insert","lines":["// "],"id":59}],[{"start":{"row":123,"column":4},"end":{"row":123,"column":7},"action":"insert","lines":["// "],"id":60}]]},"ace":{"folds":[],"scrolltop":1707.501480102539,"scrollleft":0,"selection":{"start":{"row":123,"column":32},"end":{"row":123,"column":32},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":108,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1484482179319,"hash":"2367dfa71678ef04895fe22cfc43fad17b372271"}