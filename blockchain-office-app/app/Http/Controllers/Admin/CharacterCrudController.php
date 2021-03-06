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
                'name' => 'image',
                'type' => 'image',
                'label' => 'Image',
            ],
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
                'name' => 'min_power',
                'type' => 'text',
                'label' => 'Min power',
            ],
            [
                'name' => 'max_power',
                'type' => 'text',
                'label' => 'Max power',
            ],
            [
                'name' => 'live',
                'type' => 'text',
                'label' => 'Live',
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
                'name' => 'image',
                'label' => 'Image',
                'type' => 'image',
            ],
            [
                'name' => 'stars',
                'type' => 'number',
                'label' => 'Stars',
                'default' => 1,
            ],
            [
                'name' => 'min_power',
                'type' => 'number',
                'label' => 'Min power',
                'default' => 1,
            ],
            [
                'name' => 'max_power',
                'type' => 'number',
                'label' => 'Max power',
                'default' => 1,
            ],
            [
                'name' => 'live',
                'type' => 'number',
                'label' => 'Live',
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
