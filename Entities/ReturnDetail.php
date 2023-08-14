<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class ReturnDetail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'invoice_details_id', 'trn_no', 'product_id', 'qty', 'unit_price', 'discount',
        'tax', 'item_total', 'ecommerce_type',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['invoice_details_id', 'trn_no'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "sale_return_detail";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('invoice_details_id')->html('text')->ordering(true);
        $fields->name('trn_no')->html('text')->ordering(true);
        $fields->name('product_id')->html('text')->ordering(true);
        $fields->name('qty')->html('text')->ordering(true);
        $fields->name('unit_price')->html('text')->ordering(true);
        $fields->name('discount')->html('text')->ordering(true);
        $fields->name('tax')->html('text')->ordering(true);
        $fields->name('item_total')->html('text')->ordering(true);
        $fields->name('ecommerce_type')->html('text')->ordering(true);

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_details_id')->html('text')->group('w-1/2');
        $fields->name('trn_no')->html('text')->group('w-1/2');
        $fields->name('product_id')->html('text')->group('w-1/2');
        $fields->name('qty')->html('text')->group('w-1/2');
        $fields->name('unit_price')->html('text')->group('w-1/2');
        $fields->name('discount')->html('text')->group('w-1/2');
        $fields->name('tax')->html('text')->group('w-1/2');
        $fields->name('item_total')->html('text')->group('w-1/2');
        $fields->name('ecommerce_type')->html('text')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_details_id')->html('text')->group('w-1/6');
        $fields->name('trn_no')->html('text')->group('w-1/6');
        $fields->name('product_id')->html('text')->group('w-1/6');
        $fields->name('qty')->html('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $this->fields->increments('id');
        $this->fields->integer('invoice_details_id');
        $this->fields->integer('trn_no');
        $this->fields->integer('product_id');
        $this->fields->integer('qty');
        $this->fields->decimal('unit_price', 20, 2);
        $this->fields->decimal('discount', 20, 2)->default(0.00);
        $this->fields->decimal('tax', 20, 2)->default(0.00);
        $this->fields->decimal('item_total', 20, 2);
        $this->fields->string('ecommerce_type')->nullable();
    }
}
