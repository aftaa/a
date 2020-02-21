<?php

namespace helper;


use Exception;

class View
{
    const PATH = '/view/';

    /** @var string */
    private $path = '';

    /** @var array */
    private $vars = [];

    /**
     * View constructor.
     * @param string $path
     * @param array|null $vars
     * @throws Exception
     */
    public function __construct(string $path, ?array $vars)
    {
        $this->setPath($path);
        $this->vars = $vars ?? [];
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return View
     * @throws Exception
     */
    public function setPath(string $path): self
    {
        $this->path = $_SERVER['DOCUMENT_ROOT'];
        $this->path .= self::PATH;
        $this->path .= $path;
        $this->path .= '.php';
        if (!file_exists($this->path)) {
            throw new Exception("View file isn't exists: $this->path");
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getVars(): array
    {
        return $this->vars;
    }

    /**
     * @param array $vars
     * @return View
     */
    public function setVars(array $vars): self
    {
        $this->vars = $vars;
        return $this;
    }

    /**
     * @return View
     */
    public function render(array $vars = []): self
    {
        $this->setVars($vars);
        extract($this->getVars());
        include($this->getPath());
        return $this;
    }
}