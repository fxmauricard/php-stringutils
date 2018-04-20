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
     * @param   string  $haystack   The string in which we're searching in.
     * @param   string  $needle     The string we are searching.
     * @param   boolean $case       If it's case sensitive or not.
     * @return  boolean             If the haystack starts by the needle.
     */
    public static function startsWith($haystack, $needle, $case = true)
    {
        $method = ($case) ? 'strcmp' : 'strcasecmp';

        return (0 === $method(substr($haystack, 0, strlen($needle)), $needle));
    }
    /**
     * Method that checks if a string ends with another one.
     *
     * @param   string  $haystack   The string in which we're searching in.
     * @param   string  $needle     The string we are searching.
     * @param   boolean $case       If it's case sensitive or not.
     * @return  boolean             If the haystack ends by the needle.
     */
    public static function endsWith($haystack, $needle, $case = true)
    {
        $method = ($case) ? 'strcmp' : 'strcasecmp';

        return (0 === $method(substr($haystack, strlen($haystack) - strlen($needle)), $needle));
    }
    /**
     * Method that returns a substring from the start of the haystack to the needle.
     *
     * @param   string  $haystack   The string in which we're searching in.
     * @param   string  $needle     The string we are searching.
     * @return  string              The string.
     */
    public static function cutBefore($haystack, $needle)
    {
        $split = explode($needle, $haystack, 2);

        return array_shift($split);
    }
    /**
     * Method that returns a substring from the end of the haystack to the needle.
     *
     * @param   string  $haystack   The string in which we're searching in.
     * @param   string  $needle     The string we are searching.
     * @return  string              The string.
     */
    public static function cutAfter($haystack, $needle)
    {
        $split = explode($needle, $haystack, 2);

        return array_pop($split);
    }

    /**
     * Method that returns the class name of an object without its namespace.
     *
     * @param   mixed   $object     The object for which we want the class name.
     * @param   bool    $lowerCase  If the class name should have the first char to lower case or not.
     * @return  string              The class name.
     */
    public static function getClassName($object, $lowerCase = false)
    {
        $className = substr(strrchr(get_class($object), "\\"), 1);
        if ($lowerCase) {
            $className = lcfirst($className);
        }

        return $className;
    }

    /**
     * Method that reverses a camel case string.
     *
     * @param   string  $content    The camel case string.
     * @param   string  $glue       The glue for the compound words. Defaults to '_'.
     * @return  string              The un-camelcased string.
     */
    public static function unCamelCase($content, $glue = '_')
    {
        $content = preg_replace('#(?<=[a-zA-Z])([A-Z])(?=[a-zA-Z])#e', "'$glue' . strtolower('$1')", $content);
        $content{0} = strtolower($content{0});

        return $content;
    }
}
