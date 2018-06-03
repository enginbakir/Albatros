<div class="col-lg-16">
                  <div class="panel panel-default  toggle panelMove panelRefresh">
                    <div class="panel-body" id="toggle_deneme">
                      <div class="col-lg-16">
                        <!--OKUMA YAZMA starting -->
                        <div class="accordion collapse in" style="padding-bottom: 5px">
                          <button class="accordion_mt">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; OKUMA YAZMA</button>
                          <div class="panel_mt">  
                            <div class="accordion1Content">
                              <table class="table table-striped table-bordered table-hover" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;">
                                <tbody>
                                  <tr>
                                    <th>KAZANIMLAR</th>
                                    <th>EVET</th>
                                    <th>HAYIR</th>
                                    <th>ACIKLAMA</th>
                                  </tr>

                                  <?php
                                  
                                  $datam = mysqli_query($conn,"SELECT * FROM kazanımlar ORDER BY kazanım_name ASC");
                                  while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
                                  <tr>
                                    <td>
                                      <?php echo $write['kazanım_name']; ?>
                                    </td>
                                    <td>
                                      <?php echo $write['evet']; ?>
                                    </td> 
                                    <td>
                                      <?php echo $write['hayır']; ?>
                                    </td> 
                                    <td>
                                      <?php echo $write['acıklama']; ?>
                                    </td>  
                                  </tr>
                                  <?php } ?> 
                                </tbody>
                              </table>
                            </div>          
                          </div>
                        </div>
                        <!--OKUMA YAZMA ending -->

                        <!--ÖĞRENMEYE HAZIRLIK starting -->
                        <div class="accordion collapse in" style="padding-bottom: 5px">
                          <button class="accordion_mt">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; ÖĞRENMEYE HAZIRLIK</button>
                          <div class="panel_mt">  
                            <div class="accordion1Content">
                              <table class="table table-striped table-bordered table-hover" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;">
                                <tbody>
                                  <tr>
                                    <th>KAZANIMLAR</th>
                                    <th>EVET</th>
                                    <th>HAYIR</th>
                                    <th>ACIKLAMA</th>
                                  </tr>

                                  <?php
                                  $datam = mysqli_query($conn,"SELECT * FROM ogrenmeye_hazirlik ORDER BY kazanımlar_o ASC");
                                  while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
                                  <tr>
                                    <td>
                                      <?php echo $write['kazanımlar_o']; ?>
                                    </td>
                                    <td>
                                      <?php echo $write['evet_o']; ?>
                                    </td> 
                                    <td>
                                      <?php echo $write['hayir_o']; ?>
                                    </td> 
                                    <td>
                                      <?php echo $write['aciklama_o']; ?>
                                    </td>  
                                  </tr>
                                  <?php } ?> 
                                </tbody>
                              </table>
                            </div>          
                          </div>
                        </div>
                        <!--ÖĞRENMEYE HAZIRLIK ending -->

                        <!--MATEMATİK starting -->
                        <div class="accordion collapse in" style="padding-bottom: 5px">
                          <button class="accordion_mt">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; MATEMATİK</button>
                          <div class="panel_mt">  
                            <div class="accordion1Content">
                              <table class="table table-striped table-bordered table-hover" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;">
                                <tbody>
                                  <tr>
                                    <th>KAZANIMLAR</th>
                                    <th>EVET</th>
                                    <th>HAYIR</th>
                                    <th>ACIKLAMA</th>
                                  </tr>

                                  <?php
                                  $datam = mysqli_query($conn,"SELECT * FROM mathematics ORDER BY mathematic_id ASC");
                                  while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
                                  <tr>
                                    <td>
                                      <?php echo $write['mathematic']; ?>
                                    </td>
                                    <td>
                                      <?php echo $write['evet_m']; ?>
                                    </td> 
                                    <td>
                                      <?php echo $write['hayir_m']; ?>
                                    </td> 
                                    <td>
                                      <?php echo $write['aciklama_m']; ?>
                                    </td>  
                                  </tr>
                                  <?php } ?> 
                                </tbody>
                              </table>
                            </div>          
                          </div>
                        </div>
                        <!--MATEMATİK ending -->