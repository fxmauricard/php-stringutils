<?php
namespace Fxmauricard;

/**
 * Class that contains useful methods for manipulating string.
 */
class StringUtils
{
    /**
     * Method that checks if a string starts with another one.
     *
     * @param  string  $haystack The string in which we're searching in.
     * @param  string  $needle   The string we are searching.
     * @param  boolean $case     If it's case sensitive or not.
     * @return boolean If the haystack starts by the needle.
     */
    public static function startsWith($haystack, $needle, $case = true)
    {
        $method = ($case) ? 'strcmp' : 'strcasecmp';

        return (0 === $method(substr($haystack, 0, strlen($needle)), $needle));
    }
    /**
     * Method that checks if a string ends with another one.
     *
     * @param  string  $haystack The string in which we're searching in.
     * @param  string  $needle   The string we are searching.
     * @param  boolean $case     If it's case sensitive or not.
     * @return boolean If the haystack ends by the needle.
     */
    public static function endsWith($haystack, $needle, $case = true)
    {
        $method = ($case) ? 'strcmp' : 'strcasecmp';

        return (0 === $method(substr($haystack, strlen($haystack) - strlen($needle)), $needle));
    }
    /**
     * Method that returns a substring from the start of the haystack to the needle.
     *
     * @param  string $haystack The string in which we're searching in.
     * @param  string $needle   The string we are searching.
     * @return string The string.
     */
    public static function cutBefore($haystack, $needle)
    {
        $split = explode($needle, $haystack, 2);

        return array_shift($split);
    }
    /**
     * Method that returns a substring from the end of the haystack to the needle.
     *
     * @param  string $haystack The string in which we're searching in.
     * @param  string $needle   The string we are searching.
     * @return string The string.
     */
    public static function cutAfter($haystack, $needle)
    {
        $split = explode($needle, $haystack, 2);

        return array_pop($split);
    }

    /**
     * Returns the className of an object without its namespace
     *
     * @param $object
     * @param bool $lowerCase
     * @return string
     */
    public static function getClassName($object, $lowerCase = false)
    {
        $className = substr(strrchr(get_class($object), "\\"), 1);
        if ($lowerCase) {
            $className = lcfirst($className);
        }
        return $className;
    }
}
