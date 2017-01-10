<?php

namespace App\Helpers\Macros;

use App\Helpers\Macros\Traits\ProfileEdit;
use Collective\Html\FormBuilder;

/**
 * Class Macros
 * @package App\Http
 */
class Macros extends FormBuilder
{
	use ProfileEdit;
}