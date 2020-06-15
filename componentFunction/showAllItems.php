<div class="card" onclick="window.location.href = 'item-details.php?vhid=<?php echo htmlentities($result->id); ?>'">
                  <div class="card-image-padding">
                    <!-- <img src="img/itemImages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image"> -->
                    <?php $images = explode(', ', $result->images); ?>
                    <!-- <img src="img/adsImages/<?php echo htmlentities($images[1]);?>" class="img-responsive" alt="image"> -->

                    <img src="img/itemImages/<?php echo htmlentities($images[1]); ?>" class="img-responsive" alt="image">
                  </div>              
                  <div class="card-body">
                    <h5 class="card-title"><?php echo htmlentities($result->productName); ?></h5>
                    <div class="card-item-description">
                      <div style="display: flex; flex-flow: column">
                        <h6 class="card-description-label">Used Year:</h6>
                        <p class="card-description-text"><?php echo htmlentities($result->usedYear); ?> Year Used</p>
                      </div>                  
                      <div style="display: flex; flex-flow: column">
                        <h6 class="card-description-label">Overview:</h6>
                        <p class="card-description-text"><?php echo substr($result->overview, 0, 70); ?></p>
                      </div>
                    </div>                                          
                    </div>
                    <div class="card-footer">
                    <div>
                        <strong>Sell:</strong>
                        <strong>
                          <?php
                          if ($result->sell == 1) {
                          ?>
                            RM
                          <?php
                            echo htmlentities($result->totalPrice);
                          } else {
                          ?>
                            N/A
                          <?php
                          } ?>
                        </strong>
                      </div>
                      <div>
                        <strong>Rent:</strong>
                        <strong>
                          <?php
                          if ($result->rent == 1) {
                          ?>
                            RM
                          <?php
                            echo htmlentities($result->pricePerDay);
                          } else {
                          ?>
                            N/A
                          <?php
                          } ?>
                        </strong>
                      </div>
                      <div>
                        <strong>Swap:</strong>
                        <strong>
                          <?php
                          if ($result->swap == 1) {
                          ?>
                            RM
                          <?php
                            echo htmlentities($result->value);
                          } else {
                          ?>
                            N/A
                          <?php
                          } ?>
                        </strong>
                      </div>
                  </div>                            
                </div>