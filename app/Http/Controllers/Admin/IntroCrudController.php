<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IntroRequest;
use App\Models\Intro;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class IntroCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class IntroCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
//    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Intro::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/intro');
        CRUD::setEntityNameStrings('Интро', 'Интро');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (Intro::count() > 0){
            $this->crud->denyAccess((array)'create');
        }
//        CRUD::setFromDb(); // columns
        CRUD::addColumn(['name' => 'logo', 'type' => 'image', 'label' => 'Логотип']);
        CRUD::addColumn(['name' => 'lead_in', 'type' => 'text', 'label' => 'Лид']);
        CRUD::addColumn(['name' => 'heading', 'type' => 'text', 'label' => 'Заголовок']);
        CRUD::addColumn(['name' => 'btn_text', 'type' => 'text', 'label' => 'Текст на кнопке']);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function setupShowOperation()
    {
        CRUD::addColumn(['name' => 'logo', 'type' => 'image', 'label' => 'Логотип']);
        CRUD::addColumn(['name' => 'lead_in', 'type' => 'text', 'label' => 'Лид']);
        CRUD::addColumn(['name' => 'heading', 'type' => 'text', 'label' => 'Заголовок']);
        CRUD::addColumn(['name' => 'btn_text', 'type' => 'text', 'label' => 'Текст на кнопке']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        if (Intro::all()->count() === 0) {
            CRUD::setValidation(IntroRequest::class);

//        CRUD::setFromDb(); // fields
            CRUD::addField(
                [
                    'name' => 'logo',
                    'type' => 'image',
                    'crop' => false,
//                    'aspect_ratio' => 1,
                    'label' => 'Логотип'
                ]
            );
            CRUD::addField(['name' => 'lead_in', 'type' => 'text', 'label' => 'Основной лид']);
            CRUD::addField(['name' => 'heading', 'type' => 'text', 'label' => 'Заголовок']);
            CRUD::addField(['name' => 'btn_text', 'type' => 'text', 'label' => 'Текст кнопки']);
        } else {
            return;
        }

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
        CRUD::setValidation(IntroRequest::class);

//        CRUD::setFromDb(); // fields
        CRUD::addField(
            [
                'name' => 'logo',
                'type' => 'image',
                'crop' => false,
//                    'aspect_ratio' => 1,
//                'disk' => 'public-images',
                'label' => 'Логотип'
            ]
        );
        CRUD::addField(['name' => 'lead_in', 'type' => 'text', 'label' => 'Основной лид']);
        CRUD::addField(['name' => 'heading', 'type' => 'text', 'label' => 'Заголовок']);
        CRUD::addField(['name' => 'btn_text', 'type' => 'text', 'label' => 'Текст кнопки']);
    }

}
