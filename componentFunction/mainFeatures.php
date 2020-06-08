<!--main_features-->

<div class="main_features">
    <div class="listing_detail_head row">
        <div class="col-md-12">
            <h2>
                Name = <?php echo htmlentities($name); ?>
            </h2>
        </div>
    </div>
    
    <ul>
        <li>
        <i class="fa fa-calendar" aria-hidden="true"></i>
        
        <h5><?php echo htmlentities($result->usedYear); ?></h5>
        <p>Used Years</p>
        </li>
        <!-- <li>
        <i class="fa fa-cogs" aria-hidden="true"></i>
        <h5><?php echo htmlentities($result->FuelType); ?></h5>
        <p>Fuel Type</p>
        </li>
        <li>
        <i class="fa fa-user-plus" aria-hidden="true"></i>
        <h5><?php echo htmlentities($result->SeatingCapacity); ?></h5>
        <p>Seats</p>
        </li> -->
    </ul>
</div>

<div class="main_features">
    <br><br><br>
    <b>Overview :</b>
    <p>
        <?php echo htmlentities($result->overview); ?>
    </p>
</div>
<!--/main_features-->