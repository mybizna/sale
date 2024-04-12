<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class OrderItem extends BaseModel
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->integer('voucher_no')->nullable()->html('text');
        $this->fields->integer('vendor_id')->nullable()->html('text');
        $this->fields->string('vendor_name')->nullable()->html('text');
        $this->fields->string('billing_address')->nullable()->html('text');
        $this->fields->date('trn_date')->nullable()->html('text');
        $this->fields->date('due_date')->nullable()->html('text');
        $this->fields->decimal('amount', 20, 2)->default(0.00)->html('amount');
        $this->fields->decimal('tax', 20, 2)->nullable()->html('amount');
        $this->fields->integer('tax_zone_id')->nullable()->html('text');
        $this->fields->string('ref')->nullable()->html('text');
        $this->fields->integer('status')->nullable()->html('text');
        $this->fields->tinyInteger('purchase_order')->nullable()->html('text');
        $this->fields->string('attachments')->nullable()->html('text');
        $this->fields->string('particulars')->nullable()->html('text');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure['table'] = ['voucher_no', 'vendor_id', 'vendor_name', 'billing_address', 'trn_date', 'due_date', 'amount', 'status', 'purchase_order'];
        $structure['form'] = [
            ['label' => 'Sale Voucher No', 'class' => 'col-span-full', 'fields' => ['voucher_no']],
            ['label' => 'Sale Detail', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['vendor_id', 'vendor_name', 'billing_address', 'trn_date', 'due_date']],
            ['label' => 'Sale Other Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['amount', 'tax', 'tax_zone_id', 'ref', 'status', 'purchase_order']],
            ['label' => 'Sale Attachments', 'class' => 'col-span-full', 'fields' => ['attachments']],
            ['label' => 'Sale Particulars', 'class' => 'col-span-full', 'fields' => ['particulars']],
        ];
        $structure['filter'] = ['voucher_no', 'vendor_id', 'vendor_name'];

        return $structure;
    }

    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {

    }
}
