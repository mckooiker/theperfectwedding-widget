<?php

/**
 * Class tpwConfig - stores the config settings for TPW Ratings plugin
 * @author Weblab.nl  - Traian Zainescu
 */

class tpwConfig {

    const CACHE_PATH = 'wp-content/plugins/ratings.json'; 			//path to store the cache
    const CACHE_DIRECTORY = 'wp-content/plugins'; 			        //directory to store the cache
    const CACHING_TIME = 3600;                                      //caching time in seconds
    const CURL_TIMEOUT = 3;                                        	//timeout for the remote curl request

}