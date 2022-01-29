<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CharacterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CharacterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\Character::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/character');
        CRUD::setEntityNameStrings('character', 'characters');
    }


    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Name',
            ],
            [
                'name' => 'stars',
                'type' => 'text',
                'label' => 'Stars',
            ],
            [
                'name' => 'probability',
                'type' => 'text',
                'label' => 'Probability',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CharacterRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
            ],
            [
                'name' => 'stars',
                'type' => 'number',
                'label' => 'Stars',
                'default' => 1,
            ],
            [
                'name' => 'probability',
                'type' => 'number',
                'attributes' => [
                    'step' => 'any'
                ],
                'label' => 'Probability',
                'suffix' => '%',
                'default' => 100,
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
