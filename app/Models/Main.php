<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Cache;

    class Main extends Model{

        protected $table = 'tbluser';

        protected $fillable = [
            'username', 'password'
        ];

        public $timestamps = false;
        //protected $primaryKey = 'userid';
        protected $hidden = [
            'password',
        ];

    }
