<?= $this->Html->css('owl.carousel') ?>
<?= $this->Html->script('owl.carousel.min') ?>

<?php if(!empty($search_slider)) { ?> 
  <section id="home">
    <!-- *** HOMEPAGE CAROUSEL ***  -->
    <div class="home-pattern"></div>

      <div class="homepage owl-carousel">

        <?php
          foreach ($search_slider as $k => $v) {

            echo '<div class="item" style="background-image:url('.$v['Slider']['url_img'].');">';
               echo '<div class="container">';
                                      echo '<center><h1 class="title-one" style="margin-top : 20%; color: white; font-size: 64px;">'.before_display($v['Slider']['title']).'</h1></center>';
                                        echo '<p class="text-center" style="color: white; font-size: 25px;">'.before_display($v['Slider']['subtitle']).'</p>';
                                        echo '<center><a class="btn btn-primary btn-lg" href="'.$theme_config['slider_url'].'">'.$theme_config['slider_text'].'</a></center> ';
                  echo '<div class="col-sm-7"><div style="height:250px;"></div></div>';
                  echo '</div>';
            echo '</div>';

          }
        ?>

      </div>
      <!-- /.project owl-slider -->
    </div>
    </div>
    <!-- *** HOMEPAGE CAROUSEL END *** -->
  </section>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.homepage').owlCarousel({
        navigation: false, // Show next and prev buttons
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        slideSpeed: 2000,
        paginationSpeed: 1000,
        autoPlay: true,
        stopOnHover: true,
        singleItem: true,
        lazyLoad: false,
        addClassActive: true,
        pagination: false,
        afterInit: function () {
        //animationsSlider();
        },
        afterMove: function () {
        //animationsSlider();
        }
    });
  });
  </script>
<?php } ?>

<section id="cta" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Nous rejoindre</h2>
                    <p><b><?= ($banner_server) ? $banner_server : $Lang->get('SERVER__STATUS_OFF') ?></b> !
                    </p>
                </div>
                <div class="col-sm-3 text-right">
                    <a class="btn btn-primary btn-lg" href="<?= $theme_config['join_url'] ?>"><?= $theme_config['join_text'] ?></a>
                </div>
            </div>
        </div>
    </section>

  <section id="services" >
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nos Services</h2>
            </div>
<?php
          $features = $theme_config['homepage_features'];
          if(!empty($features)) {
            $featuresChunked = array_chunk($features, 3);
            foreach ($featuresChunked as $features) {
              echo '<div class="row">';
              echo '<div class="features">';
                foreach ($features as $feature) {
                    echo '<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">';
                      echo '<div class="media service-box">';
                        echo '<div class="pull-left"><i class="fa fa-'.$feature->icon.'"></i></div>';
                          echo '<div class="media-body">';
                            echo '<h4>'.$feature->title.'</h4>';
                          echo '<p>'.$feature->message.'</p>';
                        echo '</div>';
                      echo '</div>';
                    echo '</div>';
                }
              echo '</div>';
              echo '</div>';
            }
          }
          ?>
       
        </div><
    </section>

    <section id="cta" class="wow fadeIn">
        <div class="container">
      <div class="section-header" style="margin-bottom : 0.33%;">
                <h2 class="section-title text-center wow fadeInDown">Vote</h2>
            </div>
                <div class="text-center">
                    <a class="btn btn-primary btn-lg" href="<?= $theme_config['vote_url'] ?>"> <?= $theme_config['vote_text'] ?> </a>
                </div>
        </div>
    </section>

<section class="bar background-white">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?= $Lang->get('NEWS__LAST_TITLE') ?></h2>
            </div>
     <div class="row">
<?php
        if(!empty($search_news)) {

          $i = 0;
          foreach ($search_news as $news) {

            $i++;

            if($i > 4) {
              break;
            }

            echo '<div class="newsposition wow fadeInDown text-center">';
              echo '<div class="box-image-text blog">';
                echo '<div class="content">';
                  echo '<h4><a href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'">'.cut($news['News']['title'], 15).'</a></h4>';
                    echo '<span class="entry-author"><i class="fa fa-pencil"></i>&nbsp;';
                      echo $Lang->get('GLOBAL__BY').' <a href="#">'.$news['News']['author'].'</a> '.$Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']);;
                    echo ' </span>';
                    echo '<p class="intro">';
                      echo $this->Text->truncate($news['News']['content'], 170, array('ellipsis' => '...', 'html' => true));
                    echo '<p class="btn btn-default">';
                      echo '<a href="'.$this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])).'" class="btn btn-template-main">'.$Lang->get('NEWS__READ_MORE').'</a>';
                    echo '</p>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
            echo '</br>';
          }
        } else {
          echo '<div class="alert alert-danger">'.$Lang->get('NEWS__NONE_PUBLISHED').'</div>';
        }
        ?>
</div>

            </div>
          </div>
        </div>
    </section>

<?= $Module->loadModules('home') ?>
 