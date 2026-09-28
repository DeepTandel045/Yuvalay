<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidRealPhoneNumber implements Rule
{
    protected $message = 'Please provide a valid 10-digit mobile number.';

    public function passes($attribute, $value)
    {
        if (empty($value)) {
            return false;
        }

        // Clean value: remove spaces, dashes, parentheses, +, etc.
        $clean = preg_replace('/[^0-9]/', '', (string)$value);

        // Strip leading Indian country code 91 if length is 12
        if (strlen($clean) === 12 && str_starts_with($clean, '91')) {
            $clean = substr($clean, 2);
        }

        // Strip leading 0 if length is 11
        if (strlen($clean) === 11 && str_starts_with($clean, '0')) {
            $clean = substr($clean, 1);
        }

        // Condition 1: Must not be less than 10 digits
        if (strlen($clean) < 10) {
            $this->message = 'Phone number must contain at least 10 digits.';
            return false;
        }

        // Condition 2: Stop fake entries starting with 12345
        if (str_starts_with($clean, '12345')) {
            $this->message = 'Please provide a genuine mobile number. Test numbers starting with 12345 are not accepted.';
            return false;
        }

        // Condition 3: Reject repeating dummy sequences (e.g. 0000000000, 1111111111, 9999999999)
        if (preg_match('/^(\d)\1{9,}$/', $clean)) {
            $this->message = 'Please enter a genuine, active mobile number (repeating digits are not allowed).';
            return false;
        }

        // Condition 4: Reject common sequential dummy patterns
        if ($clean === '1234567890' || $clean === '0123456789' || $clean === '9876543210') {
            $this->message = 'Sequential test numbers are not accepted. Please provide your real phone number.';
            return false;
        }

        // Condition 5: Valid mobile numbers in India must start with 6, 7, 8, or 9
        if (strlen($clean) === 10 && !preg_match('/^[6-9]/', $clean)) {
            $this->message = 'Valid mobile numbers must start with 6, 7, 8, or 9.';
            return false;
        }

        return true;
    }

    public function message()
    {
        return $this->message;
    }
}
