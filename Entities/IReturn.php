<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class IReturn extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'invoice_id', 'voucher_no', 'vendor_id', 'vendor_name', 'trn_date', 'amount',
        'discount', 'discount_type', 'tax', 'reason', 'comments', 'status',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['invoice_id', 'voucher_no'];

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
    public function fields(Blueprint $table): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->integer('invoice_id')->html('text');
        $this->fields->integer('voucher_no')->html('text');
        $this->fields->integer('vendor_id')->nullable()->html('text');
        $this->fields->string('vendor_name')->nullable()->html('text');
        $this->fields->date('trn_date')->html('text');
        $this->fields->decimal('amount', 20, 2)->html('amount');
        $this->fields->decimal('discount', 20, 2)->default(0.00)->html('amount');
        $this->fields->string('discount_type')->nullable()->html('text');
        $this->fields->decimal('tax', 20, 2)->default(0.00)->html('amount');
        $this->fields->text('reason')->nullable()->html('textarea');
        $this->fields->text('comments')->nullable()->html('textarea');
        $this->fields->integer('status')->nullable()->html('switch')->comment("0 means drafted, 1 means confirmed return");
    }
}
