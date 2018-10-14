<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title_for_layout ?> - <?= $website_name ?></title>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('responsive.css') ?>
    <?= $this->Html->css('animate.min.css') ?>
    <?= $this->Html->css('owl.carousel.css') ?>
    <?= $this->Html->css('owl.transitions.css') ?>
    <?= $this->Html->css('prettyPhoto.css') ?>
    <?= $this->Html->css('main.css') ?>

      <?= $this->Html->script('jquery-1.11.0.js') ?>

    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" href="<?= $theme_config['favicon_url'] ?>" />

</head>
<body>

    <header>
      <?= $this->element('navbar') ?>
    </header>
<?= $this->element('notifications') ?>
    <?= $this->fetch('content'); ?>

  <!-- Footer -->
  <footer id="footer">
        <div class="container">
            <div class="row">

                <p class="text-left"><?= $Lang->get('GLOBAL__FOOTER') ?> <?= $theme_config['footer'] ?></p> 

                <div class="col-sm-6 centered" style="margin-left: 6%;">
    <ul class="social-icons">
      <?php
        $howManyBtns = 0;
        $howManyBtns += (!empty($facebook_link));
        $howManyBtns += (!empty($twitter_link));
        $howManyBtns += (!empty($youtube_link));
        $howManyBtns += (!empty($skype_link));
        $howManyBtns += count($findSocialButtons);
        $maxBtnsByLine = 4;
        $howManyBtnsDivided = ceil( $howManyBtns / ceil( $howManyBtns / $maxBtnsByLine ) );
        $col = 12 / $howManyBtnsDivided;
                    
        if(!empty($facebook_link)) {
          echo '<li><a href="'.$facebook_link.'"><i class="fa fa-facebook"></i></a></li>';
        }
        if(!empty($twitter_link)) {
          echo '<li><a href="'.$twitter_link.'"><i class="fa fa-twitter"></i></a></li>';
        }
        if(!empty($youtube_link)) {
          echo '<li><a href="'.$youtube_link.'"><i class="fa fa-youtube"></i></a></li>';
        }
        if(!empty($skype_link)) {
          echo '<li><a href="'.$skype_link.'"><i class="fa fa-skype"></i></a></li>';
        }                 
      ?>
                     </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

  <?= $this->element('modals') ?>

  <?= $this->Html->script('bootstrap.js') ?>
  <?= $this->Html->script('app.js') ?>
  <?= $this->Html->script('form.js') ?>
  <?= $this->Html->script('notification.js') ?>
  <script>
  <?php if($isConnected) { ?>
      // Notifications
        var notification = new $.Notification({
          'url': {
            'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
            'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
            'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
            'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
            'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
          },
          'messages': {
            'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
            'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
          }
        });
    <?php } ?>
  // Config FORM/APP.JS

  var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
  var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

  var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
  var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
  var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
  var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
  var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

  var CSRF_TOKEN = "<?= $csrfToken ?>";
  </script>

  <?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '<?= $google_analytics ?>', 'auto');
      ga('send', 'pageview');
    </script>
  <?php } ?>
  <?= $configuration_end_code ?>

</body>

</html>
