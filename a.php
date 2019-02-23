<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#goster{
    max-height:60%;
    overflow-y: auto;
    max-width: 100%;
    padding:0 10px;
}
</style>

</head>
<body>
<img src="icon.png" id="myBtn" class="resim">


<div class="modal" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="width:500px;color:darkcyan; text-align: center">Alıntı yap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $json_dosya = file_get_contents("veriler.json");
                $json_veri = json_decode($json_dosya,true);
                ?>
                <div class="satir" style="color:darkcyan;" >
                     &nbsp;&nbsp;Tip seçiniz :<select  id="combo_veri" onchange="veriyi_getir()">
                        <?php foreach ( $json_veri["alintilar"] as $key_json=>$json){
                            echo '<option value="'.$json["tip"].'">'.$json["tip"].'</option>';
                        } ?>
                    </select>
                </div>

                <div id="goster"></div>
                <script>
                    function veriyi_getir() {
                        $.ajax({
                            type:"post",
                            url:"b.php",
                            data:{
                                id:$("#combo_veri").val()
                            },
                            success:function (result) {
                                $("#goster").html(result);
                            },
                            error:function (e) {
                                console.log(e);
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<script>
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    veriyi_getir();
    $("#myModal").modal()
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
