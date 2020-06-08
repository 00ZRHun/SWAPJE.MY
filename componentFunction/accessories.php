<!--Accessories-->
<div role="tabpanel" class="tab-pane" id="accessories">
    <!--Accessories-->
    <table>
        <thead>
        <tr>
            <th colspan="2">Accessories</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>Air Conditioner</td>
            <?php
            if ($result->AirConditioner == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>AntiLock Braking System</td>
            <?php
            if ($result->AntiLockBrakingSystem == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Power Steering</td>
            <?php
            if ($result->PowerSteering == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Power Windows</td>
            <?php
            if ($result->PowerWindows == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>CD Player</td>
            <?php
            if ($result->CDPlayer == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Leather Seats</td>
            <?php
            if ($result->LeatherSeats == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Central Locking</td>
            <?php
            if ($result->CentralLocking == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Power Door Locks</td>
            <?php
            if ($result->PowerDoorLocks == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Brake Assist</td>
            <?php
            if ($result->BrakeAssist == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Driver Airbag</td>
            <?php
            if ($result->DriverAirbag == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Passenger Airbag</td>
            <?php
            if ($result->PassengerAirbag == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        <tr>
            <td>Crash Sensor</td>
            <?php
            if ($result->CrashSensor == 1) {
            ?>
            <td><i class="fa fa-check" aria-hidden="true"></i></td>
            <?php
            } else {
            ?>
            <td><i class="fa fa-close" aria-hidden="true"></i></td>
            <?php
            }
            ?>
        </tr>

        </tbody>
    </table>
</div>
<!--/Accessories-->