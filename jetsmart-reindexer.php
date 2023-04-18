<?php
/**
 * @package JetSmartReIndexer
*/
/*
Plugin Name: JetSmart reIndexer
Plugin URI: https://github.com/trueqap/jetsmart-reindexer
Description: JetSmart reIndexer system
Version: 1.0
Requires at least: 5.0
Requires PHP: 7.4
Author: trueqap
Author URI: https://github.com/trueqap/jetsmart-reindexer
License: GPLv2 or later
Text Domain: jetsmartreindexer
*/

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die();
}

/**
 * Class JetSmartReIndexer
 */
class JetSmartReIndexer
{
    /**
     * JetSmartReIndexer constructor
     */
    public function __construct()
    {
        add_action('save_post', array($this, 'jet_smarter_reindexer'));
        add_action('post_updated', array($this, 'jet_smarter_reindexer'));
        add_action('wp_trash_post', array($this, 'jet_smarter_reindexer'));
        add_filter('jet-form-builder/post-modifier/object-actions', array($this, 'jet_form_builder_reindexer'));
    }

    /**
     * Reindex JetSmart filters
     */
    public function jet_smarter_reindexer()
    {
        if (function_exists('jet_smart_filters') && isset(jet_smart_filters()->indexer)) {
            jet_smart_filters()->indexer->index_filters();
        }
    }

    /**
     * Reindex JetForm Builder filters
     *
     * @param array $actions
     * @return array
     */
    public function jet_form_builder_reindexer($actions)
    {
        if (function_exists('jet_form_builder_init') && isset(jet_smart_filters()->indexer)) {
            $this->jet_smarter_reindexer();
            return $actions;
        }
    }
}

$jetSmartReIndexer = new JetSmartReIndexer();
