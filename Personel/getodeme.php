<!DOCTYPE html>
<html>
<head>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
        padding: 5px;
    }

    th {text-align: left;}

</style>
</head>
<body>
    <div>
        <div class="col-md-9">
            <?php
            $q = intval($_GET['id']);

            $con = mysqli_connect('localhost','root','123456','albatros');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }

            mysqli_select_db($con,"ajax_demo");
            $sql="SELECT * FROM odeme_bilgileri WHERE id_aylar = '".$q."'";
            // $sql="UPDATE odeme_bilgileri SET ödeme = '0' WHERE ödeme = '1'";

            $result = mysqli_query($con,$sql);

            echo "<table>
            <thead>
            <tr>
            <th>Ay</th>
            <th>Ödeme Bilgisi</th>
            </tr>
            </thead>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['aylar'] . "</td>";
                echo "<td>";
                if($row['ödeme'] == 0) {
                    echo "<select name='deneme' id='demo' onchange='functionSelect(this.value)'>";
                    echo "<option value='0' selected='selected'>Ödenmedi</option>";
                    echo "<option value='1'>Ödendi</option>";
                    echo "</select>";
                }
                else{
                    echo "<select name='deneme' id='demo' onchange='functionSelect(this.value)'>";
                    echo "<option value='1' selected='selected'>Ödendi</option>";
                    echo "<option value='0'>Ödenmedi</option>";
                    echo "</select>";
                }       
                echo "</td>";

                echo "</tr>";
            }
            echo "</table>";


            mysqli_close($con);
            ?></div>

            <div class="col-md-3">
             <br>
             <button id="degistir" class="btn btn-primary" onclick="saveData()">&nbsp;&nbsp;Değiştir&nbsp;&nbsp;</button>
         </div>


     </div>

 </body>
 </html>

 <script>

    function functionSelect(str) {

        var x = document.getElementById("demo").value;

        if (x==0) {
          alert(" Ödenmedi olarak değiştirmek istediğinize emin misiniz?");  
        } else{
        alert("Ödendi olarak değiştirmek istediğinize emin misiniz?");
        }  

    }

    function saveData(){
        button = document.getElementById("degistir");

        button.onclick = function(){

            var odemeBilgisi =$(str,this).html();
            var ay;

            $.ajax({
                type: "POST",
                url: "change_odemeBilgisi.php",
                data: { 'oBilgisi': odemeBilgisi},

                success:function( msg ) {
                 alert( "Ödeme bilgisi değiştirildi." + msg );
                }
            });

        }



    }

    saveData();



</script>


