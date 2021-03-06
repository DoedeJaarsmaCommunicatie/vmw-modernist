<?php
require_once get_stylesheet_directory() . '/vendor/autoload.php';

class VmwKiyohFetcher
{
    private $kiyoh;
    
    public function __construct()
    {
        add_action('admin_post_fetch_kiyoh', [$this ,'fetch']);
        add_action('admin_post_nopriv_fetch_kiyoh', [$this ,'fetch']);
    }
    
    public function fetch()
    {
        if (false === get_transient('vmw_kiyoh_fetch')) {
            $this->kiyoh = new \JKetelaar\Kiyoh\Kiyoh('eXenetp25gPxyHYQAmg4f9ByeKS4UW2pMEYqsrQ8AVMfZVMpWg', 22643);
            
            $vmw = $this->kiyoh->getCompany();
            
            if ($vmw) {
                \update_option('vmw_kiyoh_score', $vmw->getTotalScore());
                \update_option('vmw_kiyoh_reviews', $vmw->getTotalReviews());
                \update_option('vmw_kiyoh_url', $vmw->getUrl());
                \set_transient('vmw_kiyoh_fetch', true, 86400);
            }
        }
        
        wp_send_json_success([
            'total_score' => \get_option('vmw_kiyoh_score'),
            'total_reviews' => \get_option('vmw_kiyoh_reviews'),
            'kiyoh_url' => \get_option('vmw_kiyoh_url'),
        ]);
    }
}

new VmwKiyohFetcher();
