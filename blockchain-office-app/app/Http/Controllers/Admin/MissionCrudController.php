<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MissionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class MissionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Mission::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mission');
        CRUD::setEntityNameStrings('mission', 'missions');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'level',
                'type' => 'text',
                'label' => 'Level',
            ],
            [
                'name' => 'rank_name',
                'type' => 'text',
                'label' => 'Rank name',
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
                'name' => 'min_win_credits',
                'type' => 'text',
                'label' => 'Min win credits',
            ],
            [
                'name' => 'max_win_credits',
                'type' => 'text',
                'label' => 'Max win credits',
            ],
        ]);

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(MissionRequest::class);

        $this->crud->addFields([
            [
                'name' => 'level',
                'label' => 'Level',
                'type' => 'number',
                'default' => 1,
            ],
            [
                'name' => 'rank_name',
                'label' => 'Rank name',
                'type' => 'text',
            ],
            [
                'name' => 'min_win_credits',
                'type' => 'number',
                'label' => 'Min win credits',
                'default' => 1,
            ],
            [
                'name' => 'max_win_credits',
                'type' => 'number',
                'label' => 'Max win credits',
                'default' => 1,
            ],
            [
                'name' => 'power',
                'type' => 'number',
                'label' => 'Power',
                'default' => 1,
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
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
