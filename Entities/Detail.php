<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Detail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trn_no', 'product_id', 'qty', 'price', 'amount', 'tax', 'tax_cat_id',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['trn_no', 'product_id'];

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
    protected $table = "sale_detail";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('trn_no')->html('text')->ordering(true);
        $fields->name('product_id')->html('text')->ordering(true);
        $fields->name('qty')->html('text')->ordering(true);
        $fields->name('price')->html('text')->ordering(true);
        $fields->name('amount')->html('text')->ordering(true);
        $fields->name('tax')->html('text')->ordering(true);
        $fields->name('tax_cat_id')->html('text')->ordering(true);

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

        $fields->name('trn_no')->html('text')->group('w-1/2');
        $fields->name('product_id')->html('text')->group('w-1/2');
        $fields->name('qty')->html('text')->group('w-1/2');
        $fields->name('price')->html('text')->group('w-1/2');
        $fields->name('amount')->html('text')->group('w-1/2');
        $fields->name('tax')->html('text')->group('w-1/2');
        $fields->name('tax_cat_id')->html('text')->group('w-1/2');

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

        $fields->name('trn_no')->html('text')->group('w-1/6');
        $fields->name('product_id')->html('text')->group('w-1/6');
        $fields->name('qty')->html('text')->group('w-1/6');
        $fields->name('price')->html('text')->group('w-1/6');
        $fields->name('amount')->html('text')->group('w-1/6');

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
        $this->fields->integer('trn_no')->nullable();
        $this->fields->integer('product_id')->nullable();
        $this->fields->integer('qty')->nullable();
        $this->fields->decimal('price', 20, 2)->default(0.00);
        $this->fields->decimal('amount', 20, 2)->default(0.00);
        $this->fields->decimal('tax', 20, 2)->nullable();
        $this->fields->integer('tax_cat_id')->nullable();
    }
}
