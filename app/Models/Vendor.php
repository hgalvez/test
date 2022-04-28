<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Vendor extends Model

{

    use HasFactory;

    protected $table ='vendors';
    protected $guard_name = 'api';

    protected$fillable=[

        'name',
        'phone',
        'address'
    ];

    public function products(){
            return $this->hasMany(Product::class);
        }

}