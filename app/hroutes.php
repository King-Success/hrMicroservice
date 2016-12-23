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
Route::group(['prefix' => 'employeetype'], function() {
    Route::get('/', 'EmployeeTypeController@index')->name('employeetype_index');
    Route::get('/create', 'EmployeeTypeController@create')->name('create_employeetype');
    Route::post('/create', 'EmployeeTypeController@store')->name('store_employeetype');
    Route::get('/{id}/edit', 'EmployeeTypeController@edit')->name('edit_employeetype');
    Route::put('/{id}/edit', 'EmployeeTypeController@update')->name('update_employeetype');
    Route::get('/{id}/delete', 'EmployeeTypeController@delete')->name('delete_employeetype');
});
Route::group(['prefix' => 'bank'], function() {
    Route::get('/', 'BankController@index')->name('bank_index');
    Route::get('/create', 'BankController@create')->name('create_bank');
    Route::post('/create', 'BankController@store')->name('store_bank');
    Route::get('/{id}/edit', 'BankController@edit')->name('edit_bank');
    Route::put('/{id}/edit', 'BankController@update')->name('update_bank');
    Route::get('/{id}/delete', 'BankController@delete')->name('delete_bank');
});
Route::group(['prefix' => 'employeebankinfo'], function() {
    Route::get('/', 'EmployeeBankInfoController@index')->name('employeebankinfo_index');
    Route::get('/create', 'EmployeeBankInfoController@create')->name('create_employeebankinfo');
    Route::post('/create', 'EmployeeBankInfoController@store')->name('store_employeebankinfo');
    Route::get('/{id}/edit', 'EmployeeBankInfoController@edit')->name('edit_employeebankinfo');
    Route::put('/{id}/edit', 'EmployeeBankInfoController@update')->name('update_employeebankinfo');
    Route::get('/{id}/delete', 'EmployeeBankInfoController@delete')->name('delete_employeebankinfo');
});
Route::group(['prefix' => 'pension'], function() {
    Route::get('/', 'PensionController@index')->name('pension_index');
    Route::get('/create', 'PensionController@create')->name('create_pension');
    Route::post('/create', 'PensionController@store')->name('store_pension');
    Route::get('/{id}/edit', 'PensionController@edit')->name('edit_pension');
    Route::put('/{id}/edit', 'PensionController@update')->name('update_pension');
    Route::get('/{id}/delete', 'PensionController@delete')->name('delete_pension');
});
Route::group(['prefix' => 'employeepensioninfo'], function() {
    Route::get('/', 'EmployeePensionInfoController@index')->name('employeepensioninfo_index');
    Route::get('/create', 'EmployeePensionInfoController@create')->name('create_employeepensioninfo');
    Route::post('/create', 'EmployeePensionInfoController@store')->name('store_employeepensioninfo');
    Route::get('/{id}/edit', 'EmployeePensionInfoController@edit')->name('edit_employeepensioninfo');
    Route::put('/{id}/edit', 'EmployeePensionInfoController@update')->name('update_employeepensioninfo');
    Route::get('/{id}/delete', 'EmployeePensionInfoController@delete')->name('delete_employeepensioninfo');
});
