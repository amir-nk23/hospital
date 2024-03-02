<?php

namespace App\Models;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function jalaliDate(string $column='created_at', $notif = false)
    {
        if ($notif){

            return \verta($this->attributes[$column])->format('d-m-Y');
        }

        return \verta($this->attributes[$column])->format('Y-m-d H:i');

    }
}
