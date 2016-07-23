<?php

namespace larashop;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'orders';
    protected $fillable = [ 'client_id','delivery_city','delivery_adr','delivery_np','delivery_type','pay_type','code','comment', 'ttn' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('larashop\Clients', 'id', 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('larashop\OrderItems', 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('larashop\OrderFiles', 'order_id', 'id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNeworders($query)
    {
        return $query->where('status', 'new');
    }
}
