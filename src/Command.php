<?php

namespace Pangolinkeys\Commander;

class Command
{
    protected $commands = [];

    public function __call($name, $arguments)
    {
        $this->call($name);
    }

    /**
     * Method to call a command by key.
     *
     * @param $name
     * @return null
     */
    public function call($name)
    {
        if (array_has($this->commands, $name)) {
            return $this->commands[$name]();
        } else {
            return null;
        }
    }

    /**
     * Internal method to register a command.
     *
     * @param          $name
     * @param callable $closure
     */
    protected function register($name, callable $closure)
    {
        $this->commands[ $name ] = $closure;
    }

}
