<?php

namespace koolreport\excel;

use koolreport\core\Utility as Util;

class PivotTable extends Table
{
    protected function setType()
    {
        $this->params['type'] = 'pivottable';
    }
}