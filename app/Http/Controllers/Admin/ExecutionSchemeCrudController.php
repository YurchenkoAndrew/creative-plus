<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ExecutionSchemeRequest;
use App\Models\ExecutionScheme;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ExecutionSchemeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ExecutionSchemeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ExecutionScheme::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/executionscheme');
        CRUD::setEntityNameStrings('запись', 'Схема выполения работ');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'sort', 'type' => 'number', 'label' => 'Сортировка']); // columns
        CRUD::addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Название записи']); // columns
        CRUD::addColumn(['name' => 'image', 'type' => 'image', 'label' => 'Изображение']); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $countItems = ExecutionScheme::count() + 1;
        CRUD::setValidation(ExecutionSchemeRequest::class);

        CRUD::addField(['name' => 'sort', 'type' => 'number', 'label' => 'Сортировка', 'default' => $countItems]); // columns
        CRUD::addField(['name' => 'name', 'type' => 'text', 'label' => 'Название записи']); // columns
        CRUD::addField(['name' => 'image', 'type' => 'image', 'label' => 'Изображение']); // columns

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
