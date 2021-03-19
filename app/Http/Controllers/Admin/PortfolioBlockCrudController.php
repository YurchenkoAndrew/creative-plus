<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PortfolioBlockRequest;
use App\Models\PortfolioBlock;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PortfolioBlockCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PortfolioBlockCrudController extends CrudController
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
        CRUD::setModel(\App\Models\PortfolioBlock::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/portfolioblock');
        CRUD::setEntityNameStrings('блок', 'Блоки портфолио');
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
        CRUD::addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Название блока']); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function setupShowOperation()
    {
        CRUD::addColumn(['name' => 'sort', 'type' => 'number', 'label' => 'Сортировка']); // columns
        CRUD::addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Название блока']); // columns
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $countItems = PortfolioBlock::count() + 1;
        CRUD::setValidation(PortfolioBlockRequest::class);

        CRUD::addField(['name' => 'name', 'type' => 'text', 'label' => 'Название блока']); // fields
        CRUD::addField(['name' => 'sort', 'type' => 'number', 'label' => 'Сортировка', 'default' => $countItems]); // fields

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
