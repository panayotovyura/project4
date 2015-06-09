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
    private function getUniquePath($path, $iterator = 1)
    {
        if (!$this->currentPaths) {
            return $path;
        }

        if (in_array($path, $this->currentPaths)) {
            if ($iterator > 1) {
                $path = preg_replace('/(\d)+$/', $iterator, $path);
            } else {
                $path .= self::SPLIT_SYMBOL . $iterator;
            }

            return $this->getUniquePath($path, ++$iterator);
        }

        return $path;
    }
}
