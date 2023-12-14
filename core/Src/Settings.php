<?php

namespace Src;

use Error;

class Settings
{
    private array $_settings;

    public function __construct(array $settings = [])
    {
        $this->_settings = $settings;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->_settings)) {
            return $this->_settings[$key];
        }
        throw new Error('Accessing a non-existent property Settings');
    }

    public function getDbSetting(): array
    {
        return $this->db ?? [];
    }

    public function getRootPath(): string
    {
        return $this->path['root'] ? '/' . $this->path['root'] : '';
    }

    public function getViewsPath(): string
    {
        return '/' . $this->path['views'] ?? '';
    }

    public function getRoutePath(): string
    {
        return '/' . $this->path['routes'] ?? '';
    }

    public function getAuthClassName(): string
    {
        return $this->app['auth'] ?? '';
    }

    public function getIdentityClassName(): string
    {
        return $this->app['identity'] ?? '';
    }

    public function removeAppMiddleware(string $key): void
    {
        unset($this->_settings['app']['routeAppMiddleware'][$key]);
    }

}
