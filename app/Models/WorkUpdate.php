<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class WorkUpdate extends Model {
    protected $fillable = ['user_id','date','morning_work','evening_work','file_paths','file_names'];

    protected $casts = [
        'file_paths' => 'array',
        'file_names' => 'array',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}