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
        'publishing_date' => [
            'required' => true
        ],
        'cover_image' => [
            'required' => true,
            'format' => ['image/jpeg', 'image/png', 'image/gif', 'image/bmp']
        ],
        'summary' => [
            'min' => 10,
            'max' => 1000
        ]
    ];

    public static function get_validation_errors(): array
    {
        $fileErrors = self::validate($_FILES, [self::class, 'get_file_error']);
        $rangeErrors = self::validate($_POST, [self::class, 'get_range_error']);

        return array_merge($fileErrors, $rangeErrors);
    }

    private static function validate(array $data, callable $errorCallback): array
    {
        $errors = [];

        foreach ($data as $field => $value) {
            if (!array_key_exists($field, self::RULES)) {
                continue;
            }

            $error = call_user_func($errorCallback, $field, $value);
            if ($error) {
                $errors[$field] = $error;
            }
        }

        return $errors;
    }

    private static function get_range_error(string $field, string $value): string | null
    {
        $fieldRules = self::RULES[$field];

        $empty = isset($fieldRules['required']) && empty($value);
        $belowMin = isset($fieldRules['min']) && strlen($value) < $fieldRules['min'];
        $aboveMax = isset($fieldRules['max']) && strlen($value) > $fieldRules['max'];

        return ($empty || $belowMin || $aboveMax) ? "{$field} has invalid length." : null;
    }

    private static function get_file_error(string $file, array $fileData): string | null
    {
        $error_type = [
            "The cover image must be a valid image file.",
            "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
            "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
            "The uploaded file was only partially uploaded.",
            "No file was uploaded."
        ];

        $fieldRules = self::RULES[$file];

        if (isset($fieldRules['required']) && $fileData['size'] === 0) {
            return $error_type[4];
        }
        if ($fileData['error'] === 4) {
            return null;
        }
        if ($fileData['error'] > 0) {
            return $error_type[$fileData['error']];
        }

        return !in_array($fileData['type'], $fieldRules['format']) ? $error_type[0] : null;
    }
}
