<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model{

        protected $table = 'student';
        // column sa table

        protected $fillable = [
            'username', 'password', 'gender','jobid',
        ];

        public $timestamps = false;
        protected $primaryKey = 'sid';
        protected $hidden = ['password'];
    }