<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        "name",
        "domain",
        "webmin_url"
    ];
}
