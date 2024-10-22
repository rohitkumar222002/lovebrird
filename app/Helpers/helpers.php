<?php

if (!function_exists('image_url')) {
    /**
     * Generate the full URL for an image stored in the public directory.
     *
     * @param string $path
     * @return string
     */
    function image_url($path)
    {
        return asset('admin/setting/' . $path);
    }
}
