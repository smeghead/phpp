<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use phpp\PhppReflection;

final class PhppTest extends TestCase {
    private $fixtureDir;
    public function setUp(): void {
        $this->fixtureDir = sprintf('%s/fixtures', __DIR__);
    }

    public function testInitialize(): void {
        $filename = sprintf('%s/no-namespace/product/Product.php', $this->fixtureDir);
        $class = new \phpp\PhppReflection($filename);

        $this->assertNotNull($class, 'initialize PhppReflection');
        $this->assertSame($class->getFilename(), $filename, 'get filename.');
    }

    public function testLoadFile(): void {
        $filename = sprintf('%s/no-namespace/product/Product.php', $this->fixtureDir);
        $class = new \phpp\PhppReflection($filename);

        $this->assertSame($class->getClassName(), 'Product', 'get classname.');
    }
}
