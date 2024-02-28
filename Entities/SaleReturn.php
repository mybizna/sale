<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->integer('invoice_id')->html('text');
        $this->fields->integer('voucher_no')->html('text');
        $this->fields->integer('customer_id')->nullable()->html('text');
        $this->fields->string('customer_name')->nullable()->html('text');
        $this->fields->date('trn_date')->html('date');
        $this->fields->decimal('amount', 20, 2)->html('amount');
        $this->fields->decimal('discount', 20, 2)->default(0.00)->html('amount');
        $this->fields->string('discount_type')->nullable()->html('text');
        $this->fields->decimal('tax', 20, 2)->default(0.00)->html('amount');
        $this->fields->text('reason')->nullable()->html('textarea');
        $this->fields->text('comments')->nullable()->html('textarea');
        $this->fields->integer('status')->nullable()->html('switch')->comment("0 means drafted, 1 means confirmed return");
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['invoice_id', 'voucher_no', 'customer_id', 'customer_name', 'trn_date', 'amount', 'discount', 'discount_type', 'status'];
        $structure['form'] = [
            ['label' => 'Sale Return Voucher No', 'class' => 'col-span-full', 'fields' => ['voucher_no']],
            ['label' => 'Sale Return Detail', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['invoice_id', 'voucher_no', 'customer_id', 'customer_name', 'trn_date']],
            ['label' => 'Sale Return Other Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['amount', 'discount', 'discount_type', 'tax', 'status']],
            ['label' => '', 'class' => 'col-span-full', 'fields' => ['reason']],
            ['label' => '', 'class' => 'col-span-full', 'fields' => ['comments']],
        ];
        $structure['filter'] = ['invoice_id', 'voucher_no', 'customer_id'];

        return $structure;
    }
}
