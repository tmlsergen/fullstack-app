<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LayerWithParent implements Rule
{
    protected ?int $parent_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $status = false;

        if ($this->parent_id === null && $value === 0) {
            $status = true;
        }

        if ($this->parent_id !== null && $value !== 0) {
            $status = true;
        }

        return $status;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
