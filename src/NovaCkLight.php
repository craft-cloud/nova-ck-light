<?php

namespace CraftCloud\NovaCkLight;

use Laravel\Nova\Fields\Field;

class NovaCkLight extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-ck-light';

    /**
     * Set the field to only accept images
     *
     * @return $this
     */
    public function imageOnly(bool $imageOnly = true)
    {
        return $this->withMeta(['imageOnly' => $imageOnly]);
    }

    /**
     * CK toolbar options
     *
     * @return $this
     */
    public function toolbar(array $toolbar = [])
    {
        return $this->withMeta(['toolbar' => $toolbar]);
    }
}
