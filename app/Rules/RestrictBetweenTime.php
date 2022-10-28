<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class RestrictBetweenTime implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $timeFrom;
    protected $timeTo;
    public function __construct($timeFrom, $timeTo)
    {
        //
        $this->timeFrom = $timeFrom;
        $this->timeTo = $timeTo;
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
        $timezone = "UTC";

        return Carbon::now($timezone)->between(Carbon::createFromTimeString($this->timeFrom, $timezone), Carbon::createFromTimeString($this->timeTo, $timezone));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Come back during the working hours.';
    }
}
