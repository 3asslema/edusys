<?php

namespace App\Storage;

use Illuminate\Support\Arr;

class DataBag
{

    protected $data = [];

    /**
     * DataBag constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Set value
     *
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        Arr::set($this->data, $key, $value);
    }

    /**
     * Return all values
     *
     * @return array
     */
    public function all()
    {
        return $this->data;
    }

    /**
     *  Returns value of $key if it is set or $default otherwise
     *
     * @param string $key
     * @param mixed $default - default value
     * @param bool $dataBag - return array as DataBag instance
     * @return mixed|null|DataBag
     */
    public function get($key, $default = null, $dataBag = false)
    {
        $data = Arr::get($this->data, $key, $default);

        if ($dataBag && is_array($data)) {
            return new DataBag($data);
        }

        return $data;
    }

    /**
     * Returns value of $key. If this value is empty then returns default value
     *
     * @param $key
     * @param null $default
     * @param bool $dataBag
     * @return mixed|null|DataBag
     */
    public function getNotEmpty($key, $default = null, $dataBag = false)
    {
        $data = Arr::get($this->data, $key);

        if (empty($data)) {
            $data = $default;
        }

        if ($dataBag && is_array($data)) {
            return new DataBag($data);
        }

        return $data;
    }

    /**
     * Return whether $key has a value
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return Arr::has($this->data, $key);
    }

    /**
     * Remove value with a given key
     *
     * @param $key
     */
    public function remove($key)
    {
        Arr::forget($this->data, $key);
    }
}