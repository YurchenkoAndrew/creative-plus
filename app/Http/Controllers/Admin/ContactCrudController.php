<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ContactCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContactCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Contact::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/contact');
        CRUD::setEntityNameStrings('контакт', 'Контакты');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if (Contact::count() > 0){
            $this->crud->denyAccess((array)'create');
        }
        CRUD::addColumn(['name' => 'email', 'type' => 'email', 'label' => 'Email']);
        CRUD::addColumn(['name' => 'phone', 'type' => 'phone', 'label' => 'Телефон']);
        CRUD::addColumn(['name' => 'mobile_phone', 'type' => 'phone', 'label' => 'Телефон мобильный']);
        CRUD::addColumn(['name' => 'site', 'type' => 'url', 'label' => 'Сайт']);

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
        CRUD::setValidation(ContactRequest::class);

        CRUD::addField(['name' => 'email', 'type' => 'email', 'label' => 'Email']);
        CRUD::addField(['name' => 'phone', 'type' => 'text', 'label' => 'Телефон']);
        CRUD::addField(['name' => 'mobile_phone', 'type' => 'text', 'label' => 'Телефон мобильный']);
        CRUD::addField(['name' => 'site', 'type' => 'text', 'label' => 'Сайт']);
        CRUD::addField(['name' => 'whatsapp', 'type' => 'number', 'label' => 'Whatsapp']);
        CRUD::addField(['name' => 'instagram', 'type' => 'url', 'label' => 'Instagram']);

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
