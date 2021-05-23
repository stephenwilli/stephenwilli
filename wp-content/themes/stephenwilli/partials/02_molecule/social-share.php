<?php
		$postURL = urlencode(get_permalink());
		$postTitle = get_the_title();
		$postThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full_screen' );
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postURL.'&amp;via=StephenWilliamsPhotography';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postURL;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$postURL.'&amp;media='.$postThumbnail[0].'&amp;description='.$postTitle; 
    ?>
 
<div class="social-share">
	<p>Share:  
    <a class="share-link share-twitter" href="<?= $twitterURL; ?>" target="_blank">Twitter</a>
		<a class="share-link share-facebook" href="<?= $facebookURL; ?>" target="_blank">Facebook</a>
		<a class="share-link share-pinterest" href="<?= $pinterestURL; ?>" data-pin-custom="true" target="_blank">Pin It</a>
  </p>
</div>
