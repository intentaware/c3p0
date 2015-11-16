<?php 

function amc_script_enqueue()
{
	wp_enqueue_style('customstyle', get_template_directory_uri().'/css/amc.css', array(),'1.0.0','all');
	wp_enqueue_style('bootStrap.min', get_template_directory_uri().'/css/bootstrap.min.css', array(),'1.0.0','all');
	wp_enqueue_script('bootStrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('jQuery', get_template_directory_uri().'/js/jquery-1.11.3.min.js', array(), '1.0.0', true);
	wp_enqueue_script('customScript', get_template_directory_uri().'/js/amc.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'amc_script_enqueue');