<?php
/**
 * @package JetSmartReIndexer
 */
/*
Plugin Name: JetSmart reIndexer
Plugin URI: https://github.com/trueqap/jetsmart-reindexer
Description: JetSmart reIndexer system
Version: 1.1
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
        $this->register_custom_hooks();
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

    /**
     * Register custom JetFormBuilder hooks for smartfilter reindexing
     */
    private function register_custom_hooks()
    {
        add_action('jet-form-builder/custom-action/smartfilter-reindex', array($this, 'smartfilter_reindex_action'), 10, 3);
        add_filter('jet-form-builder/custom-filter/smartfilter-reindex', array($this, 'smartfilter_reindex_filter'), 10, 3);
    }

    /**
     * Custom action hook for reindexing smartfilters without form validation
     *
     * @param array $request
     * @param array $action_handler
     */
    public function smartfilter_reindex_action($request, $action_handler)
    {
        $this->jet_smarter_reindexer();
    }

    /**
     * Custom filter hook for reindexing smartfilters with form validation and error messages
     *
     * @param boolean $result
     * @param array $request
     * @param array $action_handler
     * @return boolean
     */
    public function smartfilter_reindex_filter($result, $request, $action_handler)
    {
        $this->jet_smarter_reindexer();
        return $result;
    }
}

$jetSmartReIndexer = new JetSmartReIndexer();
