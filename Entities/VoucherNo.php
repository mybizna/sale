<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class VoucherNo extends BaseModel
{

    protected $fillable = ['type', 'currency', 'editable'];
    public $migrationDependancy = [];
    protected $table = "sale_voucher_no";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('type')->type('text')->ordering(true);
        $fields->name('currency')->type('text')->ordering(true);
        $fields->name('editable')->type('switch')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('currency')->type('text')->group('w-1/2');
        $fields->name('editable')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('type')->type('text')->group('w-1/6');
        $fields->name('currency')->type('text')->group('w-1/6');
        $fields->name('editable')->type('switch')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('type')->nullable();
        $table->string('currency', 50)->nullable();
        $table->boolean('editable')->default(0);
    }
}
