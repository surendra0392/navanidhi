<?php

namespace Webkul\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Customer\Contracts\ContactEnquiry as ContactEnquiryContract;

class ContactEnquiry extends Model implements ContactEnquiryContract
{
    protected $table = 'contact_enquiries';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
