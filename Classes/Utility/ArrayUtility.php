<?php

declare(strict_types=1);

namespace Extcode\Contacts\Utility;

use TYPO3\CMS\Core\Utility\Exception\MissingArrayPathException;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Core\Utility\StringUtility;

/**
 * Class containing more array helper functions.
 */
class ArrayUtility
{
    /**
     * Search $haystack recursive for keys $needle. Return an array that contains
     * all paths to the key as dot-separated strings, as expected by
     * TYPO3\CMS\Extbase\Utility\ArrayUtility::getValueByPath().
     *
     * @param mixed[] $haystack
     * @return string[]
     */
    public static function getPathsToKey(array $haystack, string $needle, bool $includeNeedle = false, string $path = ''): array
    {
        $result = [];
        if (array_key_exists($needle, $haystack)) {
            $result[] = $path . ($includeNeedle ? '.' . $needle : '');
        }
        if ($path !== '') {
            $path .= '.';
        }
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::getPathsToKey($value, $needle, $includeNeedle, $path . $key));
            }
        }
        return $result;
    }

    /**
     * @param mixed[] $haystack
     */
    public static function removeValue(mixed $needle, array &$haystack, bool $strict = false): void
    {
        if (($key = array_search($needle, $haystack, $strict)) !== false) {
            unset($haystack[$key]);
        }
    }

    /**
     * @param mixed[] $settings
     */
    public static function getIntegerValueByPath(array $settings, string $path, string $delimiter = '/'): int
    {
        return MathUtility::forceIntegerInRange(
            self::getMixedValueByPath($settings, $path, $delimiter),
            0
        );
    }

    /**
     * @param mixed[] $settings
     */
    public static function getBooleanValueByPath(array $settings, string $path, string $delimiter = '/'): bool
    {
        $value = self::getMixedValueByPath($settings, $path, $delimiter);
        return is_scalar($value) && $value;
    }

    /**
     * @param mixed[] $settings
     */
    public static function getIntegerValueByPathOrNull(array $settings, string $path, string $delimiter = '/'): ?int
    {
        try {
            return self::getIntegerValueByPath($settings, $path, $delimiter);
        } catch (MissingArrayPathException) {
            return null;
        }
    }

    /**
     * @param mixed[] $settings
     */
    public static function getBooleanValueByPathOrNull(array $settings, string $path, string $delimiter = '/'): ?bool
    {
        try {
            return self::getBooleanValueByPath($settings, $path, $delimiter);
        } catch (MissingArrayPathException) {
            return null;
        }
    }

    /**
     * @param mixed[] $settings
     */
    public static function getStringValueByPath(array $settings, string $path, string $delimiter = '/'): string
    {
        $value = StringUtility::cast(self::getMixedValueByPath($settings, $path, $delimiter), '');
        return $value ?? '';
    }

    /**
     * @param mixed[] $settings
     */
    public static function getStringValueByPathOrNull(array $settings, string $path, string $delimiter = '/'): ?string
    {
        try {
            return self::getStringValueByPath($settings, $path, $delimiter);
        } catch (MissingArrayPathException) {
            return null;
        }
    }

    /**
     * @param mixed[] $settings
     * @return mixed[]
     */
    public static function getArrayValueByPath(array $settings, string $path, string $delimiter = '/'): array
    {
        $value = self::getMixedValueByPath($settings, $path, $delimiter);
        return is_array($value) ? $value : [];
    }

    /**
     * @param mixed[] $settings
     * @return mixed[]|null
     */
    public static function getArrayValueByPathOrNull(array $settings, string $path, string $delimiter = '/'): ?array
    {
        try {
            return self::getArrayValueByPath($settings, $path, $delimiter);
        } catch (MissingArrayPathException) {
            return null;
        }
    }

    /**
     * @param mixed[] $settings
     */
    public static function getMixedValueByPath(array $settings, string $path, string $delimiter): mixed
    {
        return \TYPO3\CMS\Core\Utility\ArrayUtility::getValueByPath($settings, $path, $delimiter);
    }

    /**
     * @param mixed[] $settings
     */
    public static function getMixedValueByPathOrNull(array $settings, string $path, string $delimiter): mixed
    {
        try {
            return self::getMixedValueByPath($settings, $path, $delimiter);
        } catch (MissingArrayPathException) {
            return null;
        }
    }
}
