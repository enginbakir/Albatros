   <?php
   require_once '../connectDB.php';
  // $id_student = $_POST['id'];
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

        //global $id_student; where student_FK = '$id_student'

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