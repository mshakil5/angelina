<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    protected $fillable = ['user_id', 'document_type', 'file_path', 'original_name', 'notes'];

    public static array $types = [
        'bank_statement'    => 'Bank Statement',
        'passport'          => 'Passport',
        'share_code'        => 'Share Code',
        'dbs_acknowledgement' => 'DBS Acknowledgement',
        'dbs_certificate'   => 'DBS Certificate / DBS Number',
        'right_to_work'     => 'Right to Work',
        'other'             => 'Other Staff Record',
    ];

    public function getTypeLabelAttribute(): string
    {
        return self::$types[$this->document_type] ?? ucfirst($this->document_type);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}