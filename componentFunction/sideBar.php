 <!--Side-Bar-->
 <aside class="col-md-3">
        <!-- row 1( share ) -->
        <div class="share_vehicle">
          <p>
            Share:
            <a href="#">
              <i class="fa fa-facebook-square" aria-hidden="true"></i>
            </a>
            <a href="#">
              <i class="fa fa-twitter-square" aria-hidden="true"></i>
            </a>
            <a href="#">
              <i class="fa fa-linkedin-square" aria-hidden="true"></i>
            </a>
            <a href="#">
              <i class="fa fa-google-plus-square" aria-hidden="true"></i>
            </a>
          </p>
        </div>

        <!-- row 2 -->
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              Book Now
            </h5>
          </div>
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>

            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>

              <?php
if ($_SESSION['login']) {
    ?>

                <div class="form-group">
                  <input type="submit" class="btn"  name="submit" value="Book Now">
                </div>

              <?php
} else {
    ?>

                <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">
                  Login For Book
                </a>

              <?php
}
?>
          </form>
        </div>
      </aside>
      <!--/Side-Bar-->