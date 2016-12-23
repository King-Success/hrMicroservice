Route::group(['prefix' => 'employee'], function() {
    Route::get('/', 'EmployeeController@index')->name('employee_index');
    Route::get('/create', 'EmployeeController@create')->name('create_employee');
    Route::post('/create', 'EmployeeController@store')->name('store_employee');
    Route::get('/{id}/edit', 'EmployeeController@edit')->name('edit_employee');
    Route::put('/{id}/edit', 'EmployeeController@update')->name('update_employee');
    Route::get('/{id}/delete', 'EmployeeController@delete')->name('delete_employee');
});
Route::group(['prefix' => 'rank'], function() {
    Route::get('/', 'RankController@index')->name('rank_index');
    Route::get('/create', 'RankController@create')->name('create_rank');
    Route::post('/create', 'RankController@store')->name('store_rank');
    Route::get('/{id}/edit', 'RankController@edit')->name('edit_rank');
    Route::put('/{id}/edit', 'RankController@update')->name('update_rank');
    Route::get('/{id}/delete', 'RankController@delete')->name('delete_rank');
});
Route::group(['prefix' => 'title'], function() {
    Route::get('/', 'TitleController@index')->name('title_index');
    Route::get('/create', 'TitleController@create')->name('create_title');
    Route::post('/create', 'TitleController@store')->name('store_title');
    Route::get('/{id}/edit', 'TitleController@edit')->name('edit_title');
    Route::put('/{id}/edit', 'TitleController@update')->name('update_title');
    Route::get('/{id}/delete', 'TitleController@delete')->name('delete_title');
});
Route::group(['prefix' => 'department'], function() {
    Route::get('/', 'DepartmentController@index')->name('department_index');
    Route::get('/create', 'DepartmentController@create')->name('create_department');
    Route::post('/create', 'DepartmentController@store')->name('store_department');
    Route::get('/{id}/edit', 'DepartmentController@edit')->name('edit_department');
    Route::put('/{id}/edit', 'DepartmentController@update')->name('update_department');
    Route::get('/{id}/delete', 'DepartmentController@delete')->name('delete_department');
});
Route::group(['prefix' => 'paygrade'], function() {
    Route::get('/', 'PaygradeController@index')->name('paygrade_index');
    Route::get('/create', 'PaygradeController@create')->name('create_paygrade');
    Route::post('/create', 'PaygradeController@store')->name('store_paygrade');
    Route::get('/{id}/edit', 'PaygradeController@edit')->name('edit_paygrade');
    Route::put('/{id}/edit', 'PaygradeController@update')->name('update_paygrade');
    Route::get('/{id}/delete', 'PaygradeController@delete')->name('delete_paygrade');
});
Route::group(['prefix' => 'salarycomponent'], function() {
    Route::get('/', 'SalaryComponentController@index')->name('salarycomponent_index');
    Route::get('/create', 'SalaryComponentController@create')->name('create_salarycomponent');
    Route::post('/create', 'SalaryComponentController@store')->name('store_salarycomponent');
    Route::get('/{id}/edit', 'SalaryComponentController@edit')->name('edit_salarycomponent');
    Route::put('/{id}/edit', 'SalaryComponentController@update')->name('update_salarycomponent');
    Route::get('/{id}/delete', 'SalaryComponentController@delete')->name('delete_salarycomponent');
});
