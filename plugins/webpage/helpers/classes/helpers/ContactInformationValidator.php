<?php namespace Webpage\Helpers\Classes\Helpers;

class ContactInformationValidator {
    public static function generatePhoneNumberLink($number): ?string {
        $cleanNumber = self::normalizePhoneNumber($number);

        if (self::isPhoneNumber($cleanNumber)) {
            return "tel:{$cleanNumber}";
        }

        return null;
    }

    private static function normalizePhoneNumber($number): string {
        // Remove all non-digit characters except +
        $pattern = '/[^\d+]/';
        return preg_replace($pattern, '', $number);
    }

    private static function isPhoneNumber($number): bool {
        $pattern = '/^\+?\(?[0-9]{3}\)?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/';
        return preg_match($pattern, $number);
    }

    public static function generateEmailLink($email): ?string {
        if (self::isEmailAddress($email)) {
            return "mailto:{$email}";
        }
        
        return null;
    }

    private static function isEmailAddress($email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}