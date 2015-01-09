<?php

require_once(__DIR__ . '/vendor/autoload.php');

$vendorDirPattern = __DIR__ . '/vendor/spryker/*/src/ProjectA/Zed/*/Communication/Controller';
$projectDirPattern = __DIR__ . '/src/Pyz/Zed/*/Communication/Controller';

$baseDirs = [
    $vendorDirPattern,
    $projectDirPattern
];

$search = '/class\s(.*)(?:Controller)\s(?!extends)/';
$replace = 'use ProjectA\Zed\Application\Communication\Controller\AbstractController;

class $1Controller extends AbstractController';

$finder = new \Symfony\Component\Finder\Finder();

/* @var $file \Symfony\Component\Finder\SplFileInfo */
foreach ($finder->files()->in($baseDirs)->name('*Controller.php') as $file) {
    $content = $file->getContents();
    $callback = function ($matches) use ($file, $search, $replace) {
        $content = $file->getContents();
        if (strstr($content, 'extends') === false) {
            $content = preg_replace($search, $replace, $content);
            $content = str_replace('AbstractControllerimplements', 'AbstractController implements', $content);
        }

        $content = str_replace('return new RedirectResponse(', 'return $this->redirectResponse(', $content);
        $content = str_replace('return new JsonResponse(', 'return $this->jsonResponse(', $content);
        $content = str_replace('use Symfony\Component\HttpFoundation\RedirectResponse;', '', $content);
        $content = str_replace('use Symfony\Component\HttpFoundation\JsonResponse;', '', $content);
        $content = str_replace('return [', 'return $this->viewResponse([', $content);

        echo $file->getPathname() . PHP_EOL;
        file_put_contents($file->getPathname(), $content);
    };
    preg_replace_callback($search, $callback, $content);
}
