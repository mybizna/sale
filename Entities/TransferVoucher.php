<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class TransferVoucher extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['voucher_no', 'trn_date', 'amount', 'ac_from', 'ac_to', 'particulars'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['vouncher_no', 'amount'];

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
    protected $table = "sale_transfer_voucher";

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
        $fields->name('trn_date')->html('text')->ordering(true);
        $fields->name('amount')->html('text')->ordering(true);
        $fields->name('ac_from')->html('text')->ordering(true);
        $fields->name('ac_to')->html('text')->ordering(true);
        $fields->name('particulars')->html('text')->ordering(true);

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
        $fields->name('trn_date')->html('text')->group('w-1/2');
        $fields->name('amount')->html('text')->group('w-1/2');
        $fields->name('ac_from')->html('text')->group('w-1/2');
        $fields->name('ac_to')->html('text')->group('w-1/2');
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
        $fields->name('trn_date')->html('text')->group('w-1/6');
        $fields->name('amount')->html('text')->group('w-1/6');
        $fields->name('ac_from')->html('text')->group('w-1/6');

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
        $this->fields->date('trn_date')->nullable();
        $this->fields->decimal('amount', 20, 2)->nullable();
        $this->fields->integer('ac_from')->nullable();
        $this->fields->integer('ac_to')->nullable();
        $this->fields->string('particulars')->nullable();
    }
}
