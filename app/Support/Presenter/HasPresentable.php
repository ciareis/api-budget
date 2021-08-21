<?php

namespace App\Support\Presenter;

use Exception;

trait HasPresentable
{
    public function present()
    {
        if ($this->presenter) {
            return new $this->presenter($this);
        }

        throw new Exception('Presenter is not defined.');
    }
}
