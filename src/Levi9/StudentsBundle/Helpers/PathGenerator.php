<?php

namespace Levi9\StudentsBundle\Helpers;

class PathGenerator
{
    const SPLIT_SYMBOL = '_';

    /**
     * @var array
     */
    private $currentPaths = [];

    /**
     * Generate path for student
     *
     * @param string $name
     * @return string
     */
    public function generatePath($name)
    {
        $basePath = preg_replace('/\W/', self::SPLIT_SYMBOL, strtolower($name));
        $uniquePath = $this->getUniquePath($basePath);
        $this->currentPaths[] = $uniquePath;
        return $uniquePath;
    }

    /**
     * Get unique path for student
     *
     * @param string $path
     * @return string
     */
    private function getUniquePath($path)
    {
        if (!$this->currentPaths) {
            return $path;
        }

        if (in_array($path, $this->currentPaths)) {
            $pathParts = explode(self::SPLIT_SYMBOL, $path);
            $lastPathPart = intval(array_pop($pathParts));

            if ($lastPathPart) {
                return $this->getUniquePath(
                    implode(self::SPLIT_SYMBOL, $pathParts) . self::SPLIT_SYMBOL . (++$lastPathPart)
                );
            }

            return $this->getUniquePath(
                $path . self::SPLIT_SYMBOL . '1'
            );
        }

        return $path;
    }
}
