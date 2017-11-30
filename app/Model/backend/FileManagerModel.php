<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class FileManagerModel extends Model
{
    protected $primaryKey = 'file_id';
    public $timestamps = false;
    protected $table='file_manager_list';
    protected $fillable=['file_name', 'file_path', 'permission', 'type', 'is_deleted', 'parent_id'];
}
