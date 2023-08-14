<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class SaleReturn extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'invoice_id', 'voucher_no', 'customer_id', 'customer_name', 'trn_date', 'amount',
        'discount', 'discount_type', 'tax', 'reason', 'comments', 'status',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['invoice_id', 'customer_id'];

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
    protected $table = "sale_return";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('invoice_id')->html('text')->ordering(true);
        $fields->name('voucher_no')->html('text')->ordering(true);
        $fields->name('customer_id')->html('text')->ordering(true);
        $fields->name('customer_name')->html('text')->ordering(true);
        $fields->name('trn_date')->html('text')->ordering(true);
        $fields->name('amount')->html('text')->ordering(true);
        $fields->name('discount')->html('text')->ordering(true);
        $fields->name('discount_type')->html('text')->ordering(true);

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

        $fields->name('invoice_id')->html('text')->group('w-1/2');
        $fields->name('voucher_no')->html('text')->group('w-1/2');
        $fields->name('customer_id')->html('text')->group('w-1/2');
        $fields->name('customer_name')->html('text')->group('w-1/2');
        $fields->name('trn_date')->html('text')->group('w-1/2');
        $fields->name('amount')->html('text')->group('w-1/2');
        $fields->name('discount')->html('text')->group('w-1/2');
        $fields->name('discount_type')->html('text')->group('w-1/2');
        $fields->name('tax')->html('text')->group('w-1/2');
        $fields->name('reason')->html('text')->group('w-1/2');
        $fields->name('comments')->html('text')->group('w-1/2');
        $fields->name('status')->html('text')->group('w-1/2');

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

        $fields->name('invoice_id')->html('text')->group('w-1/6');
        $fields->name('voucher_no')->html('text')->group('w-1/6');
        $fields->name('customer_id')->html('text')->group('w-1/6');
        $fields->name('customer_name')->html('text')->group('w-1/6');
        $fields->name('trn_date')->html('text')->group('w-1/6');
        $fields->name('amount')->html('text')->group('w-1/6');
        $fields->name('discount')->html('text')->group('w-1/6');
        $fields->name('discount_type')->html('text')->group('w-1/6');

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
        $this->fields->integer('invoice_id');
        $this->fields->integer('voucher_no');
        $this->fields->integer('customer_id')->nullable();
        $this->fields->string('customer_name')->nullable();
        $this->fields->date('trn_date');
        $this->fields->decimal('amount', 20, 2);
        $this->fields->decimal('discount', 20, 2)->default(0.00);
        $this->fields->string('discount_type')->nullable();
        $this->fields->decimal('tax', 20, 2)->default(0.00);
        $this->fields->text('reason')->nullable();
        $this->fields->text('comments')->nullable();
        $this->fields->integer('status')->nullable()->comment("0 means drafted, 1 means confirmed return");
    }
}
