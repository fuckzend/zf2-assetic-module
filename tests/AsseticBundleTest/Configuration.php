<?php
namespace AsseticBundleTest;

use AsseticBundle;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-11-17 at 11:53:23.
 */
class Configuration extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AsseticBundle\Configuration
     */
    protected $object;

    /**
     * Test configuration.
     *
     * @var array
     */
    protected $testConfig = array();

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new AsseticBundle\Configuration($this->testConfig);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {}

    public function testIsDebug() {
        $this->assertFalse($this->object->isDebug());
    }

    public function testSetDebug() {
        $expected = true;
        $this->assertNull($this->object->setDebug($expected));
        $this->assertEquals($expected, $this->object->isDebug());
    }

    public function testSetWebPath() {
        $result = $this->object->setWebPath(TEST_ASSETS_DIR);
        $this->assertNull($result);
        $this->assertEquals(TEST_ASSETS_DIR, $this->object->getWebPath());
    }

    public function getBaseUrl() {
        $result = $this->object->getBaseUrl();
        $this->assertNull($result);
    }

    public function testSetBaseUrl() {
        $url = '/http://example.com';
        $expected = $url . '/';

        $result = $this->object->setBaseUrl($url);
        $this->assertNull($result);
        $this->assertEquals($expected, $this->object->getBaseUrl());
    }

    public function getBasePath() {
        $result = $this->object->getBasePath();
        $this->assertNull($result);
    }

    public function testSetBasePath() {
        $url = '/~/jone/assets';
        $expected = trim($url,'/') . '/';

        $result = $this->object->setBasePath($url);
        $this->assertNull($result);
        $this->assertEquals($expected, $this->object->getBasePath());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetWebPathFailure() {
        $this->object->getWebPath();
    }

    public function testSetCachePath() {
        $result = $this->object->setCachePath(TEST_CACHE_DIR);
        $this->assertNull($result);
        $this->assertEquals(TEST_CACHE_DIR, $this->object->getCachePath());
    }

    public function testGetCachePath() {
        $result = $this->object->getCachePath();
        $this->assertNull($result);
    }

    public function testGetCacheEnabled() {
        $this->assertFalse($this->object->getCacheEnabled());
    }

    public function testSetCacheEnabled() {
        $expected = true;
        $this->assertNull($this->object->setCacheEnabled($expected));
        $this->assertEquals($expected, $this->object->getCacheEnabled());
    }

    public function testGetDefault() {
        $expected = array(
            'assets' => array(),
            'options' => array(),
        );
        $this->assertEquals($expected, $this->object->getDefault());
    }

    public function testSetDefault() {
        $options = array(
            'test' => array(),
        );
        $expected = array(
            'test' => array(),
            'assets' => array(),
            'options' => array(),
        );

        $result = $this->object->setDefault($options);
        $this->assertNull($result);
        $this->assertEquals($expected, $this->object->getDefault());
    }

    public function testSetRouters() {
        $expected = array(
            'home' => array(
                'name' => 'value',
            ),
        );
        $result = $this->object->setRoutes($expected);
        $this->assertNull($result);
        $this->assertEquals($expected, $this->object->getRoutes());
    }

    public function testGetRoutes() {
        $expected = array();
        $result = $this->object->getRoutes();
        $this->assertEquals($expected, $result);
    }

    public function testGetRouter() {
        $result = $this->object->getRoute('test');
        $this->assertNull($result);

        $expected = '123';
        $result = $this->object->getRoute('test', $expected);
        $this->assertEquals($expected, $result);

        $expected = array(
            'name' => 'value',
        );
        $routers = array(
            'home' => $expected,
        );
        $this->object->setRoutes($routers);
        $result = $this->object->getRoute('home');
        $this->assertEquals($expected, $result);
    }

    public function testMergeMultipleRouteMatches() {
        $this->object->setRoutes(array(
            'bar' => array(
                '@a',
                '@d'
            ),
            'foo.*' => array(
                '@a',
                '@b'
            ),
            'foo/bar' => array(
                '@c'
            )
        ));

        $assets = $this->object->getRoute('foo/bar');
        $this->assertCount(3, $assets);
        $this->assertContains('@a', $assets);
        $this->assertContains('@b', $assets);
        $this->assertContains('@c', $assets);
    }

    public function testGetControllers() {
        $expected = array();
        $result = $this->object->getControllers();
        $this->assertEquals($expected, $result);
    }

    public function testGetController() {
        $controllerName = 'some';
        $result = $this->object->getController($controllerName);
        $this->assertNull($result);

        $expected = '123';
        $result = $this->object->getController($controllerName, $expected);
        $this->assertEquals($expected, $result);

        $expected = array(
            'name' => 'value',
        );
        $data = array(
            $controllerName => $expected,
        );
        $this->object->setControllers($data);
        $result = $this->object->getController($controllerName);
        $this->assertEquals($expected, $result);
    }

    public function testGetModules() {
        $expected = array();
        $result = $this->object->getModules();
        $this->assertEquals($expected, $result);
    }

    public function testGetModule() {
        $moduleName = 'SomeModule';
        $result = $this->object->getModule($moduleName);
        $this->assertNull($result);

        $expected = '123';
        $result = $this->object->getModule($moduleName, $expected);
        $this->assertEquals($expected, $result);

        $expected = array(
            'name' => 'value',
        );
        $data = array(
            strtoupper($moduleName) => $expected,
        );
        $this->object->setModules($data);
        $result = $this->object->getModule($moduleName);
        $this->assertEquals($expected, $result);
    }

    public function testSetRendererToStrategy() {
        $data = array();
        $result = $this->object->setRendererToStrategy($data);
        $this->assertNull($result);
    }

    public function testGetStrategyNameForRenderer() {
        $strategyName = 'some-module';
        $result = $this->object->getStrategyNameForRenderer($strategyName);
        $this->assertNull($result);

        $expected = '123';
        $result = $this->object->getStrategyNameForRenderer($strategyName, $expected);
        $this->assertEquals($expected, $result);

        $expected = array(
            'name' => 'value',
        );
        $data = array(
            $strategyName => $expected,
        );
        $this->object->setRendererToStrategy($data);
        $result = $this->object->getStrategyNameForRenderer($strategyName);
        $this->assertEquals($expected, $result);
    }

    public function testAddRendererToStrategy() {
        $value = $this->object->addRendererToStrategy('a', 'b');
        $this->assertNull($value);
    }
}