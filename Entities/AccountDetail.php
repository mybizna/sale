<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->integer('sale_no')->nullable()->html('text');
        $this->fields->integer('trn_no')->nullable()->html('text');
        $this->fields->date('trn_date')->nullable()->html('date');
        $this->fields->string('particulars')->nullable()->html('textarea');
        $this->fields->decimal('debit', 20, 2)->default(0.00)->html('date');
        $this->fields->decimal('credit', 20, 2)->default(0.00)->html('date');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['sale_no', 'trn_no', 'trn_date', 'debit', 'credit'];
        $structure['form'] = [
            ['label' => 'Sale No', 'class' => 'col-span-full', 'fields' => ['sale_no']],
            ['label' => 'Account Details', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['trn_no', 'trn_date']],
            ['label' => 'Amount', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['debit', 'credit']],
            ['label' => 'Particulars', 'class' => 'col-span-full', 'fields' => ['particulars']],
        ];
        $structure['filter'] = ['sale_no', 'trn_no'];

        return $structure;
    }
}
