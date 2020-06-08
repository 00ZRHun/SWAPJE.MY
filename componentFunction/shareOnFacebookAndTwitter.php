<!-- actual link -->
<?php
  $actual_link = "https://abc.com/";
//   $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!-- <h1><?= $actual_link ?></h1> -->
<!-- <h1><?= urlencode($actual_link) ?></h1> -->

<div class="share_vehicle">
    <p>
        Share:
        <!--share-on-facebook-->
        <!-- version 1 -->
        <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&u=<?= urlencode($actual_link) ?>&display=popup&ref=plugin&src=share_button">
            <i class="fa fa-facebook-square" aria-hidden="true"></i>
        </a>
        <!-- version 2 -->
            <!-- <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%3A8888%2FSWAPJE.MY%2Fitem-details.php%3Fvhid%3D16&layout=button_count&size=small&width=71&height=20&appId" width="71" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
            <!-- <iframe 
                src="https://www.facebook.com/plugins/share_button.php?href=<?= urlencode($actual_link) ?>&layout=button_count&size=small&width=100&height=20&appId"
                width="100"
                height="20"
                style="border:none;overflow:hidden"
                scrolling="no"
                frameborder="0"
                allowTransparency="true"
                allow="encrypted-media"
            >
            </iframe> -->
        <!-- version 3 -->
            <!-- <?php
                $title=urlencode('SWAPJE.MY');
                $url=urlencode($actual_link);
                // $url=urlencode('https://www.facebook.com/plugins/share_button.php');
                $image=urlencode('assets/images/logo/cover2.png');
                // $image=urlencode('https://s.abcnews.com/images/Lifestyle/191029_atm_abcsMIX_hpMain_16x9_992.jpg');
            ?>
            <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
                Share our Facebook page!
            </a> -->
        <!--/share-on-facebook-->

        

        <!--share-on-twitter-->
        <!-- version 1 -->
        <!-- <a class="twitter-share-button"
            href="https://twitter.com/intent/tweet?text=<?= $actual_link ?>"
            data-size="large">
                Tweet
        </a> -->
        <!-- version 2 -->
        <a class="twitter-share-button"
            href="http://twitter.com/share?text=Good Product&url=<?= $actual_link ?>&hashtags=hashtag1,hashtag2,hashtag3"
            data-size="large">
            <i class="fa fa-twitter-square" aria-hidden="true"></i>
        </a>
        <!-- National Park Tweets - Curated tweets by TwitterDe -->
        <!-- <a class="twitter-timeline" href="https://twitter.com/TwitterDev/timelines/539487832448843776?ref_src=twsrc%5Etfw">
        </a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
        <!--/share-on-twitter-->


            
        <!--others-->
        <!-- <a href="#">
            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
        </a>
        <a href="#">
            <i class="fa fa-google-plus-square" aria-hidden="true"></i>
        </a> -->
        <!--/others-->
    </p>
</div>
