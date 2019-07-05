<?php

namespace App;

use Symfony\Component\Finder\Finder as FinderSymfony;

class Finder
{
    private $finde;

    public function __construct()
    {
        $this->finde = new FinderSymfony();
    }

    public function listFilesSrc()
    {
        return $this->finde->files()->in('./src');
    }

    public function listFilesVendor()
    {
        return $this->finde->files()->in('./vendor');
    }
}
