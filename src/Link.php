<?php

namespace Antoniog85\MediaType;


class Link
{
    private $rel;

    private $href;

    /** @param string $rel */
    public function setRel(string $rel)
    {
        $this->rel = $rel;
    }

    /** @param string $href */
    public function setHref(string $href)
    {
        $this->href = $href;
    }

    public function toArray()
    {
        return [$this->rel => $this->href];
    }
}