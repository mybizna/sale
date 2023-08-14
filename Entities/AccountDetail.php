<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class AccountDetail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'sale_no', 'trn_no', 'trn_date', 'particulars', 'debit', 'credit',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['sale_no', 'trn_no'];

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
    protected $table = "sale_account_detail";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('sale_no')->html('text')->ordering(true);
        $fields->name('trn_no')->html('text')->ordering(true);
        $fields->name('trn_date')->html('date')->ordering(true);
        $fields->name('debit')->html('text')->ordering(true);
        $fields->name('credit')->html('text')->ordering(true);

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

        $fields->name('sale_no')->html('text')->group('w-1/2');
        $fields->name('trn_no')->html('text')->group('w-1/2');
        $fields->name('trn_date')->html('date')->group('w-1/2');
        $fields->name('debit')->html('text')->group('w-1/2');
        $fields->name('credit')->html('text')->group('w-1/2');
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

        $fields->name('sale_no')->html('text')->group('w-1/6');
        $fields->name('trn_no')->html('text')->group('w-1/6');
        $fields->name('trn_date')->html('date')->group('w-1/6');
        $fields->name('debit')->html('text')->group('w-1/6');
        $fields->name('credit')->html('text')->group('w-1/6');

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
        $this->fields->integer('sale_no')->nullable();
        $this->fields->integer('trn_no')->nullable();
        $this->fields->date('trn_date')->nullable();
        $this->fields->string('particulars')->nullable();
        $this->fields->decimal('debit', 20, 2)->default(0.00);
        $this->fields->decimal('credit', 20, 2)->default(0.00);
    }
}
