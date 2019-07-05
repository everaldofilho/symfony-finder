# Usando Symfony Finder

## Instalação

````
composer require symfony/finder
````

## Exemplo de Uso

````php
use Symfony\Component\Finder\Finder;

$finder = new Finder();
// find all files in the current directory
$finder->files()->in(__DIR__);

// check if there are any search results
if ($finder->hasResults()) {
    // ...
}

foreach ($finder as $file) {
    $absoluteFilePath = $file->getRealPath();
    $fileNameWithExtension = $file->getRelativePathname();

    // ...
}
````

## Recursos
- Pesquisa arquivo por pastas
- Pesquisa arquivo por nome
- Pesquisa arquivo por extensão
- Pesquisa arquivo pelo Conteudo
- Pesquisa arquivo pela data de modificação
- Pesquisa arquivo pelo tamanho
- Ordena listagem dos arquivos pela Data de alteração, Criação ou Acesso.
- Ordena listagem dos arquivos nome ou extensão

Documentação:
https://symfony.com/doc/current/components/finder.html
