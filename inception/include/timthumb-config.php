<?php
$xoopsOption['nocommon'] = 1;
include dirname(dirname(dirname(dirname(__FILE__)))).'/mainfile.php';

define ('DEBUG_ON', false);                                // Enable debug logging to web server error log (STDERR)
define ('DEBUG_LEVEL', 1);                                // Debug level 1 is less noisy and 3 is the most noisy
define ('MEMORY_LIMIT', '30M');                            // Set PHP memory limit
define ('BLOCK_EXTERNAL_LEECHERS', false);                // If the image or webshot is being loaded on an external site, display a red "No Hotlinking" gif.

//Image fetching and caching
define ('ALLOW_EXTERNAL', TRUE);                        // Allow image fetching from external websites. Will check against ALLOWED_SITES if ALLOW_ALL_EXTERNAL_SITES is false
define ('ALLOW_ALL_EXTERNAL_SITES', false);                // Less secure. 
define ('FILE_CACHE_ENABLED', TRUE);                    // Should we store resized/modified images on disk to speed things up?
define ('FILE_CACHE_TIME_BETWEEN_CLEANS', 86400);    // How often the cache is cleaned 

define ('FILE_CACHE_MAX_FILE_AGE', 86400);                // How old does a file have to be to be deleted from the cache
define ('FILE_CACHE_SUFFIX', '.timthumb.txt');            // What to put at the end of all files in the cache directory so we can identify them
define ('FILE_CACHE_PREFIX', 'timthumb');                // What to put at the beg of all files in the cache directory so we can identify them
define ('FILE_CACHE_DIRECTORY', XOOPS_VAR_PATH.'/caches/xoops_cache/inception');                // Directory where images are cached. Left blank it will use the system temporary directory (which is better for security)
define ('MAX_FILE_SIZE', 10485760);                        // 10 Megs is 10485760. This is the max internal or external file size that we'll process.  
define ('CURL_TIMEOUT', 20);                            // Timeout duration for Curl. This only applies if you have Curl installed and aren't using PHP's default URL fetching mechanism.
define ('WAIT_BETWEEN_FETCH_ERRORS', 3600);                //Time to wait between errors fetching remote file

//Browser caching
define ('BROWSER_CACHE_MAX_AGE', 864000);                // Time to cache in the browser
define ('BROWSER_CACHE_DISABLE', false);                // Use for testing if you want to disable all browser caching

//Image size and defaults
define ('MAX_WIDTH', 1500);                                    // Maximum image width
define ('MAX_HEIGHT', 1500);                                // Maximum image height
define ('NOT_FOUND_IMAGE', '');                                // Image to serve if any 404 occurs 
define ('ERROR_IMAGE', '');                                    // Image to serve if an error occurs instead of showing error message 
define ('PNG_IS_TRANSPARENT', true);  //42 Define if a png image should have a transparent background color. Use False value if you want to display a custom coloured canvas_colour 
define ('DEFAULT_Q', 85);                                    // Default image quality. Allows overrid in timthumb-config.php
define ('DEFAULT_ZC', 1);                                    // Default zoom/crop setting. Allows overrid in timthumb-config.php
define ('DEFAULT_F', '');                                    // Default image filters. Allows overrid in timthumb-config.php
define ('DEFAULT_S', 0);                                    // Default sharpen value. Allows overrid in timthumb-config.php
define ('DEFAULT_CC', 'ffffff');                            // Default canvas colour. Allows overrid in timthumb-config.php


//Image compression is enabled if either of these point to valid paths

//These are now disabled by default because the file sizes of PNGs (and GIFs) are much smaller than we used to generate. 
//They only work for PNGs. GIFs and JPEGs are not affected.
define ('OPTIPNG_ENABLED', false);  
define ('OPTIPNG_PATH', '/usr/bin/optipng'); //This will run first because it gives better compression than pngcrush. 
define ('PNGCRUSH_ENABLED', false); 
define ('PNGCRUSH_PATH', '/usr/bin/pngcrush'); //This will only run if OPTIPNG_PATH is not set or is not valid

