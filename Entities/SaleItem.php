<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class SaleItem extends BaseModel
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



 
}