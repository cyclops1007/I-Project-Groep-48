<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 23-5-2018
 * Time: 13:52
 */
include 'Template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery-3.3.1.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <script defer src="/js/fontawesome-all.js"></script>
<script>
function favorite(){
    var element = document.getElementById("myDIV");
    element.classList.add("fas fa-star");
}
</script>
</head>
<body>
<div class="myDIV">
    <button type="button" class="btn btn-outline-warning" onclick="favorite()">
        Favorite
        <i class="far fa-star" onclick="favorite()"></i>
    </button>
</div>
</body>
</html>
