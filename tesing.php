<!-- version 1 -->
<form name="form" action="" method="get">
    <input type="text" name="subject" id="subject" value="Car Loan">
</form>

<?php echo $_GET['subject']; ?>

<!-- version 2 -->
<form name="form" action="" method="post">
  <input type="text" name="subject" id="subject" value="Car Loan">
</form>
<?php echo $_POST['subject']; ?>

<!-- version 3 -->
<form name="form1" action="" method="post">
  <!-- <select name="numberOfDays" onchange="submit();"> -->
  <select name="numberOfDays">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
  </select>
</form>
<?php echo $_POST['numberOfDays']; ?>