<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    protected function setupListOperation()
    {
        $this->crud->addButtonFromView('line', 'user-character', 'user-character', 'beginning');
        $this->crud->addButtonFromView('line', 'user-transport', 'user-transport', 'beginning');
        $this->crud->addButtonFromView('line', 'user-fleets', 'user-fleets', 'beginning');
        $this->crud->addColumns([
            [
                'name' => 'metamask',
                'label' => 'Metamask',
                'type' => 'text'
            ],
            [
                'name' => 'credits',
                'label' => 'Credits',
                'type' => 'text'
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        $this->crud->addFields([
            [
                'name' => 'metamask',
                'label' => 'Metamask',
                'type' => 'text'
            ],
            [
                'name' => 'credits',
                'label' => 'Credits',
                'type' => 'number',
                'attributes' => [
                    'step' => 'any'
                ],
                'default' => 0
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
