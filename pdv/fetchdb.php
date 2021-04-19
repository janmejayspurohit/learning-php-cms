<?php
include"db.php";
$incoming = $_GET['searchQuery'];
if (isset($incoming))
{
  $run_sql = mysqli_query($conn, $incoming);
  while ($rows = mysqli_fetch_array($run_sql))
  {
    $current_status = "";
    $approved_color = "red";
    if ($rows['approved'] == 1)
    {
      $current_status = "checked";
      $approved_color = "green";
    }
    $timestamp = strtotime($rows['last_edited']);
    $last_edited = date("D, F dS h:iA", $timestamp);
    echo'
    <table id="myTable" class="table table-striped">
    <colgroup>
       <col span="1" style="width: 5%;">
       <col span="1" style="width: 50%;">
       <col span="1" style="width: 20%;">
       <col span="1" style="width: 15%;">
       <col span="1" style="width: 10%;">
    </colgroup>
    <thead>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    </thead>
    <tbody>
    <td><i class="fa fa-envelope" style="float:right;" aria-hidden="true"></i></td>
      <td>'.$rows['e_name'].'<br>'.$rows['type'].'<br>Edited '.$last_edited.' by '.$rows['edited_by'].'</td>
      <td style="color: '.$approved_color.';">'.$rows['status'].'</td>
      <td><label class="switch">
      <input id="'.$rows['id'].'" class="check_box" type="checkbox" onclick="update_approval('.$rows['id'].')"'.$current_status.'>
      <span class="slider round"></span></label>
      </td>
      <td>
      <button type="button" class="btn btn-sm btn-danger" onclick="set_id('.$rows['id'].')" data-toggle="modal" data-target="#exampleModal">
          Edit
      </button>
      </td>
      </tbody>
      </table>';
  }
}

else
{
  print_r("The request didn't pass correctly through the GET...");
}

?>
