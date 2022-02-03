<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserFleetRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

class UserFleetCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    protected $user_id;

    public function setup()
    {
        CRUD::setModel(\App\Models\UserFleet::class);
        $this->setRoute();
        $this->breadCrumbs();
        $this->filterList();
        CRUD::setEntityNameStrings('user fleet', 'user fleets');
    }

    private function setRoute()
    {
        $this->user_id = Route::current()->parameter('user_id');
        $this->crud->setRoute("admin/user/"
            . $this->user_id . '/user-fleet');
    }

    private function breadCrumbs()
    {
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin') => backpack_url('dashboard'),
            'Users' => backpack_url('user'),
            'User Fleets' => backpack_url("user/" . $this->user_id . "/user-fleet"),
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
                'name' => 'mission_id',
                'label' => 'Mission Level',
                'entity' => 'mission',
                'type' => 'relationship',
                'attribute' => 'level',
            ],
            [
                'name' => 'date_start_mission',
                'type' => 'text',
                'label' => 'Date start',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserFleetRequest::class);

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
                'name' => 'mission_id',
                'label' => 'Mission Level',
                'type' => 'select2',
                'model'     => "App\Models\Mission", // foreign key model
                'attribute' => 'level',
            ],
            [
                'name' => 'date_start_mission',
                'label' => 'Date start',
                'type' => 'datetime',
                'default' => date("Y-m-d H:i:s"),
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
