<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueLink implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // TODO: call the api to find out if this link already exists or not.
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The link already exists in our database.';
    }
}
