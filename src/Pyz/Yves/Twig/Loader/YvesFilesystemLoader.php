<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Loader;

use Twig_Error_Loader;
use Twig_ExistsLoaderInterface;
use Twig_LoaderInterface;

class YvesFilesystemLoader implements Twig_LoaderInterface, Twig_ExistsLoaderInterface
{

    /**
     * @var array
     */
    protected $bundlePaths = [];

    /**
     * @var array
     */
    protected $paths;

    /**
     * @var array
     */
    protected $cache;

    /**
     * @param string|array $paths A path or an array of paths where to look for templates
     */
    public function __construct(array $paths = [])
    {
        if ($paths) {
            $this->setPaths($paths);
        }
    }

    /**
     * Returns the path namespaces.
     *
     * The main namespace is always defined.
     *
     * @return array The array of defined namespaces
     */
    public function getNamespaces()
    {
        return array_keys($this->paths);
    }

    /**
     * Sets the paths where templates are stored.
     *
     * @param array $paths A path or an array of paths where to look for templates
     *
     * @return void
     */
    public function setPaths(array $paths)
    {
        $this->paths = [];
        foreach ($paths as $path) {
            $this->addPath($path);
        }
    }

    /**
     * Adds a path where templates are stored.
     *
     * @param string $path A path where to look for templates
     *
     * @return void
     */
    public function addPath($path)
    {
        // invalidate the cache
        $this->cache = [];
        $this->paths[] = rtrim($path, '/\\');
    }

    /**
     * Prepends a path where templates are stored.
     *
     * @param string $path A path where to look for templates
     *
     * @return void
     */
    public function prependPath($path)
    {
        // invalidate the cache
        $this->cache = [];

        $path = rtrim($path, '/\\');

        if (empty($this->paths)) {
            $this->paths[] = $path;

            return;
        }

        array_unshift($this->paths, $path);
    }

    /**
     * {@inheritdoc}
     */
    public function getSource($name)
    {
        return file_get_contents($this->findTemplate($name));
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheKey($name)
    {
        return $this->findTemplate($name);
    }

    /**
     * {@inheritdoc}
     */
    public function exists($name)
    {
        $name = (string)$name;
        if (isset($this->cache[$name])) {
            return $this->cache[$name] !== false;
        }

        try {
            $this->findTemplate($name);

            return true;
        } catch (Twig_Error_Loader $exception) {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isFresh($name, $time)
    {
        return filemtime($this->findTemplate($name)) <= $time;
    }

    /**
     * @param string $bundle
     *
     * @return array
     */
    protected function getPathsForBundle($bundle)
    {
        $paths = [];
        foreach ($this->paths as $path) {
            $path = sprintf($path, $bundle);
            if (strpos($path, '*') === false) {
                $paths[] = $path;

                continue;
            }

            $path = glob($path);
            if (count($path) > 0) {
                $paths[] = $path[0];
            }
        }

        return $paths;
    }

    /**
     * @param string $name
     *
     * @throws \Twig_Error_Loader
     *
     * @return string
     */
    protected function findTemplate($name)
    {
        $name = (string)$name;

        if (isset($this->cache[$name])) {
            if ($this->cache[$name] !== false) {
                return $this->cache[$name];
            }

            throw new Twig_Error_Loader(sprintf('Unable to find template "%s" (cached).', $name));
        }

        // normalize name
        $name = str_replace(['///', '//', '\\'], '/', $name);

        $this->validateName($name);

        if (!isset($name[0]) && $name[0] === '@') {
            $this->cache[$name] = false;
            throw new Twig_Error_Loader(sprintf('Missing bundle in template name "%s" (expecting "@bundle/template_name").', $name));
        }

        $pos = strpos($name, '/');
        if ($pos === false) {
            $this->cache[$name] = false;
            throw new Twig_Error_Loader(sprintf('Malformed bundle template name "%s" (expecting "@bundle/template_name").', $name));
        }
        $bundle = ucfirst(substr($name, 1, $pos - 1));
        $templateName = substr($name, $pos + 1);

        $paths = $this->getPathsForBundle($bundle);
        foreach ($paths as $path) {
            if (is_file($path . '/' . $templateName)) {
                return $this->cache[$name] = $path . '/' . $templateName;
            }
        }

        $this->cache[$name] = false;

        throw new Twig_Error_Loader(sprintf('Unable to find template "%s" (looked into: %s).', $templateName, implode(', ', $paths)));
    }

    /**
     * @param string $name
     *
     * @throws \Twig_Error_Loader
     *
     * @return void
     */
    protected function validateName($name)
    {
        if (strpos($name, "\0") !== false) {
            throw new Twig_Error_Loader('A template name cannot contain NUL bytes.');
        }

        $name = ltrim($name, '/');
        $parts = explode('/', $name);
        $level = 0;
        foreach ($parts as $part) {
            if ($part === '..') {
                --$level;
            } elseif ($part !== '.') {
                ++$level;
            }

            if ($level < 0) {
                throw new Twig_Error_Loader(sprintf('Looks like you try to load a template outside configured directories (%s).', $name));
            }
        }
    }

}
