var search_mode = "all";
var id="";
// var current_user = "";
$(document).ready(function() {
  var anchors = $("#verticalNav li a").click(function() {
    $(this).addClass("active");
    $(this).children().remove();
    $(this).prepend('<i class="fa fa-caret-left" aria-hidden="true"></i>');
    $(this).append('<hr style="color:white;border:solid;margin-top:1.5vh;">');
    anchors.not(this).removeClass("active");
    anchors.not(this).children().remove();
  })
});

function fetch_table_data(search_type, search_text = "") {
  search_mode = search_type;
  switch (search_type) {
    case "all":
      search_string = "SELECT * FROM campaigns";
      break;
    case "on_going":
      search_string = "SELECT * FROM campaigns WHERE status = 'On going'";
      break;
    case "draft":
      search_string = "SELECT * FROM campaigns WHERE status = 'Draft'";
      break;
    case "completed":
      search_string = "SELECT * FROM campaigns WHERE status = 'Completed'";
      break;
    case "unapproved":
      search_string = "SELECT * FROM campaigns WHERE status = 'Unapproved'";
      break;
    case "search":
      search_string = "SELECT * FROM campaigns WHERE id LIKE '%" + search_text +
        "%' OR e_name LIKE '%" + search_text + "%' OR type LIKE '%" + search_text +
        "%' OR status LIKE '%" + search_text + "%'";
      break;
    default:
      search_string = "Wrong Input";
  };
  if (search_string == "Wrong Input") {
    alert(search_string);
  } else {
    console.log(search_string);
    received_object = jQuery.ajax({
      type: "GET",
      url: 'fetchdb.php',
      dataType: 'json',
      data: {
        searchType: search_type,
        searchQuery: search_string,
      },
      cache: false,
      async: false
    });
    console.log(received_object);
    document.getElementById("tableRow").innerHTML = "";
    document.getElementById("tableRow").innerHTML = received_object.responseText;
  }
}

function update_approval(id) {
  var domm = document.getElementById(id);
  var checkStatus = domm.checked ? 'Approved' : 'Unapproved';
  var st = domm.checked ? '1' : '0';
  var returned = jQuery.ajax({
    type: "POST",
    url: 'updatedb.php',
    dataType: 'json',
    data: {
      functionname: 'update_campaign_status',
      arguments: [id, checkStatus, st, current_user]
    },
    success: function(obj, textstatus) {
      if (!('error' in obj)) {
        alert("Status updated to " + checkStatus);
        console.log(obj)
      } else {
        alert("Status update error.");
      }
    },
    cache: false,
    async: false
  });
  fetch_table_data(search_mode);
  // location.reload();
}

function handle_update(eventName, type) {
  validateForm();
  var domm = document.getElementById(id);
  var returned = jQuery.ajax({
    type: "POST",
    url: 'updatedb.php',
    dataType: 'json',
    data: {
      functionname: 'update_record',
      arguments: [id, eventName, type, current_user]
    },
    success: function(obj, textstatus) {
      if (!('error' in obj)) {
        alert("Entry updated!");
        console.log(obj)
      } else {
        alert("Update error.");
      }
    },
    cache: false,
    async: false
  });
}

function validateForm() {
  var x = document.forms["updaterForm"]["eventname"].value;
  var y = document.forms["updaterForm"]["type"].value;
  if (!x || !y) {
    alert("Blank fields detected!");
    return false;
  }
}

function set_id(id1){
  id=id1;
}

window.onload = (function() {
  fetch_table_data("all");
});
