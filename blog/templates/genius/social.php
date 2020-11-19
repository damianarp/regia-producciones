<?php
//no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Images
$SocialLink[]= $this->params->get( '!', "" );
$SocialTitle = array ("","Facebook","Twitter","Google Plus","Youtube","Dribbble","Flickr","Pinterest","Picasa","Linkedin","Reddit");
for ($j=1; $j<=40; $j++){
	$SocialLink[$j]		= $this->params->get ("SocialLink".$j,"" );

}; ?>

<div id="social">
		<?php for ($i=1; $i<=40; $i++){ if ($SocialLink[$i] != null) { ?>
            <a href="<?php echo $SocialLink[$i] ?>" class="social-icon social_<?php echo $i ?>" title="<?php echo $SocialTitle[$i] ?>"></a>
        <?php }};  ?>
</div>
