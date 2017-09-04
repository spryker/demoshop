<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Install;

/**
 * This fixes a composer issue of not respecting the github-protocols option.
 * We need to manually assert that our demoshop uses https URLs instead of ssh ones.
 *
 * Projects can safely remove this file and the composer post-update-cmd hook.
 */
class ComposerAdjuster
{

    /**
     * @return void
     */
    public static function assertDemoshopGitUrls()
    {
        $composerJson = file_get_contents(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'composer.json');
        preg_match('/"github-protocols": \[(.+)\]/', $composerJson, $matches);
        if (!$matches) {
            return;
        }

        $protocols = explode(',', $matches[1]);
        foreach ($protocols as $k => $v) {
            $protocols[$k] = trim(str_replace('"', '', $v));
        }

        static::assertNoHttp();

        if ($protocols !== ['https']) {
            return;
        }

        static::assertHttps();
    }

    /**
     * @return void
     */
    protected static function assertNoHttp()
    {
        $composerLockFile = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'composer.lock';
        $composerLock = file_get_contents($composerLockFile);

        $composerLockUpdated = str_replace('http://code.spryker.com/', 'https://code.spryker.com/', $composerLock);
        if ($composerLockUpdated === $composerLock) {
            return;
        }

        file_put_contents($composerLockFile, $composerLockUpdated);
    }

    /**
     * @return void
     */
    protected static function assertHttps()
    {
        $composerLockFile = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'composer.lock';
        $composerLock = file_get_contents($composerLockFile);

        $composerLockUpdated = str_replace('git@github.com:spryker/', 'https://github.com/spryker/', $composerLock);
        if ($composerLockUpdated === $composerLock) {
            return;
        }

        file_put_contents($composerLockFile, $composerLockUpdated);
    }

}
