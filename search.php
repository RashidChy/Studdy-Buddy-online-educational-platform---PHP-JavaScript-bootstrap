<!DOCTYPE html>
<html>

<head>

    <!-- Including jQuery is required. -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- Including our scripting file. -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    a:hover {
        cursor: pointer;
        background-color: yellow;
    }
    .form-control{
        width:300px;
        margin: 20px auto;
    }
    </style>
</head>

<body>
    
        <div class="MainBody">
    <!-- Search box. -->
    <input class="form-control" type="text" id="search" placeholder="Search" />
    <a href="admin.php">Back to Dashboard</a>
    <br>
    <br />
    <!-- Suggestions will be displayed in below div. -->
    <div id="display"></div>
    </div>
    </div>
</body>
</html>
<script>
    function fill(Value) {
    //Assigning value to "search" div in "search.php" file.
    $('#search').val(Value);
    //Hiding "display" div in "search.php" file.
    $('#display').hide();
}

$(document).ready(function() {
    //On pressing a key on "Search box" in "search.php" file. This function will be called.
    $("#search").keyup(function() {
        //Assigning search box value to javascript variable named as "name".
        var name = $('#search').val();
        //Validating, if "name" is empty.
        if (name == "") {
            //Assigning empty value to "display" div in "search.php" file.
            $("#display").html("");
        }
        //If name is not empty.
        else {
            //AJAX is called.
            $.ajax({
              //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "ajax.php",
                //Data, that will be sent to "ajax.php".
                data: {
                    //Assigning value of "name" into "search" variable.
                    search: name
                },
                //If result found, this funtion will be called.
                success: function(html) {
                    //Assigning result to "display" div in "search.php" file.
                    $("#display").html(html).show();
                }
            });
        }
    });
});
</script>
