<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TransportCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Transport::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/transport');
        CRUD::setEntityNameStrings('transport', 'transports');
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
                'name' => 'stars',
                'type' => 'text',
                'label' => 'Stars',
            ],
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Name',
            ],
            [
                'name' => 'live',
                'type' => 'text',
                'label' => 'Live',
            ],
            [
                'name' => 'max_characters',
                'type' => 'text',
                'label' => 'Max characters',
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
        CRUD::setValidation(TransportRequest::class);

        $this->crud->addFields([
            [
                'name' => 'stars',
                'type' => 'number',
                'label' => 'Stars',
                'default' => 1,
            ],
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
                'name' => 'live',
                'type' => 'number',
                'label' => 'Live',
                'default' => 1,
            ],
            [
                'name' => 'max_characters',
                'type' => 'number',
                'label' => 'Max characters',
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
                'default' => 1,
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
