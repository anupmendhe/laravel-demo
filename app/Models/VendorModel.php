<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 class VendorModel extends Model
{
     protected $table   =  'vendor';

    protected $fillable = [
                            'user_id',
                            'store_name',
                            'store_address',
                            'store_description',
                            'contact_number',
                            'profile_picture',
                            'banner_picture',
                           ];

    public function user_details(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
       

}
