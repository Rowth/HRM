<?php

namespace App\Models;

/**
 * Class Bank_detail
 * @package App\Models
 */
class Bank_detail extends BaseModel
{
    protected $fillable = ['employee_id', 'account_name', 'account_number', 'bank', 'pan', 'ifsc', 'branch','tax_payer_id','bin'];
    protected $guarded = [''];

    /**
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
