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
    Route::get('/', 'EmployeeBankController@index')->name('employeebankinfo_index');
    Route::get('/create', 'EmployeeBankController@create')->name('create_employeebankinfo');
    Route::post('/create', 'EmployeeBankController@store')->name('store_employeebankinfo');
    Route::get('/{id}/edit', 'EmployeeBankController@edit')->name('edit_employeebankinfo');
    Route::put('/{id}/edit', 'EmployeeBankController@update')->name('update_employeebankinfo');
    Route::get('/{id}/delete', 'EmployeeBankController@delete')->name('delete_employeebankinfo');
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
    Route::get('/', 'EmployeePensionController@index')->name('employeepensioninfo_index');
    Route::get('/create', 'EmployeePensionController@create')->name('create_employeepensioninfo');
    Route::post('/create', 'EmployeePensionController@store')->name('store_employeepensioninfo');
    Route::get('/{id}/edit', 'EmployeePensionController@edit')->name('edit_employeepensioninfo');
    Route::put('/{id}/edit', 'EmployeePensionController@update')->name('update_employeepensioninfo');
    Route::get('/{id}/delete', 'EmployeePensionController@delete')->name('delete_employeepensioninfo');
});
Route::group(['prefix' => 'employeelevel'], function() {
    Route::get('/', 'EmployeeLevelController@index')->name('employeelevel_index');
    Route::get('/create', 'EmployeeLevelController@create')->name('create_employeelevel');
    Route::post('/create', 'EmployeeLevelController@store')->name('store_employeelevel');
    Route::get('/{id}/edit', 'EmployeeLevelController@edit')->name('edit_employeelevel');
    Route::put('/{id}/edit', 'EmployeeLevelController@update')->name('update_employeelevel');
    Route::get('/{id}/delete', 'EmployeeLevelController@delete')->name('delete_employeelevel');
});
Route::group(['prefix' => 'employeedepartmentinfo'], function() {
    Route::get('/', 'EmployeeDepartmentController@index')->name('employeedepartmentinfo_index');
    Route::get('/create', 'EmployeeDepartmentController@create')->name('create_employeedepartmentinfo');
    Route::post('/create', 'EmployeeDepartmentController@store')->name('store_employeedepartmentinfo');
    Route::get('/{id}/edit', 'EmployeeDepartmentController@edit')->name('edit_employeedepartmentinfo');
    Route::put('/{id}/edit', 'EmployeeDepartmentController@update')->name('update_employeedepartmentinfo');
    Route::get('/{id}/delete', 'EmployeeDepartmentController@delete')->name('delete_employeedepartmentinfo');
});
Route::group(['prefix' => 'employeepaygradeinfo'], function() {
    Route::get('/', 'EmployeePaygradeController@index')->name('employeepaygradeinfo_index');
    Route::get('/create', 'EmployeePaygradeController@create')->name('create_employeepaygradeinfo');
    Route::post('/create', 'EmployeePaygradeController@store')->name('store_employeepaygradeinfo');
    Route::get('/{id}/edit', 'EmployeePaygradeController@edit')->name('edit_employeepaygradeinfo');
    Route::put('/{id}/edit', 'EmployeePaygradeController@update')->name('update_employeepaygradeinfo');
    Route::get('/{id}/delete', 'EmployeePaygradeController@delete')->name('delete_employeepaygradeinfo');
});
Route::group(['prefix' => 'employeerankinfo'], function() {
    Route::get('/', 'EmployeeRankController@index')->name('employeerankinfo_index');
    Route::get('/create', 'EmployeeRankController@create')->name('create_employeerankinfo');
    Route::post('/create', 'EmployeeRankController@store')->name('store_employeerankinfo');
    Route::get('/{id}/edit', 'EmployeeRankController@edit')->name('edit_employeerankinfo');
    Route::put('/{id}/edit', 'EmployeeRankController@update')->name('update_employeerankinfo');
    Route::get('/{id}/delete', 'EmployeeRankController@delete')->name('delete_employeerankinfo');
});
Route::group(['prefix' => 'employeesalarycomponentinfo'], function() {
    Route::get('/', 'EmployeeSalaryComponentController@index')->name('employeesalarycomponentinfo_index');
    Route::get('/create', 'EmployeeSalaryComponentController@create')->name('create_employeesalarycomponentinfo');
    Route::post('/create', 'EmployeeSalaryComponentController@store')->name('store_employeesalarycomponentinfo');
    Route::get('/{id}/edit', 'EmployeeSalaryComponentController@edit')->name('edit_employeesalarycomponentinfo');
    Route::put('/{id}/edit', 'EmployeeSalaryComponentController@update')->name('update_employeesalarycomponentinfo');
    Route::get('/{id}/delete', 'EmployeeSalaryComponentController@delete')->name('delete_employeesalarycomponentinfo');
});
Route::group(['prefix' => 'useremployeemap'], function() {
    Route::get('/', 'UserEmployeeMapController@index')->name('useremployeemap_index');
    Route::get('/create', 'UserEmployeeMapController@create')->name('create_useremployeemap');
    Route::post('/create', 'UserEmployeeMapController@store')->name('store_useremployeemap');
    Route::get('/{id}/edit', 'UserEmployeeMapController@edit')->name('edit_useremployeemap');
    Route::put('/{id}/edit', 'UserEmployeeMapController@update')->name('update_useremployeemap');
    Route::get('/{id}/delete', 'UserEmployeeMapController@delete')->name('delete_useremployeemap');
});
Route::group(['prefix' => 'appconfig'], function() {
    Route::get('/', 'AppConfigController@index')->name('appconfig_index');
    Route::get('/create', 'AppConfigController@create')->name('create_appconfig');
    Route::post('/create', 'AppConfigController@store')->name('store_appconfig');
    Route::get('/{id}/edit', 'AppConfigController@edit')->name('edit_appconfig');
    Route::put('/{id}/edit', 'AppConfigController@update')->name('update_appconfig');
    Route::get('/{id}/delete', 'AppConfigController@delete')->name('delete_appconfig');
});
Route::group(['prefix' => 'appsetting'], function() {
    Route::get('/', 'AppSettingController@index')->name('appsetting_index');
    Route::get('/create', 'AppSettingController@create')->name('create_appsetting');
    Route::post('/create', 'AppSettingController@store')->name('store_appsetting');
    Route::get('/{id}/edit', 'AppSettingController@edit')->name('edit_appsetting');
    Route::put('/{id}/edit', 'AppSettingController@update')->name('update_appsetting');
    Route::get('/{id}/delete', 'AppSettingController@delete')->name('delete_appsetting');
});
Route::group(['prefix' => 'payroll'], function() {
    Route::get('/', 'PayrollController@index')->name('payroll_index');
    Route::get('/create', 'PayrollController@create')->name('create_payroll');
    Route::post('/create', 'PayrollController@store')->name('store_payroll');
    Route::get('/{id}/edit', 'PayrollController@edit')->name('edit_payroll');
    Route::put('/{id}/edit', 'PayrollController@update')->name('update_payroll');
    Route::get('/{id}/delete', 'PayrollController@delete')->name('delete_payroll');
});
Route::group(['prefix' => 'tax'], function() {
    Route::get('/', 'TaxController@index')->name('tax_index');
    Route::get('/create', 'TaxController@create')->name('create_tax');
    Route::post('/create', 'TaxController@store')->name('store_tax');
    Route::get('/{id}/edit', 'TaxController@edit')->name('edit_tax');
    Route::put('/{id}/edit', 'TaxController@update')->name('update_tax');
    Route::get('/{id}/delete', 'TaxController@delete')->name('delete_tax');
});
Route::group(['prefix' => 'employeetax'], function() {
    Route::get('/', 'EmployeeTaxController@index')->name('employeetax_index');
    Route::get('/create', 'EmployeeTaxController@create')->name('create_employeetax');
    Route::post('/create', 'EmployeeTaxController@store')->name('store_employeetax');
    Route::get('/{id}/edit', 'EmployeeTaxController@edit')->name('edit_employeetax');
    Route::put('/{id}/edit', 'EmployeeTaxController@update')->name('update_employeetax');
    Route::get('/{id}/delete', 'EmployeeTaxController@delete')->name('delete_employeetax');
});
