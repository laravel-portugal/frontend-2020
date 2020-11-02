<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueLink implements Rule
{
    protected static bool $fake = false;

    public static function isFake(): bool
    {
        return self::$fake;
    }

    public static function fake(bool $fake = true): void
    {
        self::$fake = $fake;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (self::$fake) {
            return false;
        }

        // TODO: call the api to find out if this link already exists or not.
        return true;
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
