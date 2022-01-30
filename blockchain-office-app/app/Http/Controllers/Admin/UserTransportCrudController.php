<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserTransportRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

class UserTransportCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    protected $user_id;

    public function setup()
    {
        CRUD::setModel(\App\Models\UserTransport::class);
        $this->setRoute();
        $this->breadCrumbs();
        $this->filterList();
        CRUD::setEntityNameStrings('user transport', 'user transports');
    }

    private function setRoute()
    {
        $this->user_id = Route::current()->parameter('user_id');
        $this->crud->setRoute("admin/user/"
            . $this->user_id . '/user-transport');
    }

    private function breadCrumbs()
    {
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin') => backpack_url('dashboard'),
            'Users' => backpack_url('user'),
            'User Transports' => backpack_url("user/" . $this->user_id . "/user-transport"),
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
                'name' => 'user_id',
                'label' => 'User',
                'entity' => 'user',
                'type' => 'relationship',
                'attribute' => 'metamask',
            ],
            [
                'name' => 'user_fleet_id',
                'label' => 'User fleet id',
                'entity' => 'fleet',
                'type' => 'relationship',
                'attribute' => 'id',
            ],
            [
                'name' => 'transport_id',
                'label' => 'Transport Stars',
                'entity' => 'transport',
                'type' => 'relationship',
                'attribute' => 'stars',
            ],
            [
                'name' => 'live',
                'label' => 'Live',
                'type' => 'text',
            ],
        ]);

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserTransportRequest::class);

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
                'name' => 'transport_id',
                'label' => 'Transport Stars',
                'type' => 'select2',
                'model'     => "App\Models\Transport", // foreign key model
                'attribute' => 'stars',
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(UserTransportRequest::class);

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
                'name' => 'transport_id',
                'label' => 'Transport Stars',
                'type' => 'select2',
                'model'     => "App\Models\Transport", // foreign key model
                'attribute' => 'stars',
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
            [
                'name' => 'live',
                'label' => 'Live',
                'type' => 'number',
            ],
        ]);
    }
}
