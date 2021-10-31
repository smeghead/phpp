<?php
namespace phpp;

class PhppReflection {
    private string $filename;
    private \ReflectionClass $class;
    public function __construct(string $filename) {
        $this->filename = $filename;
        // クラス名に使える文字 https://www.php.net/manual/ja/language.oop5.basic.php
        if ( ! preg_match('/[\/\\\\]([a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*)\.php/i', $this->filename, $matches)) {
            throw new Exception('invalid filename.');
        }
        $className = $matches[1];
        require_once($this->filename);
        $this->class = new \ReflectionClass($className);
    }

    public function getFilename(): string {
        return $this->filename;
    }

    public function getClassname(): string {
        return $this->class->getName();
    }
}
