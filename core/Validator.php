<?php

namespace core;

class Validator
{
    const RULES = [
        'title' => [
            'min' => 3,
            'max' => 255
        ],
        'author' => [
            'min' => 3,
            'max' => 255
        ],
        'publishing_date' => [],
        'cover_image' => [
            'format' => ['image/jpeg', 'image/png', 'image/gif', 'image/bmp']
        ],
        'summary' => [
            'max' => 1000
        ]
    ];

    public static function get_validation_errors()
    {
        $errors = [];

        // Date validation
        if (Validator::validate_date($_POST['publishing_date'])) {
            $errors['publishing_date'] = 'Invalid publishing date.';
        }

        // Range validation
        foreach ($_POST as $field => $value) {
            if (!array_key_exists($field, Validator::RULES)) {
                continue;
            }

            $fieldRules = Validator::RULES[$field];

            if (Validator::validate_range($fieldRules, $value)) {
                $errors[$field] = "{$field} must be between {$fieldRules['min']} and {$fieldRules['max']} characters.";
            }
        }

        // File validation
        $fileErrors = Validator::get_file_errors('cover_image');
        if ($fileErrors) {
            $errors['cover_image'] = $fileErrors;
        }

        return $errors;
    }

    // checks if the date is in the future or not in the correct format
    private static function validate_date($date)
    {
        return empty($date) || (strtotime($date) > time()) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date);
    }

    private static function validate_range($fieldRules, $value)
    {
        $belowMin = isset($fieldRules['min']) && strlen($value) < $fieldRules['min'];
        $aboveMax = isset($fieldRules['max']) && strlen($value) > $fieldRules['max'];

        return $belowMin || $aboveMax;
    }

    private static function get_file_errors($file)
    {
        $error_type = [
            "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
            "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
            "The uploaded file was only partially uploaded.",
            "The cover image must be a valid image file."
        ];

        if ($_FILES[$file]['error'] === 4) {
            return null;
        }
        if ($_FILES[$file]['error'] > 0) {
            return $error_type[$_FILES[$file]['error'] - 1];
        }

        $fileType = $_FILES[$file]['type'];
        $allowedFormats = Validator::RULES[$file]['format'];

        return !in_array($fileType, $allowedFormats) ? $error_type[array_key_last($error_type)] : null;
    }
}
