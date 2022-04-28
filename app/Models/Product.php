<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Product extends Model

{

    use HasFactory;

    protected $table ='products';
    protected $guard_name = 'api';

    protected$fillable=[

        'name',
        'descriptioin',
        'stock',
        'price',
        'img',
        'user_id',
        'vendor_id'

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function scopeByName($query, $name){
        return  $query->orWhere('name','like','%'. $name .'%');
    }

    public function scopeByDescription($query, $description){
        return  $query->orWhere('description','like','%'. $description .'%');
    }

    public function scopeByVendor($query, $name){
        return  $query->whereHas('vendor',function ($query) use ($name){
                    $query->where('name','like','%'. $name .'%');
        });
    }

}