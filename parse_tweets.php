<?php
/**
* parse_tweets.php
* Populate the database with new tweet data from the json_cache table
* Latest copy of this code: http://140dev.com/free-twitter-api-source-code-library/
* @author Adam Green <140dev@gmail.com>
* @license GNU Public License
* @version BETA 0.30
*/
require_once('140dev_config.php');
require_once('db_lib.php');
$oDB = new db;
$iDs = array('2669926393', '2455522537', '2436303289', 
'2413175566', '2409652621', '2367153709', '2346202254', '2345782441', 
'2212472492', '2202138169', '2172373309', '1965598597', '1950494808',
'1902109848', '1735555430', '1711520023', '1685964380', '1670240725', 
'1631592002', '1617972470', '1615560642', '1602007778', '1592503250', 
'1591895036', '1573759129', '1570719330', '1561807094', '1561026270',
'1553134358', '1525957801', '1450213592', '1416873554', '1405827127', 
'1265955871', '1252426999', '1247796967', '1205734178', '1177666310', 
'1173659923', '1093119396', '1066053012', '1007946349', '971983016', 
'939282068', '919579849', '917844121', '858681919', '839779261', 
'827700925', '813953876', '796257684', '783693931', '772530552', 
'770490488', '762404028', '714213253', '703904814', '703596972', 
'631669807', '621593769', '614332678', '586166449', '580575894', 
'580072850', '574656873', '537092737', '527975871', '520278328', 
'504850769', '503974171', '495182444', '457823422', '456336316', 
'452456218', '450776559', '434464628', '420656213', '417793732', 
'410739206', '410175804', '404135677', '392372010', '391753350', 
'390673468', '388380853', '384028016', '383581137', '348862434', 
'344873257', '344350209', '343744518', '343139190', '340608447', 
'338493371', '338179321', '335966474', '335667311', '334876955', 
'328002325', '311292225', '308750331', '292671988', '287937802', 
'284687289', '283088008', '275834758', '264455390', '258600039', 
'257521545', '252327705', '251102215', '250482344', '249495368', 
'237134734', '230189834', '214276463', '211385401', '204859237', 
'196832041', '180487091', '174415512', '167581897', '162510686', 
'161706931', '160354526', '158864679', '143994358', '128702411', 
'121651264', '118178846', '117396227', '114204053', '113473289', 
'108414810', '106892392', '98028759', '92413538', '79285884', 
'74887233', '70101580', '66965904', '60071437', '58988099', 
'57921995', '57921995', '52105542', '49901629', '49459494', 
'48363336', '47842352', '47479534', '47229540', '46482287', 
'46023810', '43613097', '42928134', '39437995', '32882761', 
'30671388', '30256953', '29466813', '27688476', '27486005', 
'26364335', '26143616', '26088115', '23194126', '22831232', 
'22392756', '21540116', '21439807', '19954347', '19820901', 
'19608695', '19582638', '19011604', '18872545', '18822540', 
'18389166', '18107749', '17914492', '17584393', '17056289', 
'16797138', '16307712', '15051291', '10314482', '10104432', 
'17841118', '1605389462', '371805411', '168605761', '194870705', 
'2721016870', '53556599', '165039022', '2432475050', '1617837925', 
'749737897', '720496992', '2477931562', '425377813', '17613165', 
'484179170', '15969896', '14056795', '568488523', '2315828953', 
'2787100004', '2352517638', '468417055', '37327217', '20315034', 
'2771843164', '25387854', '359975859', '38252365', '29012359', 
'543793030', '490825257', '865331798', '1686586170', '26449537', 
'2729736007', '870779617', '1711000663', '18693673', '985738279', 
'2577261302', '295644515', '17330008', '1417190546', '28114572', 
'24888528', '2691467174', '2440007701', '1212713226', '61621459', 
'250130693', '2327681706', '806487104', '247111298', '2334016531', 
'26328515', '1554264498', '1067299039', '400150445', '242084573', 
'1355894706', '123705306', '49297420', '2710175864', '2396823240', 
'2696974231', '1678343606', '32585474', '271182655', '347572847', 
'1691656106', '22392756', '2675470471', '1666664468', '393749514', 
'2713058460', '2775115057', '2806475035', '2790844920', '38252365', 
'360326862', '73647843', '2535367145', '102372765', '2746240291', 
'1562899980', '387533171', '69971128', '1681980764', '2286941253', 
'16132239', '2749982672', '2309193876', '944733954', '2740174188', 
'973373712', '1958822521', '224851802', '1972629270', '175811940', 
'2740390059', '1566656064', '476409601', '49188662', '33616195', 
'713797871', '186281500', '578286663', '38822894', '1002072072', 
'319215178', '310007585', '8710512', '333712869', '718187010', 
'338577657', '2697296252', '2218802533', '138147879', '185398439', 
'63396347', '347193582', '2687526782', '1587218322', '1428499968', 
'353896660', '1300618962', '29115896', '2159368137', '411538227', 
'2654520044', '23207971', '2657047459', '1686780205', '15575310', 
'36089399', '2689971496', '908553368', '2610100986', '265717258', 
'28114572', '37218405', '458491345', '1088330292', '158576980', 
'273773439', '7053202', '870887281', '16571710', '17709518', 
'229543124', '262307193', '1561089175', '367311849', '342464288', 
'523492439', '245223986', '134179149', '574815349', '1296886556', 
'169125770', '339340704', '26310873', '20206859', '28499193', 
'147324862', '171928306', '435908883', '94648321', '49203411', 
'24915658', '17256971', '2373245587', '258632238', '24619564', 
'149511921', '2236840538', '1400254398', '253830706', '563205805', 
'8086612', '30966805', '449399096', '344894137', '187266925', 
'28440564', '185903495', '729560551', '278308909', '365806226', 
'55093654', '518919206', '41041779', '18332380', '1099848703', 
'324433027', '22614056', '455149162', '265717258', '61621459', 
'976477308', '39708459', '2598534433', '32376634', '164030123', 
'264330140', '1885122110', '1601473026', '599714665', '1247796967', 
'1309033687', '425306996', '33677066', '90002760', '1348206098', 
'17881634', '417414257', '963010074', '74887233', '148926626', 
'527749314', '177354407', '1721052877', '398682748', '321699787', 
'483251528', '354456018', '308803534', '621200087', '34454870', 
'19995045', '586884680', '24710177', '47842352', '586925464', 
'33016446', '48767481', '365068842', '631657132', '780696698', 
'2386852720', '18434425', '237006231', '34329535', '171299939', 
'391753350', '24518742', '2557821481', '603742935', '262349549', 
'500236742', '492436785', '325918049', '374846956', '2369578471', 
'555707454', '477202650', '23384806', '964782716', '12340202', 
'296621061', '28013119', '1260601225', '365806226', '29284541', 
'29284212', '67654029', '944646732', '187375788', '58777824', 
'18324199', '55377568', '353001110', '714388442', '50570974', 
'28499193', '20190239', '20144094', '32175189', '443246297', 
'433802378', '34373549', '746356400', '17680956', '357330468');

