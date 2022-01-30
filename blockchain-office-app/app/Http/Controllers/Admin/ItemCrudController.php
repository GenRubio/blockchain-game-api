<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ItemRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ItemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        CRUD::setModel(\App\Models\Item::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/item');
        CRUD::setEntityNameStrings('object', 'objects');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'id',
                'type' => 'text',
                'label' => 'ID',
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
                'name' => 'object_type_id',
                'label' => 'Object type',
                'entity' => 'objectType',
                'type' => 'relationship',
                'attribute' => 'name',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ItemRequest::class);

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
                'name' => 'object_type_id',
                'label' => 'Object Type',
                'type' => 'select2',
                'model'     => "App\Models\ObjectType", // foreign key model
                'attribute' => 'name',
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
