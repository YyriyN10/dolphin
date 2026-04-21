<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package dolphincargo
	 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght,XOPQ,XTRA,YOPQ,YTDE,YTFI,YTLC,YTUC@8..144,100..1000,96,468,79,-203,738,514,712&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo THEME_PATH;?>/assets/css/fonts.css">

	<meta name="msapplication-TileColor" content="#16246F">

	<meta name="theme-color" content="#16246F">

	<!-- Meta Pixel Code -->
	<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2146389072429854');
    fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	               src="https://www.facebook.com/tr?id=2146389072429854&ev=PageView&noscript=1"
		/></noscript>
	<!-- End Meta Pixel Code -->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-2Z6N2YKYCX"></script>
	<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2Z6N2YKYCX');
	</script>
	<script type="text/javascript">
    (function (d,s,u,e,p) {
      p=d.getElementsByTagName(s)[0],e=d.createElement(s),e.async=1,e.src=u,p.parentNode.insertBefore(e, p);
    })(document, 'script', 'https://script.ringostat.com/v4/4b/4b9521b3dcac4837bed30f34846724315d17e56f.js');
    var pw = function() {if (typeof(ringostatAnalytics) === "undefined") {setTimeout(pw,100);} else {ringostatAnalytics.sendHit('pageview');}};
    pw();
	</script>
	<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
      c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
      t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
      y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "ruo5ojw78t");
	</script>

	<?php wp_head(); ?>
</head>

<?php
	$pageCustomClass = carbon_get_post_meta(get_the_ID(),'custom_page_trigger_class');
?>

<body <?php body_class($pageCustomClass); ?>>
<?php wp_body_open(); ?>

