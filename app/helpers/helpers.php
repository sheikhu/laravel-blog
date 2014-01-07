<?php


if(!function_exists('button_to_route'))
{
    function button_to_route($route, $title = null, $attributes = array(), $secure = null)
    {
        $url = route($route, array(), $secure);

        if (is_null($title) || $title === false) $title = $url;

        $content = '<a href="'.$url.'"'.$this->attributes($attributes).'>'.
        $this->entities($title);

        if(array_key_exists('icon', $attributes))
            $content .= '<i class="fa fa-'. $attributes['icon'] . '></i>'.
        '</a>';

        return $content;
    }
}
