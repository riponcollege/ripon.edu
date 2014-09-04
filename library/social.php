<?php

require_once('twitter/twitteroauth/twitteroauth.php');

function twitter_posts() {

	// authenticate to Twitter
	$connection = new TwitterOAuth( '1atjbG2VbZSdIWZYSyOKeRPCS', 'zP4ELLpMNblCqBN0e0eoUmMEjinJww0w6ldMxM7OtxsGZGntKS' );

	// get the posts
	$posts = $connection->get( 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=riponredhawks&count=2' );

	// loop through them
	foreach ( $posts as $post ) { ?>
		<div class="post-twitter">
			<?php print $post->text; ?>
		</div>
		<?php
	}

}

?>