<?php
//no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Images
$Image[]= $this->params->get( '!', "" );
$Caption[]= $this->params->get( '!', "" );
$Link[]= $this->params->get( '!', "" );

for ($j=1; $j<=30; $j++){
	$Image[$j]		= $this->params->get ("Image".$j,"" );
	$Caption[$j]	= $this->params->get ("Caption".$j , "" );
	$Link[$j]		= $this->params->get ("Link".$j , "" );	
} ?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/refineslide.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/modernizr.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/respond.min.js">
<![endif]-->
        
        
    <div id="refineslide">
				<ul id="images" class="rs-slider">
                
					<?php for ($i=1; $i<=30; $i++){ if ($Image[$i] != null) { ?>
                    <li>
                        <?php if ($Link[$i] != null) {?><a href="<?php echo $Link[$i] ?>"><img src="<?php echo $Image[$i] ?>" /></a><?php } else { ?>
                        <img src="<?php echo $Image[$i] ?>" />
                        <?php }; ?>
                        <?php if ($Caption[$i] != null) {?><div class="rs-caption rs-bottom"><span><?php echo $Caption[$i] ?></span></div><?php };?>
                    </li>
                    <?php }};  ?>
				</ul>
    </div>
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.refineslide.min.js"></script>
    <script>
        jQuery(function () {
            var $upper = $('#refineslide');

            jQuery('#images').refineSlide({
                transition : '<?php echo $animation ?>',
                onInit : function () {
                    var slider = this.slider,
                       $triggers = $('.translist').find('> li > a');

                    $triggers.parent().find('a[href="#_'+ this.slider.settings['transition'] +'"]').addClass('active');

                    $triggers.on('click', function (e) {
                       e.preventDefault();

                        if (!$(this).find('.unsupported').length) {
                            $triggers.removeClass('active');
                            $(this).addClass('active');
                            slider.settings['transition'] = $(this).attr('href').replace('#_', '');
                        }
                    });

                    function support(result, bobble) {
                        var phrase = '';

                        if (!result) {
                            phrase = ' not';
                            $upper.find('div.bobble-'+ bobble).addClass('unsupported');
                            $upper.find('div.bobble-js.bobble-css.unsupported').removeClass('bobble-css unsupported').text('JS');
                        }
                    }

                    support(this.slider.cssTransforms3d, '3d');
                    support(this.slider.cssTransitions, 'css');
                }
            });
        });
    </script>
  