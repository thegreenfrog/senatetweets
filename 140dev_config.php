<?php
/**
* 140dev_config.php
* Constants for the entire 140dev Twitter framework
* You MUST modify these to match your server setup when installing the framework
* 
* Latest copy of this code: http://140dev.com/free-twitter-api-source-code-library/
* @author Adam Green <140dev@gmail.com>
* @license GNU Public License
* @version BETA 0.30
*/

// OAuth settings for connecting to the Twitter streaming API
// Fill in the values for a valid Twitter app
define('TWITTER_CONSUMER_KEY','PO7QgVQJP6Jz8OuqOkVFfme2j');
define('TWITTER_CONSUMER_SECRET','nnaQ1Ib41X4SYmUsV9VonvsXNDSmftl4j3MLMUhkRxthjrV57j');
define('OAUTH_TOKEN','2535706435-E15IM15pGWWIHmzGLxwjlaCr1RRvyCh8wKEEEN9');
define('OAUTH_SECRET','4hpDW89cCkwT40rI9fBReW0uo2N0pca6GEKUB4hgk6dUP');

// Settings for monitor_tweets.php
define('TWEET_ERROR_INTERVAL',10);
// Fill in the email address for error messages
define('TWEET_ERROR_ADDRESS','gogreen.chris@gmail.com');
?>