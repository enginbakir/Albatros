
    <?php 
        // Form Gönderilmişmi Kontrolü Yapalım
        if($_POST){
        
            // Formdan Gelen Kayıtlar
            $evet_d = $_POST["evet_d"];
            $hayir_d = $_POST["hayir_d"];
            $aciklama_d = $_POST["aciklama_d"];
            
            // Veritabanına Ekleyelim.
            $ekle = mysql_queryli($con,"INSERT INTO deneme (evet_d,hayir_d,aciklama_d) values ('$evet_d','$hayir_d',$aciklama_d)");
            
            
            // Sorun Oluştu mu diye test edelim. Eğer sorun yoksa hata vermeyecektir
            if($ekle){
                echo "Başarılı Bir Şekilde Eklendi !";
            }else{
                echo "Bir Sorun Oluştu";
            }
        }
    ?>