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
    }

    public function testDump(): void {
        $filename = sprintf('%s/no-namespace/product/Product.php', $this->fixtureDir);
        $class = new \phpp\PhppReflection($filename);

        $data = $class->dump();
        $this->assertSame($data->name, 'Product', 'class name.');
        $this->assertSame($data->namespace, null, 'namespace name.');
        $this->assertSame($data->properties[0]->name, 'name', 'type.');
        $this->assertSame($data->properties[0]->type, 'Name', 'type.');
        $this->assertSame($data->properties[0]->private, true, 'private.');
        $this->assertSame($data->properties[1]->name, 'price', 'name.');
        $this->assertSame($data->properties[1]->type, 'Price', 'type.');
        $this->assertSame($data->properties[1]->private, true, 'private.');
    }
}
