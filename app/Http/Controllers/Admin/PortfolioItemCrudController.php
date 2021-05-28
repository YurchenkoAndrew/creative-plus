<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PortfolioItemRequest;
use App\Models\PortfolioItem;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PortfolioItemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PortfolioItemCrudController extends CrudController
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
        CRUD::setModel(\App\Models\PortfolioItem::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/portfolioitem');
        CRUD::setEntityNameStrings('запись', 'Портфолио');
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
        CRUD::addColumn(
            [
                'name' => 'portfolioBlock',
                'type' => 'relationship',
                'label' => 'Блок',
            ]
        ); // columns
        CRUD::addColumn(['name' => 'image', 'type' => 'image', 'label' => 'Изображение']); // columns
        CRUD::addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Название']); // columns
//        CRUD::addColumn(['name' => 'description', 'type' => 'text', 'label' => 'Описание']); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function setupShowOperation()
    {
        CRUD::addColumn(['name' => 'sort', 'type' => 'number', 'label' => 'Сортировка']); // columns
        CRUD::addColumn(
            [
                'name' => 'portfolioBlock',
                'type' => 'relationship',
                'label' => 'Блок',
            ]
        ); // columns
        CRUD::addColumn(['name' => 'image', 'type' => 'image', 'label' => 'Изображение']); // columns
        CRUD::addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Название']); // columns
        CRUD::addColumn(['name' => 'description', 'type' => 'text', 'label' => 'Описание']); // columns
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $countItems = PortfolioItem::count() + 1;
        CRUD::setValidation(PortfolioItemRequest::class);

        CRUD::addField(['name' => 'sort', 'type' => 'number', 'label' => 'Сортировка', 'default' => $countItems]); // columns
        CRUD::addField(
            [
                'name' => 'portfolio_block_id',
                'type' => 'select2',
                'label' => 'Блок',
                'entity' => 'portfolioBlock',
                'model' => 'App\Models\PortfolioBlock',
                'attribute' => 'name',
                'options' => (function ($query) {
                    return $query->orderBy('sort', 'ASC')->get();
                }),
            ]
        ); // columns
        CRUD::addField(['name' => 'name', 'type' => 'text', 'label' => 'Название']); // columns
        CRUD::addField(['name' => 'image', 'type' => 'image', 'label' => 'Изображение']); // columns
        CRUD::addField(['name' => 'description', 'type' => 'text', 'label' => 'Описание']); // columns

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
