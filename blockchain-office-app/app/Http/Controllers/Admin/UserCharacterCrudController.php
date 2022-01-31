<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserCharacterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

class UserCharacterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    protected $user_id;

    public function setup()
    {
        CRUD::setModel(\App\Models\UserCharacter::class);
        $this->setRoute();
        $this->breadCrumbs();
        $this->filterList();
        CRUD::setEntityNameStrings('user character', 'user characters');
    }

    private function setRoute()
    {
        $this->user_id = Route::current()->parameter('user_id');
        $this->crud->setRoute("admin/user/"
            . $this->user_id . '/user-character');
    }

    private function breadCrumbs()
    {
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.admin') => backpack_url('dashboard'),
            'Users' => backpack_url('user'),
            'User Characters' => backpack_url("user/" . $this->user_id . "/user-character"),
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
                'name' => 'character_id',
                'label' => 'Character Stars',
                'entity' => 'character',
                'type' => 'relationship',
                'attribute' => 'stars',
            ],
            [
                'name' => 'user_transport_id',
                'label' => 'Transport ID',
                'entity' => 'transport',
                'type' => 'relationship',
                'attribute' => 'id',
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
                'value'   => $this->user_id,
                'options'   => (function ($query) {
                    return $query->where('id', $this->user_id)->get();
                }),
                'attributes' => [
                    'readonly'    => 'readonly',
                ],
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
                'type' => 'hidden',
                'value' => 1,
            ],
            [
                'name' => 'power',
                'type' => 'hidden',
                'value' => 1,
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(UserCharacterRequest::class);

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
                'name' => 'character_id',
                'label' => 'Character Stars',
                'type' => 'select2',
                'model'     => "App\Models\Character", // foreign key model
                'attribute' => 'stars',
            ],
            [
                'name' => 'user_transport_id',
                'label' => 'Transport ID',
                'type' => 'select2',
                'model'     => "App\Models\UserTransport", // foreign key model
                'attribute' => 'id',
                'options'   => (function ($query) {
                    return $query->where('user_id', $this->user_id)
                        ->where('user_fleet_id', null)
                        ->get();
                }),
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
}
