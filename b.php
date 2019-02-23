<?php
$json_dosya = file_get_contents("veriler.json");
$json_veri = json_decode($json_dosya,true);


foreach ( $json_veri["alintilar"] as $key_json=>$json){
    if($json["tip"] == $_POST["id"]){
        echo '
            <br>
            <div class="sonuc_veri">
                <b>Tip:<span class="sonuc_name">'. $json["tip"] .'</span><br><br></b>
                <textarea id="txtarea" onclick="SelectAll()" style="width: 100%;height:20%;border-color: transparent" class="sonuc_aciklama">'. $json["detay"] .'</textarea><br></div>
                <script type="text/javascript">
                    function SelectAll()
                    {
                    document.getElementById("txtarea").focus();
                    document.getElementById("txtarea").select();
                    }
                    </script>
                ';
        break;
    }
}

?>