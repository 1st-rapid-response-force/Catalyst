<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 4/10/2016
 * Time: 11:54 PM
 */

namespace App\Models\Traits;


trait EncryptionTrait
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            $value = \Crypt::decrypt($value);
        }
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = \Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}