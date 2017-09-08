<?php

namespace Fxmauricard\Tests;

use Fxmauricard\StringUtils;

/**
 * Unit tests for the StringUtils class.
 */
class StringUtilsTest extends \PHPUnit_Framework_TestCase
{
    public function testCutAfterReturnsGoodString()
    {
        $testString = 'AbCdEfGh';

        $resultString = StringUtils::cutAfter($testString, 'AbC');
        $this->assertEquals('dEfGh', $resultString, 'cutAfter is not returning to good string (case sensitive mode)!');
    }
    public function testCutBeforeReturnsGoodString()
    {
        $testString = 'AbCdEfGh';

        $resultString = StringUtils::cutBefore($testString, 'fGh');
        $this->assertEquals('AbCdE', $resultString, 'cutBefore is not returning to good string (case sensitive mode)!');
    }
    public function testEndsWithReturnsTrueCaseSensitive()
    {
        $testString = 'AbCdEfGh';

        $result = StringUtils::endsWith($testString, 'fGh', true);
        $this->assertEquals(true, $result, 'endsWith is not returning true (case sensitive mode)!');
    }
    public function testEndsWithReturnsTrueCaseInsensitive()
    {
        $testString = 'AbCdEfGh';

        $result = StringUtils::endsWith($testString, 'fgh', false);
        $this->assertEquals(true, $result, 'endsWith is not returning true (case insensitive mode)!');
    }
    public function testEndsWithReturnsFalseCaseSensitive()
    {
        $testString = 'AbCdEfGh';

        $result = StringUtils::endsWith($testString, 'fgh', true);
        $this->assertEquals(false, $result, 'endsWith is not returning false (case sensitive mode)!');
    }
    public function testEndsWithReturnsFalseCaseInsensitive()
    {
        $testString = 'AbCdEfGh';

        $result = StringUtils::endsWith($testString, 'fG', false);
        $this->assertEquals(false, $result, 'endsWith is not returning false (case insensitive mode)!');
    }
    public function testStartsWithReturnsTrueCaseSensitive()
    {
        $testString = 'AbCdEfGh';

        $result = StringUtils::startsWith($testString, 'AbC', true);
        $this->assertEquals(true, $result, 'startsWith is not returning true (case sensitive mode)!');
    }
    public function testStartsWithReturnsTrueCaseInsensitive()
    {
        $testString = 'AbCdEfGh';

        $result = StringUtils::startsWith($testString, 'abc', false);
        $this->assertEquals(true, $result, 'startsWith is not returning true (case insensitive mode)!');

    }
    public function testStartsWithReturnsFalseCaseSensitive()
    {
        $testString = 'AbCdEfGh';

        $result = StringUtils::startsWith($testString, 'abc', true);
        $this->assertEquals(false, $result, 'startsWith is not returning false (case sensitive mode)!');
    }
    public function testStartsWithReturnsFalseCaseInsensitive()
    {
        $testString = 'AbCdEfGh';

        $result = StringUtils::startsWith($testString, 'bC', false);
        $this->assertEquals(false, $result, 'startsWith is not returning false (case insensitive mode)!');
    }


    /**
     * @dataProvider getClassNameProvider
     */
    public function testGetClassName($object, $className, $lowerCase)
    {
        $result = StringUtils::getClassName($object, $lowerCase);
        $this->assertEquals($result, $className);
    }

    /**
     * Data provider used to test the getClassName method
     * @return array
     */
    public function getClassNameProvider()
    {
        return array(
            array($this, 'StringUtilsTest', false),
            array($this, 'stringUtilsTest', true),
        );
    }
}
