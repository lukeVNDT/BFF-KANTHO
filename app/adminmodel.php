<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adminmodel extends Model
{
    protected $table = "staff";
    protected $filltable = ['staff_id','staff_email','staff_mailbox', 'staff_name','staff_avatar','staff_phone','staff_address'];
    protected $primaryKey = 'staff_id';
}
