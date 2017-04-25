<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\Flysystem;

use Spryker\Service\Kernel\AbstractService;

/**
 * @method \Spryker\Service\Flysystem\FlysystemServiceFactory getFactory()
 */
class FlysystemService extends AbstractService implements FlysystemServiceInterface
{

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return bool
     */
    public function isPrivate($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->isPrivate($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return \Generated\Shared\Transfer\FlysystemResourceMetadataTransfer|null
     */
    public function getMetadata($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->getMetadata($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return string|false
     */
    public function getMimeType($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->getMimeType($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return string|false
     */
    public function getVisibility($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->getVisibility($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return string|false
     */
    public function getTimestamp($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->getTimestamp($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return int|false
     */
    public function getSize($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->getSize($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return bool
     */
    public function has($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->has($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return string|false
     */
    public function read($filesystemName, $path)
    {
        return $this->getFactory()
            ->createReader()
            ->read($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $directory
     * @param bool $recursive
     *
     * @return \Generated\Shared\Transfer\FlysystemResourceTransfer[]
     */
    public function listContents($filesystemName, $directory = '', $recursive = false)
    {
        return $this->getFactory()
            ->createReader()
            ->listContents($filesystemName, $directory, $recursive);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return bool
     */
    public function markAsPrivate($filesystemName, $path)
    {
        return $this->getFactory()
            ->createWriter()
            ->markAsPrivate($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return bool
     */
    public function markAsPublic($filesystemName, $path)
    {
        return $this->getFactory()
            ->createWriter()
            ->markAsPublic($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     * @param string $visibility 'public' or 'private'
     *
     * @return bool
     */
    public function setVisibility($filesystemName, $path, $visibility)
    {
        return $this->getFactory()
            ->createWriter()
            ->setVisibility($filesystemName, $path, $visibility);
    }

    /**
     * @param string $filesystemName
     * @param string $dirname
     * @param array $config
     *
     * @return bool
     */
    public function createDir($filesystemName, $dirname, array $config = [])
    {
        return $this->getFactory()
            ->createWriter()
            ->createDir($filesystemName, $dirname, $config);
    }

    /**
     * @param string $filesystemName
     * @param string $dirname
     *
     * @return bool
     */
    public function deleteDir($filesystemName, $dirname)
    {
        return $this->getFactory()
            ->createWriter()
            ->deleteDir($filesystemName, $dirname);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function copy($filesystemName, $path, $newpath)
    {
        return $this->getFactory()
            ->createWriter()
            ->copy($filesystemName, $path, $newpath);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return bool
     */
    public function delete($filesystemName, $path)
    {
        return $this->getFactory()
            ->createWriter()
            ->delete($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     * @param string $content
     * @param array $config
     *
     * @return bool
     */
    public function put($filesystemName, $path, $content, array $config = [])
    {
        return $this->getFactory()
            ->createWriter()
            ->put($filesystemName, $path, $content, $config);
    }

    /**
     * @param string $filesystemName
     * @param string $newpath
     * @param string $path
     *
     * @return string|false
     */
    public function rename($filesystemName, $path, $newpath)
    {
        return $this->getFactory()
            ->createWriter()
            ->rename($filesystemName, $path, $newpath);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     * @param string $content
     * @param array $config
     *
     * @return bool
     */
    public function update($filesystemName, $path, $content, array $config = [])
    {
        return $this->getFactory()
            ->createWriter()
            ->update($filesystemName, $path, $content, $config);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     * @param string $content
     * @param array $config
     *
     * @return bool
     */
    public function write($filesystemName, $path, $content, array $config = [])
    {
        return $this->getFactory()
            ->createWriter()
            ->write($filesystemName, $path, $content, $config);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     * @param resource $resource
     * @param array $config
     *
     * @return bool
     */
    public function putStream($filesystemName, $path, $resource, array $config = [])
    {
        return $this->getFactory()
            ->createStream()
            ->putStream($filesystemName, $path, $resource, $config);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     *
     * @return resource|false
     */
    public function readStream($filesystemName, $path)
    {
        return $this->getFactory()
            ->createStream()
            ->readStream($filesystemName, $path);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     * @param resource $resource
     * @param array $config
     *
     * @return bool
     */
    public function updateStream($filesystemName, $path, $resource, array $config = [])
    {
        return $this->getFactory()
            ->createStream()
            ->updateStream($filesystemName, $path, $resource, $config);
    }

    /**
     * @param string $filesystemName
     * @param string $path
     * @param resource $resource
     * @param array $config
     *
     * @return bool
     */
    public function writeStream($filesystemName, $path, $resource, array $config = [])
    {
        return $this->getFactory()
            ->createStream()
            ->writeStream($filesystemName, $path, $resource, $config);
    }

}
