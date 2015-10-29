<?php

namespace Pyz\Zed\Glossary\Business;

use Pyz\Zed\Glossary\Business\Exception\RemoteUrlException;

interface ResourceReaderInterface
{
    /**
     * @return array
     * @throws RemoteUrlException
     */
    public function getContent();

    /**
     * @return string
     */
    public function getSource();
}
