<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    if (remove_action('wp_head', 'wp_enqueue_scripts', 1)) {
        wp_enqueue_scripts();
    }

    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

function dd(...$args) {
    var_dump($args);
    die;
}

function get_better_excerpt( $args = NULL ) {

	$defaults = 	array(
						'sentence' => false,
						'words' => '20',
						'before'  => '',
						'after' => '',
						'show' => false,
						'skipexcerpt' => true,
						'link' => false,
						'trail' => ' &#8230;',
					);
	$option = wp_parse_args( $args, $defaults );


	/** check to see this is at least WordPress 3.3 **/
	if ( function_exists( 'wp_trim_words' ) ) {

		if ( $option['skipexcerpt'] ) {

			if ( $option['sentence'] )
				$excerpt_array = explode( '.', strip_tags( get_the_content() ), $option['sentence']+1 );
			else
				$excerpt = wp_trim_words( get_the_content(), $option['words'], $option['trail'] );

		} else {

			if ( $option['sentence'] )
				$excerpt_array = explode( '.', strip_tags( get_the_excerpt() ), $option['sentence']+1 );
			else
				$excerpt = wp_trim_words( get_the_excerpt(), $option['words'], $option['trail'] );

		}

		if ( $excerpt_array )
			$excerpt = $excerpt_array[0] . ' ' . $option['trail'] ;


		if ( $option['link'] )
			$excerpt = '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">'.$excerpt.'</a>';

		$excerpt = $option['before'] . $excerpt . $option['after'];

		if ( $option['show'] )
			echo $excerpt;
		else
			return $excerpt;

	} else {

		/** the wp_trim_words() function doesn't exist **/

		if ( $option['show'] )
			echo get_the_excerpt();
		else
			return get_the_excerpt();

	}
}
