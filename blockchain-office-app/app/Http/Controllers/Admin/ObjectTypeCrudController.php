<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ObjectTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ObjectTypeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\ObjectType::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/object-type');
        CRUD::setEntityNameStrings('object type', 'object types');
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
                'name' => 'power',
                'type' => 'text',
                'label' => 'Power',
            ],
            [
                'name' => 'win_rate',
                'type' => 'text',
                'label' => 'Win rate',
            ],
            [
                'name' => 'profits',
                'type' => 'text',
                'label' => 'Profits',
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
        CRUD::setValidation(ObjectTypeRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Type',
                'type' => 'text',
            ],
            [
                'name' => 'power',
                'type' => 'number',
                'attributes' => [
                    'step' => 'any'
                ],
                'label' => 'Power',
                'suffix' => '%',
                'default' => 0,
            ],
            [
                'name' => 'win_rate',
                'type' => 'number',
                'attributes' => [
                    'step' => 'any'
                ],
                'label' => 'Win rate',
                'suffix' => '%',
                'default' => 0,
            ],
            [
                'name' => 'profits',
                'type' => 'number',
                'attributes' => [
                    'step' => 'any'
                ],
                'label' => 'Profits',
                'suffix' => '%',
                'default' => 0,
            ],
            [
                'name' => 'probability',
                'type' => 'number',
                'attributes' => [
                    'step' => 'any'
                ],
                'label' => 'Probability',
                'suffix' => '%',
                'default' => 0,
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
