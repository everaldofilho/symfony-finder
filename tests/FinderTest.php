<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Finder;

class FinderTest extends TestCase
{
    public $finde;

    public function setUp()
    {
        $this->finde = new Finder();
    }

    public function testListaTodosArquivos()
    {
        $this->finde->files()->in(__DIR__);
        
        $this->assertTrue($this->finde->hasResults());
    }
}