<div class="wrapper">
	<!--<div class="calculator-btn" id="calculator-btn" data-toggle="modal" data-target="#calculatorModal">
    <?php /*echo esc_html( pll__( 'Калькулятор' ) ); */?>
  </div>-->
  <div class="button call-btn mobile-cal-btn d-none" data-toggle="modal" data-target="#formModal">
		<?php echo esc_html( pll__( 'ОТРИМАТИ ПРОПОЗИЦІЮ' ) ); ?>
  </div>
	<div class="calculator-type-1" id="calculator-type-1" data-toggle="modal" data-target="#calculatorType1Modal">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" viewBox="0 0 183.5 183.5" xml:space="preserve">
      <path d="M145,183.5H38.5C17.271,183.5,0,166.229,0,145V38.5C0,17.271,17.271,0,38.5,0H145c21.229,0,38.5,17.271,38.5,38.5V145  C183.5,166.229,166.229,183.5,145,183.5z M94.75,177.5H145c17.921,0,32.5-14.58,32.5-32.5V94.75H94.75V177.5z M6,94.75V145  c0,17.92,14.579,32.5,32.5,32.5h50.25V94.75H6z M94.75,88.75h82.75V38.5C177.5,20.58,162.921,6,145,6H94.75V88.75z M6,88.75h82.75V6  H38.5C20.579,6,6,20.58,6,38.5V88.75z M62.61,151.24c-0.768,0-1.535-0.293-2.121-0.878l-11.786-11.786l-11.785,11.786  c-1.172,1.171-3.07,1.171-4.242,0c-1.172-1.171-1.172-3.071,0-4.242l11.785-11.786l-11.785-11.785c-1.172-1.171-1.172-3.071,0-4.242  c1.172-1.172,3.07-1.171,4.242,0l11.785,11.786l11.786-11.786c1.172-1.171,3.07-1.171,4.242,0c1.172,1.171,1.172,3.071,0,4.242  l-11.785,11.785l11.785,11.786c1.172,1.171,1.172,3.071,0,4.242C64.146,150.947,63.378,151.24,62.61,151.24z M137.64,151.24h-0.073  c-1.657,0-3-1.343-3-3s1.343-3,3-3s3.037,1.343,3.037,3S139.297,151.24,137.64,151.24z M153.629,137.333h-32.052  c-1.657,0-3-1.343-3-3s1.343-3,3-3h32.052c1.657,0,3,1.343,3,3S155.286,137.333,153.629,137.333z M137.671,123.427h-0.136  c-1.657,0-3-1.343-3-3s1.343-3,3-3h0.136c1.657,0,3,1.343,3,3S139.328,123.427,137.671,123.427z M48.703,64.667  c-1.657,0-3-1.343-3-3V48.333H32.37c-1.657,0-3-1.343-3-3s1.343-3,3-3h13.333V29c0-1.657,1.343-3,3-3s3,1.343,3,3v13.333h13.334  c1.657,0,3,1.343,3,3s-1.343,3-3,3H51.703v13.333C51.703,63.323,50.36,64.667,48.703,64.667z M153.937,48.333H121.27  c-1.657,0-3-1.343-3-3s1.343-3,3-3h32.667c1.657,0,3,1.343,3,3S155.594,48.333,153.937,48.333z"/>
    </svg>
	</div>
	<header class="site-header header-anchor">
		<div class="container-fluid custom-container">
			<div class="row">
				<div class="content col-12">
          <div class="menu-btn btn-open" id="menu-btn-open">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M3.33325 5H16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.33325 10H16.6666" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.33325 15H13.3333" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
					<?php if( is_front_page() ):?>
						<div class="logo">
							<img src="<?php echo carbon_get_theme_option('dolphincargo_option_logo');?>" alt="<?php echo get_bloginfo('name');?>">
						</div>
					<?php else:?>
						<a href="<?php echo get_home_url('/');?>" class="logo">
							<img src="<?php echo carbon_get_theme_option('dolphincargo_option_logo');?>" alt="<?php echo get_bloginfo('name');?>">
						</a>
					<?php endif;?>

					<nav id="header-anchor-navigation" class="header-anchor-navigation">
            <div class="menu-btn btn-close" id="menu-btn-close">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M16.127 0.177046L10.757 5.50705L8.50705 7.79705L2.85705 2.14705L0.857046 0.147046C0.762894 0.052894 0.635196 -9.92051e-10 0.502046 0C0.368895 9.92051e-10 0.241198 0.052894 0.147046 0.147046C0.052894 0.241198 9.92051e-10 0.368895 0 0.502046C-9.92051e-10 0.635196 0.052894 0.762894 0.147046 0.857046L5.50705 6.25705L7.79705 8.50705L2.14705 14.157L0.147046 16.157C0.052894 16.2512 -3.13714e-09 16.3789 0 16.512C3.13714e-09 16.6452 0.052894 16.7729 0.147046 16.867C0.241198 16.9612 0.368895 17.0141 0.502046 17.0141C0.635197 17.0141 0.762894 16.9612 0.857046 16.867L6.25705 11.507L8.50705 9.21705L14.157 14.867L16.157 16.867C16.2037 16.9137 16.259 16.9506 16.3199 16.9759C16.3808 17.0011 16.4461 17.0141 16.512 17.0141C16.578 17.0141 16.6433 17.0011 16.7042 16.9759C16.7651 16.9506 16.8204 16.9137 16.867 16.867C16.9137 16.8204 16.9506 16.7651 16.9759 16.7042C17.0011 16.6433 17.0141 16.578 17.0141 16.512C17.0141 16.4461 17.0011 16.3808 16.9759 16.3199C16.9506 16.259 16.9137 16.2037 16.867 16.157L11.507 10.757L9.21705 8.50705L14.867 2.85705L16.867 0.857046C16.9572 0.758916 17.0047 0.628983 16.9991 0.495832C16.9935 0.362682 16.9352 0.237219 16.837 0.147046C16.7389 0.0568722 16.609 0.00937378 16.4758 0.0149999C16.3427 0.020626 16.2172 0.0789157 16.127 0.177046Z" fill="white"/>
              </svg>
            </div>
            <?php if( $args ):?>
              <ul class="anchor-menu">
                <?php foreach( $args as $item ):?>
                  <li class="menu-item">
                    <a href="<?php echo $item['anchor'];?>" rel="nofollow" class="scroll-to"><?php echo $item['name'];?></a>
                  </li>
                <?php endforeach;?>
              </ul>
            <?php endif;?>
					</nav>
          <div class="right-part">
	          <?php
		          $langArgs = [
			          'show_names'       => 1,
			          'display_names_as' => 'name',
			          'show_flags'       => 1,
			          'hide_current'     => 0
		          ];

		          if ( $langArgs ):
			          ?>
                <div class="lang-wrapper-new" id="lang-wrapper-new">
                  <div class="page-lang">
                    <div class="lang-name"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7" viewBox="0 0 10 7" fill="none">
                      <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5"/>
                    </svg>
                  </div>

                  <ul class="lang-list">
					          <?php pll_the_languages( $langArgs ); ?>
                  </ul>

                </div>

		          <?php endif;?>
            <div class="button call-btn" data-toggle="modal" data-target="#formModal">
              <?php echo esc_html( pll__( 'ОТРИМАТИ ПРОПОЗИЦІЮ' ) ); ?>
            </div>
          </div>
				</div>
			</div>
		</div>
	</header>
	<main>
