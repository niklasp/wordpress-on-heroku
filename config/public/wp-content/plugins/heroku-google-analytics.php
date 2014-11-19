<?php
/*
Plugin Name: Google Analytics for Wordpress on Heroku
Plugin URI: http://github.com/mchung/heroku-buildpack-wordpress
Description: Google Analytics Wordpress plugin for Wordpress sites running on Heroku. Depends on GOOG_UA_ID
Version: 1.0
Author: Marc Chung
Author URI: http://www.marcchung.com
License: MIT
*/
add_action('wp_head', 'heroku_google_analytics');

function heroku_google_analytics() {
  $google_analytics_ua = getenv('GOOG_UA_ID');
  if (!empty($google_analytics_ua)) {
?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $google_analytics_ua; ?>', 'auto');
  ga('send', 'pageview');

</script>

<?php
  }
}
?>