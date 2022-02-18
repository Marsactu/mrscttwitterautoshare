<?php
/**
 * Plugin Name:     Marsactu - Twitter Auto Share
 * Plugin URI:      https://github.com/Marsactu/mrscttwitterautoshare
 * Description:     Partage les articles automatiquement sur Twitter à une heure définie
 * Author:          Mathieu Basili
 * Author URI:      https://kanvas.fr
 * Text Domain:     mrscttwitterautoshare
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Mrscttwitterautoshare
 */

// Your code starts here.
require_once dirname(__FILE__) . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/includes/class-mrscttwitterautoshare.php';


$mrscttwitterautoshare = new MrsctTwitterAutoshare_Plugin('mtau',__FILE__);
//add_action('wp_loaded', array($mrscttwitterautoshare, 'load'));
