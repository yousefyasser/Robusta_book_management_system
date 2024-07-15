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
            'min' => 10,
            'max' => 1000
        ]
    ];

    public static function get_validation_errors()
    {
        $errors = [];

        // Date validation
        if (strtotime($_POST['publishing_date']) > time()) {
            $errors['publishing_date'] = 'The publishing date cannot be in the future.';
        }

        // Range validation
        foreach ($_POST as $field => $value) {
            $fieldRules = Validator::RULES[$field];

            if (Validator::validate_range($fieldRules, $value)) {
                $errors[$field] = "{$field} must be between {$fieldRules['min']} and {$fieldRules['max']} characters.";
            }
        }

        // File validation
        if (!Validator::validate_file('cover_image')) {
            $errors['cover_image'] = "The cover image must be a valid image file.";
        }

        return $errors;
    }

    private static function validate_range($fieldRules, $value)
    {
        $belowMin = isset($fieldRules['min']) && strlen($value) < $fieldRules['min'];
        $aboveMax = isset($fieldRules['max']) && strlen($value) > $fieldRules['max'];

        return $belowMin || $aboveMax;
    }

    private static function validate_file($file)
    {
        $fileType = $_FILES[$file]['type'];
        $allowedFormats = Validator::RULES[$file]['format'];

        return in_array($fileType, $allowedFormats);
    }
}
