<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Sale extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'voucher_no', 'vendor_id', 'vendor_name', 'billing_address', 'trn_date',
        'due_date', 'amount', 'tax', 'tax_zone_id', 'ref', 'status', 'purchase_order',
        'attachments', 'particulars',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['voucher_no', 'vender_name'];

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
    protected $table = "sale";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('voucher_no')->html('text')->ordering(true);
        $fields->name('vendor_id')->html('text')->ordering(true);
        $fields->name('vendor_name')->html('text')->ordering(true);
        $fields->name('billing_address')->html('text')->ordering(true);
        $fields->name('trn_date')->html('text')->ordering(true);
        $fields->name('due_date')->html('text')->ordering(true);
        $fields->name('amount')->html('text')->ordering(true);
        $fields->name('tax')->html('text')->ordering(true);

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

        $fields->name('voucher_no')->html('text')->group('w-1/2');
        $fields->name('vendor_id')->html('text')->group('w-1/2');
        $fields->name('vendor_name')->html('text')->group('w-1/2');
        $fields->name('billing_address')->html('text')->group('w-1/2');
        $fields->name('trn_date')->html('text')->group('w-1/2');
        $fields->name('due_date')->html('text')->group('w-1/2');
        $fields->name('amount')->html('text')->group('w-1/2');
        $fields->name('tax')->html('text')->group('w-1/2');
        $fields->name('tax_zone_id')->html('text')->group('w-1/2');
        $fields->name('ref')->html('text')->group('w-1/2');
        $fields->name('status')->html('text')->group('w-1/2');
        $fields->name('purchase_order')->html('text')->group('w-1/2');
        $fields->name('attachments')->html('text')->group('w-1/2');
        $fields->name('particulars')->html('text')->group('w-1/2');

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

        $fields->name('voucher_no')->html('text')->group('w-1/6');
        $fields->name('vendor_id')->html('text')->group('w-1/6');
        $fields->name('vendor_name')->html('text')->group('w-1/6');
        $fields->name('billing_address')->html('text')->group('w-1/6');
        $fields->name('trn_date')->html('text')->group('w-1/6');

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
        $this->fields->integer('voucher_no')->nullable();
        $this->fields->integer('vendor_id')->nullable();
        $this->fields->string('vendor_name')->nullable();
        $this->fields->string('billing_address')->nullable();
        $this->fields->date('trn_date')->nullable();
        $this->fields->date('due_date')->nullable();
        $this->fields->decimal('amount', 20, 2)->default(0.00);
        $this->fields->decimal('tax', 20, 2)->nullable();
        $this->fields->integer('tax_zone_id')->nullable();
        $this->fields->string('ref')->nullable();
        $this->fields->integer('status')->nullable();
        $this->fields->tinyInteger('purchase_order')->nullable();
        $this->fields->string('attachments')->nullable();
        $this->fields->string('particulars')->nullable();
    }
}
