   <?php
   require_once '../connectDB.php';

   $id = $_POST['id'];

   $result ="";

   $sql = "SELECT * FROM odeme_bilgileri where student_FK = '$id'";
   $retval = $conn->query($sql, PDO::FETCH_ASSOC);
   foreach ($retval as $row) {
    $result .= "<tr>";
    $result .= "<td>".$row['id_aylar']."</td>";
    $result .= "<td>".$row['aylar']."</td>";
    $result.= "<p id='display' >";
    if($row['ödeme'] == 0) {
        $result .= "<td id='odemeB bgcolor = 'red'>Ödenmedi</p></td>";
    }
    else{
        $result .= "<td id='odemeB' bgcolor='#00f800'><p id='display'>Ödendi</td>";
    }
    $result .= "</p><td>";

    if($row['ödeme'] == 0) {
        $result .= "<select status-id=".$id_aylar." class='selectstatus' id='selectstatus'>";

        $result .= "<option value='0'>Ödenmedi</option>";
        $result .= "<option value='1'>Ödendi</option>";
        $result .= "</select>";
    }else{
        $result .= "<select status-id=".$id_aylar." class='selectstatus' id='selectstatus'>";
        $result .= "<option value='1'>Ödendi</option>";
        $result .= "<option value='0'>Ödenmedi</option>";
        $result .= "</select>";
    }
    $result .= "</td></tr>";
}
echo $result;




class processing{
    private $link;

    function __construct(){
        $this->link= new mysqli('localhost','root','12345678','albatros');
        if(mysqli_connect_errno()){
            die ("connection failed".mysqli_connect_errno());
        }
    }

    function display(){
        $sql = $this->link->stmt_init();
        $id_aylar=1;
        global $id;
        if($sql->prepare("SELECT id_aylar,aylar,ödeme FROM odeme_bilgileri")){
            $sql->bind_result($id_aylar,$aylar,$ödeme);
            if($sql->execute()){
                while($sql->fetch()){   
                    ?>
                    <tr>
                        <td><?php echo $id_aylar;?></td>
                        <td><?php echo $aylar;?></td>
                        <p id="display">
                            <?php if($ödeme == 0) {
                                echo "<td id='odemeB' bgcolor='red'>Ödenmedi</td>";
                            } else{
                                echo "<td id='odemeB' bgcolor='#00f800'>Ödendi</td>";
                            }?>

                        </p>
                        <td>

                            <?php if($ödeme == 0) { ?>
                            <select status-id="<?php echo $id_aylar;?>" class="selectstatus" id="selectstatus">
                                <option value="0">Ödenmedi</option>
                                <option value="1">Ödendi</option>    
                            </select>
                            <?php } else {?>
                            <select status-id="<?php echo $id_aylar;?>" class="selectstatus" id="selectstatus">
                                <option value="1">Ödendi</option>
                                <option value="0">Ödenmedi</option>    
                            </select>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php   
                }
            }
        }
    }

    function getdata($statusid,$id_aylar){
        $sql = $this->link->stmt_init();
        if($sql->prepare("UPDATE odeme_bilgileri SET ödeme=? WHERE id_aylar=?")){
            $sql->bind_param('si',$statusid,$id_aylar);
            if($sql->execute()){
                if($statusid == 1)
                    echo "".$id_aylar.". Ay Ödendi olarak değiştirilmiştir.";
                else
                    echo "".$id_aylar.". Ay Ödenmedi olarak değiştirilmiştir.";
            }
            else
            {
                echo "Update Failed";
            }
        }
    }
}
?>