/*
    -------====Website Screenshots configuration - BETA====-------
    
    If you just want image thumbnails and don't want website screenshots, you can safely leave this as is.    
    
    If you would like to get website screenshots set up, you will need root access to your own server.

    Enable ALLOW_ALL_EXTERNAL_SITES so you can fetch any external web page. This is more secure now that we're using a non-web folder for cache.
    Enable BLOCK_EXTERNAL_LEECHERS so that your site doesn't generate thumbnails for the whole Internet.

    Instructions to get website screenshots enabled on Ubuntu Linux:

    1. Install Xvfb with the following command: sudo apt-get install subversion libqt4-webkit libqt4-dev g++ xvfb
    2. Go to a directory where you can download some code
    3. Check-out the latest version of CutyCapt with the following command: svn co https://cutycapt.svn.sourceforge.net/svnroot/cutycapt
    4. Compile CutyCapt by doing: cd cutycapt/CutyCapt
    5. qmake
    6. make
    7. cp CutyCapt /usr/local/bin/
    8. Test it by running: xvfb-run --server-args="-screen 0, 1024x768x24" CutyCapt --url="http://markmaunder.com/" --out=test.png
    9. If you get a file called test.png with something in it, it probably worked. Now test the script by accessing it as follows:
    10. http://yoursite.com/path/to/timthumb.php?src=http://markmaunder.com/&webshot=1

    Notes on performance: 
    The first time a webshot loads, it will take a few seconds.
    From then on it uses the regular timthumb caching mechanism with the configurable options above
    and loading will be very fast.

    --ADVANCED USERS ONLY--
    If you'd like a slight speedup (about 25%) and you know Linux, you can run the following command which will keep Xvfb running in the background.
    nohup Xvfb :100 -ac -nolisten tcp -screen 0, 1024x768x24 > /dev/null 2>&1 &
    Then set WEBSHOT_XVFB_RUNNING = true below. This will save your server having to fire off a new Xvfb server and shut it down every time a new shot is generated. 
    You will need to take responsibility for keeping Xvfb running in case it crashes. (It seems pretty stable)
    You will also need to take responsibility for server security if you're running Xvfb as root. 


*/
define ('WEBSHOT_ENABLED', false);            //Beta feature. Adding webshot=1 to your query string will cause the script to return a browser screenshot rather than try to fetch an image.
define ('WEBSHOT_CUTYCAPT', '/usr/local/bin/CutyCapt'); //The path to CutyCapt. 
define ('WEBSHOT_XVFB', '/usr/bin/xvfb-run');        //The path to the Xvfb server
define ('WEBSHOT_SCREEN_X', '1024');            //1024 works ok
define ('WEBSHOT_SCREEN_Y', '768');            //768 works ok
define ('WEBSHOT_COLOR_DEPTH', '24');            //I haven't tested anything besides 24
define ('WEBSHOT_IMAGE_FORMAT', 'png');            //png is about 2.5 times the size of jpg but is a LOT better quality
define ('WEBSHOT_TIMEOUT', '20');            //Seconds to wait for a webshot
define ('WEBSHOT_USER_AGENT', "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.9.2.18) Gecko/20110614 Firefox/3.6.18"); //I hate to do this, but a non-browser robot user agent might not show what humans see. So we pretend to be Firefox
define ('WEBSHOT_JAVASCRIPT_ON', true);            //Setting to false might give you a slight speedup and block ads. But it could cause other issues.
define ('WEBSHOT_JAVA_ON', false);            //Have only tested this as fase
define ('WEBSHOT_PLUGINS_ON', true);            //Enable flash and other plugins
define ('WEBSHOT_PROXY', '');                //In case you're behind a proxy server. 
define ('WEBSHOT_XVFB_RUNNING', false);            //ADVANCED: Enable this if you've got Xvfb running in the background.


// If ALLOW_EXTERNAL is true and ALLOW_ALL_EXTERNAL_SITES is false, then external images will only be fetched from these domains and their subdomains. 
$ALLOWED_SITES = array (
        'flickr.com',
        'staticflickr.com',
        'picasa.com',
        'img.youtube.com',
        'upload.wikimedia.org',
        'photobucket.com',
        'imgur.com',
        'imageshack.us',
        'tinypic.com',
    );