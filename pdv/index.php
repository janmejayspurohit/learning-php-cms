<?php include "db.php";
include 'user_handler.php';?>
<html>
  <head>
    <title>PDV TEST</title>
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
       <?php if (isset($_SESSION['$username'])): ?>
         <?php
echo '<script>';
echo 'var current_user= '.json_encode($_SESSION['$username']).';';
echo '</script>';?>
    <div class="bs-example">
      <div id="dummyDiv" class="row dummyDiv">
      </div>
        <ul id="myTab" class="nav nav-tabs">
          <li class="nav-item ml-auto">
              <a href="#tab1" class="nav-link" data-toggle="tab">Trigger Event</a>
          </li>
          <li class="nav-item">
              <a href="#tab2" class="nav-link" data-toggle="tab">Email Template</a>
          </li>
          <li class="nav-item">
              <a href="#tab3" class="nav-link" data-toggle="tab">Prospect Set</a>
          </li>
          <li class="nav-item">
              <a href="#tab4" class="nav-link active" data-toggle="tab">Campaign</a>
          </li>
          <li class="nav-item">
              <a href="index.php?logout='1'" style="height: 100%; padding-top: 11px;" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade" id="tab1">
              <h4 class="mt-2">Trigger Event</h4>
          </div>
          <div class="tab-pane fade" id="tab2">
              <h4 class="mt-2">Email pdv tech</h4>
          </div>
          <div class="tab-pane fade" id="tab3">
              <h4 class="mt-2">Prospect Set</h4>
          </div>
          <div class="tab-pane fade show active" id="tab4">
            <div class="row">
            <h4 class="mt-2" style="padding: 2vw 0 2vw 13.5vw;">Campaign for Approval<br>Admin</h4>
            </div>
            <div class="row" style="height: 100%;">
                <div class="col-3" style="background-color: #182b49;">
                  <nav id="verticalNav">
                    <p>View Status</p>
                    <ul>
                      <li><a href="javascript:void(0)" onclick='fetch_table_data("all")' class="active line"><i class="fa fa-caret-left" aria-hidden="true"></i>All<hr style="color:white;border:solid;margin:1.5vh 0 0.5vh 0;"></a></li>
                      <li><a href="javascript:void(0)" onclick='fetch_table_data("on_going")'>On Going</a></li>
                      <li><a href="javascript:void(0)" onclick='fetch_table_data("draft")'>Draft</a></li>
                      <li><a href="javascript:void(0)" onclick='fetch_table_data("completed")'>Completed</a></li>
                      <li><a href="javascript:void(0)" onclick='fetch_table_data("unapproved")'>Unapproved</a></li>
                    </ul>
                  </nav>
                </div>
                <div class="col-8" style="background-color: #f2fcfe;">
                  <div class="row">
                    <input type="text" class="form-control" name="valueToSearch" id="searchBar" placeholder="Search Campaign by Name">
                    <span><button id="searchButton" onclick='fetch_table_data("search", document.getElementById("searchBar").value)' class="btn btn-dark">
                      <i class="fa fa-sliders" aria-hidden="true"></i></button></span>
                  </div>
                  <div id="tableRow" class="row">

                  </div>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit entry</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form name="updaterForm" onsubmit="return validateForm()" required>
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="username">Event Name</label>
                              <input id="eventName" type="text" class="form-control" name="eventname" placeholder="Event Name" required/>
                            </div>
                            <div class="form-group">
                              <label for="type">Type</label>
                              <input id="type" type="text" class="form-control" name="type" placeholder="Type" required/>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="save" onclick="handle_update(document.getElementById('eventName').value,
                          document.getElementById('type').value)" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-1" style="background-color: #f2fcfe;">
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php else:header("location: login.php");?>
      <?php endif ?>
     </body>
</html>
