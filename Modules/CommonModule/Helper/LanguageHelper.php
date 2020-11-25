<?php

namespace Modules\CommonModule\Helper;

use Modules\CommonModule\Entities\Language;

class LanguageHelper
{
  /**
   * Retrieve all active lang from db.
   * active lang has [1] property.
   *
   * @return void
   */
  public function getLang()
  {
    $lang = Language::all();
    return $lang;
  }
}
