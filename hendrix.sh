#!/bin/bash

# variables
REPOSITORIES="Repositories"

# Make app/Repositories
function createContainer {
    mkdir ./app/$REPOSITORIES 2> /dev/null
}

# Make app/Repositories/Entity
function createEntityRepository {
    mkdir ./app/$REPOSITORIES/$1
}

# Make app/Repositories/Entity/EntityContract.php
function createEntityContract {
    touch ./app/$REPOSITORIES/$1/$1Contract.php
}

# Make app/Repositories/Entity/EloquentEntityRepository.php
function createEntityEloquentRepository {
    touch ./app/$REPOSITORIES/$1/Eloquent$1Repository.php
}

# Create interface with CRUD methods in Contract file
function writeContractBoilerPlate {
echo "<?php

namespace App\\$REPOSITORIES\\$1;

interface $1Contract
{
    public function create(\$request);
    public function edit(\$${1,}Id, \$request);
    public function findAll();
    public function findById(\$${1,}Id);
    public function remove(\$${1,}Id);
}" > ./app/$REPOSITORIES/$1/$1Contract.php
}

# Implement interface with CRUD methods in EloquentEntityRepository file
function writeEloquentBoilerPlate {
echo "<?php

namespace App\\$REPOSITORIES\\$1;

use App\\$1;
use App\\$REPOSITORIES\\$1\\$1Contract;

class Eloquent$1Repository implements $1Contract
{
    public function create(\$request) {
        \$${1,} = new $1;

        // Set the $1 properties
        \$this->set$1Properties(\$${1,}, \$request);

        \$${1,}->save();
        return \$${1,};
    }

    public function edit(\$${1,}Id, \$request) {
        \$${1,} = \$this->findById(\$${1,}Id);

        // Edit the $1 properties
        \$this->set$1Properties(\$${1,}, \$request);

        \$${1,}->save();
        return \$${1,};
    }

    public function findAll() {
        return $1::all();
    }

    public function findById(\$${1,}Id) {
        return $1::find(\$${1,}Id);
    }

    public function remove(\$${1,}Id) {
        \$${1,} = \$this->findById(\$${1,}Id);
        return \$${1,}->delete();
    }

    private function set$1Properties(\$${1,}, \$request) {
        // Assign attributes to the ${1,} here
    }
}" > ./app/$REPOSITORIES/$1/Eloquent$1Repository.php
}

# Make ServiceProvider
function makeServiceProvider {
    php artisan make:provider $1ServiceProvider
}

# Bind Contract to Repository in ServiceProvider register method
function bindContractToEloquentRepositoryInProvider {
echo "<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class $1ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        \$this->app->bind('App\\$REPOSITORIES\\$1\\$1Contract', 'App\\$REPOSITORIES\\$1\\Eloquent$1Repository');
    }
}" > ./app/Providers/$1ServiceProvider.php
}

# Bootstrap Laravel model for Entity
function makeModelWithMigration {
    php artisan make:model $1 -m
}

# Bootstrap Laravel controller for Entity
function makeController {
    php artisan make:controller $1Controller
}

# Perform DI in Entity Controller
function injectContainerInController {
echo "<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\\$REPOSITORIES\\$1\\$1Contract;

class $1Controller extends Controller
{
    protected \$${1,}Model;
    public function __construct($1Contract \$${1,}Contract) {
        \$this->${1,}Model = \$${1,}Contract;
    }

    // Display ${1,,}s.index with all ${1,,}s
    public function index() {
        \$${1,}s = \$this->${1,}Model->findAll();
        return view('${1,,}s.index', ['${1,}s' => \$${1,}s]);
    }

    // Display ${1,,}s.create
    public function create() {
        return view('${1,,}s.create');
    }

    /**
     * Validate form.
     * Save $1 to database
     * Redirect to prefered route or perform other action
     */
     public function store(Request \$request) {
         \$this->validate(\$request, [
            // Specify validation rules here
         ]);

         \$${1,} = \$this->${1,}Model->create(\$request);
         if (\$${1,}->id) {
             // Redirect or do whatever you like
         } else {
             return back()
                ->withInput()
                ->with('error', 'Could not create ${1}. Try again!');
         }
     }

    // Display ${1,,}s.edit with ${1,,} to edit
    public function edit(\$id) {
        \$${1,} = \$this->${1,}Model->findById(\$id);
        return view('${1,,}s.edit', ['${1,}' => \$${1,}]);
    }

    /**
     * Validate form.
     * Update $1 in database
     * Redirect to prefered route or perform other action
     */
    public function update(Request \$request, \$id) {
        \$this->validate(\$request, [
           // Specify validation rules here
        ]);

        \$${1,} = \$this->${1,}Model->edit(\$id, \$request);
        if (\$${1,}->id) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->withInput()
               ->with('error', 'Could not update ${1}. Try again!');
        }
    }

    /**
     * Delete $1 from database
     * Redirect to prefered route or perform other action
     */
    public function delete(Request \$request, \$id) {
        if (\$this->${1,}Model->remove(\$id)) {
            // Redirect or do whatever you like
        } else {
            return back()
               ->with('error', 'Could not delete ${1}. Try again!');
        }
    }
}" > ./app/Http/Controllers/$1Controller.php
}

# Bootstrap directory for views related to Entity
function createViewFolder {
    mkdir ./resources/views/${1,,}s
}

# Create index view that returns all instances of the Entity in database
function createIndexView {
    touch ./resources/views/${1,,}s/index.blade.php
}

# Create create view that displays form for adding a new record
function createCreateView {
    touch ./resources/views/${1,,}s/create.blade.php
}

# Create edit view that returns an instance of the Entity with a form for updating it
function createEditView {
    touch ./resources/views/${1,,}s/edit.blade.php
}

function appendRoute {
echo "Route::group(['prefix' => '${1,,}'], function() {
    Route::get('/', '${1}Controller@index')->name('${1,,}_index');
    Route::get('/create', '${1}Controller@create')->name('create_${1,,}');
    Route::post('/create', '${1}Controller@store')->name('store_${1,,}');
    Route::get('/{id}/edit', '${1}Controller@edit')->name('edit_${1,,}');
    Route::put('/{id}/edit', '${1}Controller@update')->name('update_${1,,}');
    Route::get('/{id}/delete', '${1}Controller@delete')->name('delete_${1,,}');
});" >> ./app/hroutes.php
}

createContainer
makeModelWithMigration $1
createEntityRepository $1
createEntityContract $1
createEntityEloquentRepository $1
writeContractBoilerPlate $1
writeEloquentBoilerPlate $1
makeServiceProvider $1
bindContractToEloquentRepositoryInProvider $1
makeController $1
injectContainerInController $1
createViewFolder $1
createIndexView $1
createCreateView $1
createEditView $1
appendRoute $1

# issues
# auth
# redirect errors to null or log file
# display success, warning and error messages
