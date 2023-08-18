<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->integer('voucher_no')->nullable()->html('text');
        $this->fields->date('trn_date')->nullable()->html('text');
        $this->fields->decimal('amount', 20, 2)->nullable()->html('amount');
        $this->fields->integer('ac_from')->nullable()->html('text');
        $this->fields->integer('ac_to')->nullable()->html('text');
        $this->fields->string('particulars')->nullable()->html('textarea');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['voucher_no', 'trn_date', 'amount', 'ac_from', 'ac_to'];
        $structure['form'] = [
            ['label' => 'Voucher No', 'class' => 'col-span-full', 'fields' => ['voucher_no']],
            ['label' => 'Transfer Voucher', 'class' => 'col-span-6', 'fields' => ['trn_date', 'amount']],
            ['label' => 'From - To', 'class' => 'col-span-6', 'fields' => ['ac_from', 'ac_to']],
            ['label' => 'Particulars', 'class' => 'col-span-full', 'fields' => ['particulars']],
        ];
        $structure['filter'] = ['voucher_no', 'trn_date', 'amount', 'ac_from', 'ac_to'];

        return $structure;
    }
}
