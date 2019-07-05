<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Finder;

class FinderTest extends TestCase
{
    public $finde;

    public function setUp()
    {
        $this->finde = new Finder();
    }

    public function testListSrc()
    {
        $files = $this->finde->listFilesSrc();
        $this->assertCount(1, $files);

        foreach ($files as $file) {
            $absoluteFilePath = $file->getRealPath();
            $fileNameWithExtension = $file->getRelativePathname();
            $contents = $file->getContents();

            $this->assertContains('\src\Finder.php', $absoluteFilePath);
            $this->assertEquals('Finder.php', $fileNameWithExtension);
            $this->assertContains('Finder', $contents);
        }
    }

    public function testFinderForName()
    {
        $resutado = $this->finde->listFilesVendor()->name('*.xml');
        $this->assertCount(96, $resutado, " Arquivos XML na pasta vendor");
    }

    public function testFinderForContainer()
    {
        $vendor = $this->finde->listFilesVendor();
        $resutado =  $vendor->contains('Test');
    
        $this->assertCount(774, $resutado, " Arquivos que contenhão 'Test' em seu conteudo");

        foreach ($resutado as $file) {
            $absoluteFilePath = $file->getRealPath();
            $fileNameWithExtension = $file->getRelativePathname();
            // code here
        }
    }

    public function testFinderForNotContainer()
    {
        $vendor = $this->finde->listFilesVendor();
        $resutado =  $vendor->notContains('Test');
        $this->assertCount(940, $resutado, " Arquivos que não contenhão 'Test' em seu conteudo");
    }

    public function testFinderSize()
    {
        $vendor = $this->finde->listFilesVendor();
        $resutado = $vendor->size('>= 1K')->size('<= 2K');
        $this->assertCount(369, $resutado, " Arquivos que sejam maior ou igual a 1 K");
    }

    public function testFinderDateChange()
    {
        $vendor = $this->finde->listFilesVendor();
        $resutado = $vendor->date('>= 2018-01-01')->date('<= 2019-12-31');
        $this->assertCount(1727, $resutado, " Pesquisando arquivos pela data de alteração");
    }

    public function testFinderDeph()
    {
        $vendor = $this->finde->listFilesVendor();
        $resutado = $vendor->depth('== 0');
        $this->assertCount(1, $resutado, " Peqsuiando arquivo pela profundidade aonde se encontra");
    }
}