// This should run continuously as a background process
while (true) {

  // Process all new tweets
  $query = 'SELECT cache_id, raw_tweet ' .
    'FROM json_cache';
  $result = $oDB->select($query);
  while($row = mysqli_fetch_assoc($result)) {
		
    $cache_id = $row['cache_id'];
    // Each JSON payload for a tweet from the API was stored in the database  
    // by serializing it as text and saving it as base64 raw data
    $tweet_object = unserialize(base64_decode($row['raw_tweet']));
		
    // Delete cached copy of tweet
    $oDB->select("DELETE FROM json_cache WHERE cache_id = $cache_id");
		
		// Limit tweets to a single language,
		// such as 'en' for English
		if ($tweet_object->lang <> 'en') {continue;}
		
		// The streaming API sometimes sends duplicates, 
    // Test the tweet_id before inserting
    $tweet_id = $tweet_object->id_str;
    if ($oDB->in_table('tweets','tweet_id=' . $tweet_id )) {continue;}
		
    // Gather tweet data from the JSON object
    // $oDB->escape() escapes ' and " characters, and blocks characters that
    // could be used in a SQL injection attempt
    
   //KEEP AN ARRAY VARIABLE THAT HOLDS ALL THE USER IDS OF THE CANIDIDATES TO 
   //ELIMINATE MENTIONS AND TO BE USED IN GETTWEETS	
   
      //if a retweet, need to check to see if the tweeter is a candidate						
   		if (isset($tweet_object->retweeted_status)) {
			if(in_array($tweet_object->user->id_str, $iDs)){
				// This is a retweet by a candidate
      			// Use the original tweet's entities, they are more complete
      			$entities = $tweet_object->retweeted_status->entities;
				$is_rt = 1;
			}
			else{
				continue;
				}
      #$entities = $tweet_object->retweeted_status->entities;
		#	$is_rt = 1;
	  } else{
	  		//not a retweeted status, so now need to look to see  
	  		//if the tweet was by a candidate
	  		if(in_array($tweet_object->user->id_str, $iDs)){
	  			$entities = $tweet_object->entities;
		  		$is_rt = 0;
	  		}
	  		else{
	  		continue;
	  		}
	  }
		
	$tweet_text = $oDB->escape($tweet_object->text);	
    $created_at = $oDB->date($tweet_object->created_at);
    if (isset($tweet_object->geo)) {
      $geo_lat = $tweet_object->geo->coordinates[0];
      $geo_long = $tweet_object->geo->coordinates[1];
    } else {
      $geo_lat = $geo_long = 0;
    } 
    $user_object = $tweet_object->user;
    $user_id = $user_object->id_str;
    $screen_name = $oDB->escape($user_object->screen_name);
    $name = $oDB->escape($user_object->name);
    $profile_image_url = $user_object->profile_image_url;
	$retweet_num = $tweet_object->retweet_count;
	$tags = '';
	foreach ($entities->hashtags as $hashtag) {
		$tags = $tags . " " . $hashtag->text;
	}
	$mentions = '';
	foreach ($entities->user_mentions as $user_mention) {
		$mentions = $mentions . " " . $user_mention->screen_name;
	}
	$url = '';
	foreach ($entities->urls as $link) {
		if (empty($link->expanded_url)) {
			 $url = $url . " " . $link->url;
		   } else {
			 $url = $url . " " . $link->expanded_url;
		}
	}
	$total_tweets = $user_object->statuses_count;
	$followers = $user_object->followers_count;
	$following = $user_object->friends_count;

		
    // Add a new user row or update an existing one
    $field_values = 'screen_name = "' . $screen_name . '", ' .
      'profile_image_url = "' . $profile_image_url . '", ' .
      'user_id = ' . $user_id . ', ' .
      'name = "' . $name . '", ' .
      'location = "' . $oDB->escape($user_object->location) . '", ' . 
      'url = "' . $user_object->url . '", ' .
      'description = "' . $oDB->escape($user_object->description) . '", ' .
      'created_at = "' . $oDB->date($user_object->created_at) . '", ' .
      'followers_count = ' . $user_object->followers_count . ', ' .
      'friends_count = ' . $user_object->friends_count . ', ' .
      'statuses_count = ' . $user_object->statuses_count . ', ' . 
      'time_zone = "' . $user_object->time_zone . '", ' .
      'last_update = "' . $oDB->date($tweet_object->created_at) . '"' ;			

    if ($oDB->in_table('users','user_id="' . $user_id . '"')) {
      $oDB->update('users',$field_values,'user_id = "' .$user_id . '"');
    } else {			
      $oDB->insert('users',$field_values);
    }
		
    // Add the new tweet
	
    $field_values = 'tweet_id = ' . $tweet_id . ', ' .
        'tweet_text = "' . $tweet_text . '", ' .
        'created_at = "' . $created_at . '", ' .
        'geo_lat = ' . $geo_lat . ', ' .
        'geo_long = ' . $geo_long . ', ' .
        'user_id = ' . $user_id . ', ' .				
        'screen_name = "' . $screen_name . '", ' .  
        'name = "' . $name . '", ' .
        'profile_image_url = "' . $profile_image_url . '", ' .
        'retweets = ' . $retweet_num . ', ' .
		'hashtags = "' . $tags . '", '.
        'mentions = "' . $mentions . '", '.
        'links = "' . $url . '", '.
        
        'total_tweets = ' . $total_tweets . ', '.
        'followers = ' . $followers . ', '.
        'following = ' . $following . ', '.
        'is_retweeted = ' . $is_rt;
			
    $oDB->insert('tweets',$field_values);
		
    // The mentions, tags, and URLs from the entities object are also
    // parsed into separate tables so they can be data mined later
    foreach ($entities->user_mentions as $user_mention) {
		
      $where = 'tweet_id=' . $tweet_id . ' ' .
        'AND source_user_id=' . $user_id . ' ' .
        'AND target_user_id=' . $user_mention->id;		
					 
      if(! $oDB->in_table('tweet_mentions',$where)) {
			
        $field_values = 'tweet_id=' . $tweet_id . ', ' .
        'source_user_id=' . $user_id . ', ' .
        'target_user_id=' . $user_mention->id;	
				
        $oDB->insert('tweet_mentions',$field_values);
      }
    }
    foreach ($entities->hashtags as $hashtag) {
			
      $where = 'tweet_id=' . $tweet_id . ' ' .
        'AND tag="' . $hashtag->text . '"';		
					
      if(! $oDB->in_table('tweet_tags',$where)) {
			
        $field_values = 'tweet_id=' . $tweet_id . ', ' .
          'tag="' . $hashtag->text . '"';	
				
        $oDB->insert('tweet_tags',$field_values);
      }
    }
    // foreach ($entities->urls as $url) {
// 		
//       if (empty($url->expanded_url)) {
//         $url = $url->url;
//       } else {
//         $url = $url->expanded_url;
//       }
// 			
//       $where = 'tweet_id=' . $tweet_id . ' ' .
//         'AND url="' . $url . '"';		
// 					
//       if(! $oDB->in_table('tweet_urls',$where)) {
//         $field_values = 'tweet_id=' . $tweet_id . ', ' .
//           'url="' . $url . '"';	
// 				
//         $oDB->insert('tweet_urls',$field_values);
//       }
//     }		
  } 
		
  // You can adjust the sleep interval to handle the tweet flow and 
  // server load you experience
  sleep(1);
}


?>