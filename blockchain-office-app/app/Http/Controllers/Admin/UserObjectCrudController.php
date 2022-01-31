<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserObjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

class UserObjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    protected $user_id;

    public function setup()
    {
        CRUD::setModel(\App\Models\UserObject::class);
        $this->setRoute();
        $this->breadCrumbs();
        $this->filterList();
        CRUD::setEntityNameStrings('user object', 'user objects');
    }

    private function setRoute()
    {
        $this->user_id = Route::current()->parameter('user_id');
        $this->crud->setRoute("admin/user/"
            . $this->user_id . '/user-object');
    }

    private function breadCrumbs()
    {
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin') => backpack_url('dashboard'),
            'Users' => backpack_url('user'),
            'User Objects' => backpack_url("user/" . $this->user_id . "/user-object"),
            trans('backpack::crud.list') => false,
        ];
    }

    private function filterList()
    {
        $this->crud->addClause('where', 'user_id', $this->user_id);
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'id',
                'label' => 'ID',
                'type' => 'text',
            ],
            [
                'name' => 'user_id',
                'label' => 'User',
                'entity' => 'user',
                'type' => 'relationship',
                'attribute' => 'metamask',
            ],
            [
                'name' => 'object_id',
                'label' => 'Object',
                'entity' => 'object',
                'type' => 'relationship',
                'attribute' => 'name',
            ],
            [
                'name' => 'user_fleet_id',
                'label' => 'User fleet ID',
                'entity' => 'fleet',
                'type' => 'relationship',
                'attribute' => 'id',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserObjectRequest::class);

        $this->crud->addFields([
            [
                'name' => 'user_id',
                'label' => 'User',
                'type' => 'select2',
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'metamask',
                'value'   => $this->user_id,
                'options'   => (function ($query) {
                    return $query->where('id', $this->user_id)->get();
                }),
                'attributes' => [
                    'readonly'    => 'readonly',
                ],
            ],
            [
                'name' => 'object_id',
                'label' => 'Object',
                'type' => 'select2',
                'model'     => "App\Models\Item", // foreign key model
                'attribute' => 'name',
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->crud->addFields([
            [
                'name' => 'user_id',
                'label' => 'User',
                'type' => 'select2',
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'metamask',
                'value'   => $this->user_id,
                'options'   => (function ($query) {
                    return $query->where('id', $this->user_id)->get();
                }),
                'attributes' => [
                    'readonly'    => 'readonly',
                ],
            ],
            [
                'name' => 'object_id',
                'label' => 'Object',
                'type' => 'select2',
                'model'     => "App\Models\Item", // foreign key model
                'attribute' => 'name',
            ],
            [
                'name' => 'user_fleet_id',
                'label' => 'Fleet',
                'type' => 'select2',
                'model'     => "App\Models\UserFleet", // foreign key model
                'attribute' => 'id',
                'options'   => (function ($query) {
                    return $query->where('user_id', $this->user_id)->get();
                }),
            ],
        ]);

    }
}
