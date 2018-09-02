<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\EnumHelper;
use App\Http\Requests\PartnerRequest as StoreRequest;
use App\Http\Requests\PartnerRequest as UpdateRequest;
use App\Models\Partner;
use App\Models\Territory;
use App\User;
use DB;
use Illuminate\Http\Request;

/**
 * Class PartnerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PartnerCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Partner');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/partner');
        $this->crud->setEntityNameStrings(__('partner'), __('partners'));

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->setColumns(['name', 'url', 'categories', 'territories', 'user', 'status']);

        $this->crud->setColumnDetails('name', [
            'label' => __('Name')
        ]);

        $this->crud->setColumnDetails('url', [
            'label' => __('Website'),
            'type' => 'url',
            'limit' => 36
        ]);

        $this->crud->setColumnDetails('status', [
            'label' => __('Status'),
            'type' => 'check'
        ]);

        $this->crud->setColumnDetails('user', [
            'name' => 'user',
            'label' => ucfirst(__('volunteer')),
            'type' => 'model_function',
            'limit' => 120,
            'function_name' => 'getUserLinkAttribute'
        ]);

        $this->crud->setColumnDetails('categories', [
            'label' => ucfirst(__('categories')),
            'type' => 'select_multiple',
            'name' => 'categories',
            'entity' => 'categories',
            'attribute' => 'name',
            'model' => "App\Models\PartnerCategory"
        ]);

        $this->crud->setColumnDetails('territories', [
            'label' => ucfirst(__('territories')),
            'type' => 'select_multiple',
            'name' => 'territories',
            'entity' => 'territories',
            'attribute' => 'name',
            'model' => "App\Models\Territory"
        ]);

        // ------ CRUD FIELDS
        $this->crud->addFields(['name', 'description', 'benefit', 'categories', 'territories', 'email', 'phone', 'url', 'address', 'notes', 'status']);

        $this->crud->addField([
            'label' => __('Name'),
            'name' => 'name'
        ]);

        $this->crud->addField([
            'label' => __('Description'),
            'type' => 'wysiwyg',
            'name' => 'description'
        ]);

        $this->crud->addField([
            'label' => __('Benefit'),
            'name' => 'benefit',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'label' => ucfirst(__('categories')),
            'type' => 'select2_multiple',

            'name' => 'categories',
            'entity' => 'categories',
            'attribute' => 'name',
            'model' => "App\Models\PartnerCategory",
            'pivot' => true
        ]);

        $this->crud->addField([
            'label' => ucfirst(__('territories')),
            'type' => 'select2_multiple_data_source',
            'name' => 'territories',
            'attribute' => 'name',
            'model' => api()->territorySearch(Territory::DISTRITO | Territory::CONCELHO, new Request()),
            'pivot' => true
        ]);

        $this->crud->addField([
            'label' => __('Email'),
            'name' => 'email',
            'type' => 'email'
        ]);

        $this->crud->addField([
            'label' => __('Phone'),
            'name' => 'phone',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'label' => __('Website'),
            'name' => 'url',
            'type' => 'url'
        ]);

        $this->crud->addField([
            'label' => __('Address'),
            'name' => 'address',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'label' => __('Notes'),
            'name' => 'notes',
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'label' => __('Status'),
            'name' => 'status',
            'type' => 'checkbox'
        ]);

        // Filters
        $this->crud->addFilter([
            'name' => 'territory',
            'type' => 'select2_multiple',
            'label' => ucfirst(__('territory')),
            'placeholder' => __('Select a territory')
        ],
            api()->territoryList(Territory::DISTRITO | Territory::CONCELHO),
            function ($values) {
                $ids = DB::table('partners_territories')->select('partner_id');
                foreach (json_decode($values) as $value) {
                    $ids->orWhere('territory_id', 'LIKE', "$value%");
                }
                $this->crud->query->whereIn('id', $ids->pluck('partner_id')->toArray());
            });

        $this->crud->addFilter([
            'name' => 'category',
            'type' => 'select2_multiple',
            'label' => ucfirst(__('category')),
            'placeholder' => __('Select a category')
        ],
            api()->partnerCategoryList(),
            function ($values) {
                $ids = DB::table('partners_categories')->select('partner_id');
                foreach (json_decode($values) as $value) {
                    $ids->orWhere('partner_category_list_id', 'LIKE', "$value%");
                }
                $this->crud->query->whereIn('id', $ids->pluck('partner_id')->toArray());
            });

        $this->crud->addFilter([
            'name' => 'user',
            'type' => 'select2_ajax',
            'label' => ucfirst(__('volunteer')),
            'placeholder' => __('Select a volunteer')
        ],
            url('admin/user/ajax/filter/' . User::VOLUNTEER),
            function ($value) {
                $this->crud->addClause('where', 'user_id', $value);
            });

        $this->crud->addFilter([
            'type' => 'select2',
            'name' => 'status',
            'label' => __('Status')
        ],
            EnumHelper::translate('general.check'),
            function ($value) {
                $this->crud->addClause('where', 'status', $value);
            });

        $this->crud->query->with(['categories', 'territories', 'user']);

        // ------ DATATABLE EXPORT BUTTONS
        $this->crud->enableExportButtons();

        // add asterisk for fields that are required in PartnerRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // Add user to the partner
        $request->merge(['user_id' => backpack_user()->id]);

        return parent::storeCrud($request);
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud($request);
    }
}
