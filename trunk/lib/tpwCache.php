<?php


/**
 * Class tpwCache - handles the TPW Ratings Plugin caching
 * @author Weblab.nl - Traian Zainescu
 */

class tpwCache {

    /**
     * Check if we have cached data and if it did not expired
     * @return array|bool|mixed
     */
    public function readFromCache() {

        //if cache file does not exists return false
        if ( !file_exists( tpwConfig::CACHE_PATH ) ) {
            return false;
        }

        //if cache expired return false
        if ( time() - filemtime( tpwConfig::CACHE_PATH ) > tpwConfig::CACHING_TIME ) {
            return false;
        }

        //return cache data
        return json_decode( file_get_contents( tpwConfig::CACHE_PATH ) );
    }

    /**
     *  Helper function to write the reviews data into cache
     * @param $reviewsData          JSON Representation of the reviews data
     */
    public function writeCache( $reviewsData ) {

        //check if we have permissions to write the cache file
        if (!file_exists(tpwConfig::CACHE_PATH) && !is_writable(tpwConfig::CACHE_DIRECTORY)){
            return false;
        }
        if (file_exists(tpwConfig::CACHE_PATH) && !is_writable(tpwConfig::CACHE_PATH)){
            return false;
        }

        //we can write cache go on and write it
        $fCache = fopen( tpwConfig::CACHE_PATH, 'w' );
        fputs( $fCache, $reviewsData );
        fclose( $fCache );
    }
}