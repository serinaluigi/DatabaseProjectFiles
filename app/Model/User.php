<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class User extends Model{

    public $timestamps = false;
    protected $table = 'tbluser';
    // column sa table
    protected $fillable = [
        'username', 'password', 'jid'
    ];

    protected $hidden = [
        'password',
    ];
}
