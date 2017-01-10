<?php

namespace App\Helpers\Macros\Traits;

/**
 * Class Dropdowns
 * @package App\Services\Macros
 */
trait ProfileEdit
{
    public function selectGender($name, $selected = null, $options = [])
    {
        $list = [
            true  => '男',
            false => '女',
        ];

        return $this->select($name, $list, $selected, $options);
    }

    public function fileUploadInput($name = file, $id = file)
    {
        return '<input type="file" style="opacity:0" accept="image/gif,image/jpeg,image/jpg,image/png" name="' . $name . '" id="' . $id . '">';
    }
}