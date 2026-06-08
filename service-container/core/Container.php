<?php


class Container
{
    protected $bindings = [];

    public function bind($key, $resolver)
    {
        return $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (!isset($this->bindings[$key])) {
            throw new Exception("No entry was found for '{$key}' in the container.");
        }

        return $this->bindings[$key];
    }
}