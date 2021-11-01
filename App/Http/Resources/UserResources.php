<?php

namespace App\Http\Resources;

class UserResources
{
    public $data;
    public function __construct($data)
    {
        $data = [
            "id" => $data->id,
            "type" => $data->type,
            "username" => $data->username,
            "mobile" => $data->mobile,
            "email" => $data->email,
            "package_id" => $data->package_id,
            "city_id" => $data->city_id,
            "banned" => $data->banned,
            "email_verified_at" => $data->email_verified_at,
        ];
        $this->data = $data;
    }
}
