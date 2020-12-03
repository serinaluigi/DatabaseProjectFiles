<?php

    // under sa app
    // namespace App;

    // change namespace to App\Models if you put your model inside models
    namespace App\Models;

    // library to create Model under lumen
    use Illuminate\Database\Eloquent\Model;

    class User extends Model{
        // The code below will not require the field create_at and update_at

        // name of table
        public $timestamps = false;
         private $table = 'tbluser';
        // column sa table
         protected $fillable = [
            'username', 'password'
         ];


        //protected $primaryKey = 'userid';
        protected $hidden = [
            'password',
        ];
    }
