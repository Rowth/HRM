<?php
namespace App\Models;

/**
 * Class Employee_document
 * @package App\Models
 */
class Employee_document extends BaseModel
{
    protected $fillable = ['employee_id','type','status','filename'];
    protected $guarded = ['id'];

    protected $appends = ['document_url'];

    /**
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getDocumentUrlAttribute()
    {
        return asset_url('employee_documents/'.$this->type.'/'.$this->filename);
    }
}
