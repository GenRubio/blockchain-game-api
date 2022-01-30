<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserCharacterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCharacterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\UserCharacter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user-character');
        CRUD::setEntityNameStrings('user character', 'user characters');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'user_id',
                'label' => 'User',
                'entity' => 'user',
                'type' => 'relationship',
                'attribute' => 'metamask',
            ],
            [
                'name' => 'character_id',
                'label' => 'Character Stars',
                'entity' => 'character',
                'type' => 'relationship',
                'attribute' => 'stars',
            ],
            [
                'name' => 'live',
                'type' => 'text',
                'label' => 'Live',
            ],
            [
                'name' => 'power',
                'type' => 'text',
                'label' => 'Power',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserCharacterRequest::class);

        $this->crud->addFields([
            [
                'name' => 'user_id',
                'label' => 'User',
                'type' => 'select2',
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'metamask',
            ],
            [
                'name' => 'character_id',
                'label' => 'Character Stars',
                'type' => 'select2',
                'model'     => "App\Models\Character", // foreign key model
                'attribute' => 'stars',
            ],
            [
                'name' => 'live',
                'label' => 'Live',
                'type' => 'number',
                'default' => 1,
            ],
            [
                'name' => 'power',
                'label' => 'Power',
                'type' => 'number',
                'default' => 1,
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
