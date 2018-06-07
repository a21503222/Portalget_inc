<?php include_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/db.php"); ?>
<?php include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/logged_user.php"); ?>

<?php
$mode_chat=$_GET['mode'];
$part_chat=$_GET['ps'];
$id=$_GET['id'];
$ative=$_GET['ative'];
$limt_name_lngth = 23;
?>
<!-- CHAT WINDOWS -->
									<!-- CHAT WINDOWS -->
									
									
            <!-- MY CHAT1 -->

            <?php if($mode_chat == 'x' && $part_chat == '0'){ ?>
            <div class="clearfix grpelem" id="u28405" style="background-color:rgba(225, 225, 255, 0.95);" >
             <div class="rounded-corners clearfix grpelem" id="u28406" style="border-color:#9fbfd5;" >
              <div class="position_content" id="u28406_position_content" >
               <div onClick="click_warp_chat(0,0);" class="rounded-corners clearfix colelem" id="u28407" <?php if($ative==0){ echo"style='background-color:#9fbfd5;'"; } ?> > <!-- BAR COLORs -->
                    <div class="rounded-corners grpelem" id="u28408"  style="background-color:<?php echo status(userData($conexao,$id, 'status')); ?>;"  ></div> <!--- STATUS COLORs --->
                    <div class="clearfix grpelem" id="u28409-4" style="cursor:context-menu;" >
                     <p><?php echo AutoShrtName(userData($conexao,$id,'name'),$limt_name_lngth); ?></p>
                    </div>
                    <div class="museBGSize grpelem" id="u28421" ></div>
                    <div class="museBGSize grpelem" id="u28423" ></div>
                    <div class="museBGSize grpelem" id="u28424" ></div>
               </div>
               <div class="clearfix colelem warp_chat_visual" id="" >
                    <div style="height:5px;" ></div>


<!-- ******************** -->	<div id="_chat_warp_w0" ></div> <!-- *********************** -->


               </div>
               <div class="clearfix colelem" id="u28410" style="<?php if($ative==0){echo"background-color:#9fbfd5;";} ?>" >
                    <div class="museBGSize grpelem" id="u28425" ></div>
               </div>
               <div class="clearfix colelem" id="u28422" style="background-color:#6f8f86;" >
                    <div class="museBGSize grpelem" id="u28426" ></div>
               </div>
              </div>
             </div>
            </div>

             <div class="PamphletWidget clearfix grpelem" id="pamphletu28511" >
             <div class="popup_anchor" id="u28512popup" >
              <div class="ContainerGroup clearfix" id="u28512" >
               <div class="Container invi clearfix grpelem" id="u28513" >
                    <div class="clearfix grpelem" id="u28514-4" >
                     <p>Fechar</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28519" >
              <div class="popup_anchor" id="u28520popup" >
               <div class="Thumb popup_element" id="u28520" onClick="LET_chat('<?php echo $id; ?>',0);" ></div>
              </div>
             </div>
            </div>
            <?php if(0==1){ ?>
            <div class="grpelem" id="u28523" ></div>
            <div class="clearfix grpelem" id="u28524-5" >
             <p><span id="u28524" ><?php echo 'O '.explode(' ',userData($conexao, $F_unk_id, 'name'))[0]; ?> </span>est� escrevendo...</p>
            </div>
            <?php } ?>
            <div class="grpelem" id="u28525" ><!-- custom html -->
             <textarea xlength="3000" class="wrapped-input warp_chat_textbox" id="widgetu899_input" name="custom_U899" tabindex="1" <?php if($ative==0){echo "style='background-color:#f1f1f1;'";} ?> ></textarea>
            </div>

             <div class="PamphletWidget clearfix grpelem" id="pamphletu28430" >
             <div class="popup_anchor" id="u28433popup" >
              <div class="ContainerGroup clearfix" id="u28433" >
               <div class="Container invi clearfix grpelem" id="u28434" >
                    <div class="clearfix grpelem" id="u28435-4" >
                     <p>Adicionar mais pessoas</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28431" >
              <div class="popup_anchor" id="u28432popup" >
               <div class="Thumb popup_element" id="u28432" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28442" >
             <div class="popup_anchor" id="u28447popup" >
              <div class="ContainerGroup clearfix" id="u28447" >
               <div class="Container invi clearfix grpelem" id="u28448" >
                    <div class="clearfix grpelem" id="u28449-4" >
                     <p>Definições</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28443" >
              <div class="popup_anchor" id="u28444popup" >
               <div class="Thumb popup_element" id="u28444" ></div>
              </div>
             </div>
            </div>
             <div class="ThumbGroup clearfix grpelem" id="u28496" >
              <div class="popup_anchor" id="u28497popup" >
               <div class="Thumb popup_element" id="u28497" ></div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28487" >
              <div class="popup_anchor" id="u28488popup" >
               <div class="Thumb popup_element" id="u28488" ></div>
              </div>
             </div>
            <?php }else if($mode_chat == 'o' && $part_chat == '0'){ ?>
            <!--- CLOSED CHAT --->
            <div class="clearfix grpelem" id="u28526" style="background-color:transparent;position:relative;" >
             <div class="rounded-corners clearfix grpelem" id="u28527" >
              <div onClick="click_warp_chat(0,1);" class="rounded-corners clearfix grpelem warp_s3243" id="u28528" <?php if($ative==1){ echo"style='background-color:rgba(80,138,178,0.8);'"; } ?> >
               <div class="rounded-corners grpelem" id="u28529" style="background-color:<?php echo status(userData($conexao,$id, 'status')); ?>;" ></div>
               <div class="clearfix grpelem" id="pu28530-4"  >
                    <div class="clearfix grpelem" id="u28530-4" style="cursor:context-menu;<?php if($ative==1){ echo"color:#fff;"; } ?>" >
                     <p><?php echo AutoShrtName(userData($conexao,$id,'name'),$limt_name_lngth); ?></p>
                    </div>
                    <?php if(_chat_info_id($conexao,$id,'read')!=0){ ?>
                            <div class="rounded-corners grpelem" id="u28756" ></div>
                            <div class="clearfix grpelem" id="u28757-4" >
                             <p><span id="u28757" ><?php echo _chat_info_id($conexao,$id,'read'); ?></span></p>
                            </div>
                    <?php } ?>
               </div>
               <div class="museBGSize grpelem" id="u28531" onClick="LET_chat('<?php echo $id; ?>',0);" style="z-index:85;" ></div>
              </div>
             </div>
            </div>
            <!--- CLOSED CHAT --->
            <?php } ?>

            <!-- MY CHAT1 -->


            <!-- MY CHAT2 -->


            <?php if($mode_chat == 'x' && $part_chat == '1'){ ?>
            <div class="clearfix grpelem" id="u28532" <?php if($ative==0){echo "style='background-color:rgba(225, 225, 255, 0.95);'";} ?> >
             <div class="rounded-corners clearfix grpelem" id="u28533" style="<?php if($ative==0){echo"border-color:#9fbfd5;";} ?>" >
              <div class="position_content" id="u28533_position_content" >
               <div onClick="click_warp_chat(1,0);" class="rounded-corners clearfix colelem" id="u28534" <?php if($ative==0){ echo"style='background-color:#9fbfd5;'"; } ?> >
                    <div class="rounded-corners grpelem" id="u28535"  style="background-color:<?php echo status(userData($conexao,$id, 'status')); ?>;"  ></div> <!--- STATUS COLORs --->
                    <div class="clearfix grpelem" id="u28536-4" style="cursor:context-menu;" >
                        <p><?php echo AutoShrtName(userData($conexao,$id,'name'),$limt_name_lngth); ?></p>
                    </div>
                    <div class="museBGSize grpelem" id="u28546" ></div>
                    <div class="museBGSize grpelem" id="u28548" ></div>
                    <div class="museBGSize grpelem" id="u28549" ></div>
               </div>
               <div class="clearfix colelem warp_chat_visual" id="" >
               <div style="height:5px;" ></div>


            <!-- ******************** -->	<div id="_chat_warp_w1" ></div> <!-- *********************** -->



               </div>
               <div class="clearfix colelem" id="u28537" style="<?php if($ative==0){echo"background-color:#9fbfd5;";} ?>" >
                    <div class="museBGSize grpelem" id="u28550" ></div>
               </div>
               <div class="clearfix colelem" id="u28547" style="background-color:#6f8f86;" >
                    <div class="museBGSize grpelem" id="u28551" ></div>
               </div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28553" >
             <div class="popup_anchor" id="u28554popup" >
              <div class="ContainerGroup clearfix" id="u28554" >
               <div class="Container invi clearfix grpelem" id="u28555" >
                    <div class="clearfix grpelem" id="u28556-4" >
                     <p>Adicionar mais pessoas</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28559" >
              <div class="popup_anchor" id="u28560popup" >
               <div class="Thumb popup_element" id="u28560" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28565" >
             <div class="popup_anchor" id="u28570popup" >
              <div class="ContainerGroup clearfix" id="u28570" >
               <div class="Container invi clearfix grpelem" id="u28571" >
                    <div class="clearfix grpelem" id="u28572-4" >
                     <p>Defini��es</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28568" >
              <div class="popup_anchor" id="u28569popup" >
               <div class="Thumb popup_element" id="u28569" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28601" >
             <!--
             <div class="popup_anchor" id="u28610popup" >
              <div class="ContainerGroup clearfix" id="u28610" >
               <div class="Container invi grpelem" id="u28611" style="background-color:red;"  ></div>
              </div>
             </div>
             -->
             <div class="ThumbGroup clearfix grpelem" id="u28602" >
              <div class="popup_anchor" id="u28603popup" >
               <div class="Thumb popup_element" id="u28603" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28612" >
            <!--
             <div class="popup_anchor" id="u28617popup" >
              <div class="ContainerGroup clearfix" id="u28617" >
               <div class="Container invi grpelem" id="u28618" ></div>
              </div>
             </div>
             -->
             <div class="ThumbGroup clearfix grpelem" id="u28619" >
              <div class="popup_anchor" id="u28620popup" >
               <div class="Thumb popup_element" id="u28620" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28623" >
             <div class="popup_anchor" id="u28624popup" >
              <div class="ContainerGroup clearfix" id="u28624" >
               <div class="Container invi clearfix grpelem" id="u28625" >
                    <div class="clearfix grpelem" id="u28626-4" >
                     <p>Fechar</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28631" >
              <div class="popup_anchor" id="u28632popup" >
               <div class="Thumb popup_element" id="u28632" onClick="LET_chat('<?php echo $id; ?>',1);" ></div>
              </div>
             </div>
            </div>
            <?php if(0==1){ ?>
            <div class="grpelem" id="u28635" ></div>
            <div class="clearfix grpelem" id="u28636-5" >
             <p><span id="u28636" >O UtilizadorA </span>est� escrevendo...</p>
            </div>
            <?php } ?>
            <div class="grpelem" id="u28637" ><!-- custom html -->
             <textarea xlength="3000" class="wrapped-input warp_chat_textbox" id="widgetu899_input" name="custom_U899" tabindex="1" <?php if($ative==0){echo "style='background-color:#f1f1f1;'";} ?> ></textarea>
            </div>
            <?php }else if($mode_chat == 'o' && $part_chat == '1'){ ?>
            <!--- CLOSED CHAT --->

            <div class="clearfix grpelem" id="u28638" style="background-color:transparent;position:relative;" >
             <div class="rounded-corners clearfix grpelem" id="u28639" >
              <div onClick="click_warp_chat(1,1);" class="rounded-corners clearfix grpelem warp_s3243" id="u28640" <?php if($ative==1){ echo"style='background-color:rgba(80,138,178,0.8);'"; } ?> >
               <div class="rounded-corners grpelem" id="u28641" style="background-color:<?php echo status(userData($conexao,$id, 'status')); ?>;" ></div>
               <div class="clearfix grpelem" id="pu28642-4" >
                    <div class="clearfix grpelem" id="u28530-4"  style="cursor:context-menu;<?php if($ative==1){ echo"color:#fff;"; } ?>" >
                     <p><?php echo AutoShrtName(userData($conexao,$id,'name'),$limt_name_lngth); ?></p>
                    </div>
                    <?php if(_chat_info_id($conexao,$id,'read')!=0){ ?>
                    <div class="rounded-corners grpelem" id="u28758" ></div>
                    <div class="clearfix grpelem" id="u28759-4" >
                     <p><span id="u28759" ><?php echo _chat_info_id($conexao,$id,'read'); ?></span></p>
                    </div>
                    <?php } ?>
               </div>
               <div class="museBGSize grpelem" id="u28643" onClick="LET_chat('<?php echo $id; ?>',1);" ></div>
              </div>
             </div>
            </div>

            <!--- CLOSED CHAT --->
            <?php } ?>
            <!-- MY CHAT2 -->







            <?php if($mode_chat == 'x' && $part_chat == '2'){ ?>

            <div class="clearfix grpelem" id="u28644" <?php if($ative==0){echo "style='background-color:rgba(225, 225, 255, 0.95);'";} ?> >
             <div class="rounded-corners clearfix grpelem" id="u28645" style="<?php if($ative==0){echo"border-color:#9fbfd5;";} ?>" >
              <div class="position_content" id="u28645_position_content" >
               <div onClick="click_warp_chat(2,0);" class="rounded-corners clearfix colelem" id="u28646" <?php if($ative==0){ echo"style='background-color:#9fbfd5;'"; } ?> >
                    <div class="rounded-corners grpelem" id="u28647" style="background-color:<?php echo status(userData($conexao,$id, 'status')); ?>;" ></div> <!--- STATUS COLORs --->
                    <div class="clearfix grpelem" id="u28648-4" style="cursor:context-menu;" >
                     <p><?php echo AutoShrtName(userData($conexao,$id,'name'),$limt_name_lngth); ?></p>
                    </div>
                    <div class="museBGSize grpelem" id="u28658" ></div>
                    <div class="museBGSize grpelem" id="u28660" ></div>
                    <div class="museBGSize grpelem" id="u28661" ></div>
               </div>
               <div class="clearfix colelem warp_chat_visual" id="" >
               <div style="height:5px;" ></div>



            <!-- ******************** -->	<div id="_chat_warp_w2" ></div> <!-- *********************** -->



               </div>
               <div class="clearfix colelem" id="u28649" style="<?php if($ative==0){echo"background-color:#9fbfd5;";} ?>" >
                    <div class="museBGSize grpelem" id="u28662" ></div>
               </div>
               <div class="clearfix colelem" id="u28659" style="background-color:#6f8f86;" >
                    <div class="museBGSize grpelem" id="u28663" ></div>
               </div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28665" >
             <div class="popup_anchor" id="u28670popup" >
              <div class="ContainerGroup clearfix" id="u28670" >
               <div class="Container invi clearfix grpelem" id="u28671" >
                    <div class="clearfix grpelem" id="u28672-4" >
                     <p>Adicionar mais pessoas</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28668" >
              <div class="popup_anchor" id="u28669popup" >
               <div class="Thumb popup_element" id="u28669" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28677" >
             <div class="popup_anchor" id="u28684popup" >
              <div class="ContainerGroup clearfix" id="u28684" >
               <div class="Container invi clearfix grpelem" id="u28685" >
                    <div class="clearfix grpelem" id="u28686-4" >
                     <p>Defini��es</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28687" >
              <div class="popup_anchor" id="u28688popup" >
               <div class="Thumb popup_element" id="u28688" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28713" >
             <!--
             <div class="popup_anchor" id="u28716popup" >
              <div class="ContainerGroup clearfix" id="u28716" >
               <div class="Container invi grpelem" id="u28717" style="background-color:red;" ></div>
              </div>
             </div>
             -->
             <div class="ThumbGroup clearfix grpelem" id="u28722" >
              <div class="popup_anchor" id="u28723popup" >
               <div class="Thumb popup_element" id="u28723" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28724" >
             <!--
             <div class="popup_anchor" id="u28729popup" >
              <div class="ContainerGroup clearfix" id="u28729" >
               <div class="Container invi grpelem" id="u28730" ></div>
              </div>
             </div>
             -->
             <div class="ThumbGroup clearfix grpelem" id="u28731" >
              <div class="popup_anchor" id="u28732popup" >
               <div class="Thumb popup_element" id="u28732" ></div>
              </div>
             </div>
            </div>
            <div class="PamphletWidget clearfix grpelem" id="pamphletu28735" >
             <div class="popup_anchor" id="u28738popup" >
              <div class="ContainerGroup clearfix" id="u28738" >
               <div class="Container invi clearfix grpelem" id="u28739" >
                    <div class="clearfix grpelem" id="u28740-4" >
                     <p>Fechar</p>
                    </div>
               </div>
              </div>
             </div>
             <div class="ThumbGroup clearfix grpelem" id="u28745" >
              <div class="popup_anchor" id="u28746popup" >
               <div class="Thumb popup_element" id="u28746" onClick="LET_chat('<?php echo $id; ?>',2);" ></div>
              </div>
             </div>
            </div>
            <?php if(0==1){ ?>
            <div class="grpelem" id="u28747" ></div>
            <div class="clearfix grpelem" id="u28748-5" >
             <p><span id="u28748" >O UtilizadorA</span>est� escrevendo...</p>
            </div>
            <?php } ?>
            <div class="grpelem" id="u28749" ><!-- custom html -->
             <textarea xlength="3000" class="wrapped-input warp_chat_textbox" id="widgetu899_input" name="custom_U899" tabindex="1" <?php if($ative==0){echo "style='background-color:#f1f1f1;'";} ?> ></textarea>
            </div>

            <?php }else if($mode_chat == 'o' && $part_chat == '2'){ ?>
            <!--- CLOSED CHAT --->
            <div class="clearfix grpelem" id="u28750" style="background-color:transparent;position:relative;" >
             <div class="rounded-corners clearfix grpelem" id="u28751" >
              <div onClick="click_warp_chat(2,1);" class="rounded-corners clearfix grpelem warp_s3243" id="u28752" <?php if($ative==1){ echo"style='background-color:rgba(80,138,178,0.8);'"; } ?> > <!-- &&&&&&&&& -->
               <div class="rounded-corners grpelem" id="u28753" style="background-color:<?php echo status(userData($conexao,$id, 'status')); ?>;" ></div>
               <div class="clearfix grpelem" id="pu28754-4" >
                    <div class="clearfix grpelem" id="u28754-4" style="cursor:context-menu;<?php if($ative==1){ echo"color:#fff;"; } ?>" >
                     <p><?php echo AutoShrtName(userData($conexao,$id,'name'),$limt_name_lngth); ?></p>
                    </div>
                    <?php if(_chat_info_id($conexao,$id,'read')!=0){ ?>
                            <div class="rounded-corners grpelem" id="u28760" ></div>
                            <div class="clearfix grpelem" id="u28761-4" >
                             <p><span id="u28761" ><?php echo _chat_info_id($conexao,$id,'read'); ?></span></p>
                            </div>
                    <?php } ?>
               </div>
               <div class="museBGSize grpelem" id="u28755" onClick="LET_chat('<?php echo $id; ?>',2);" ></div>
              </div>
             </div>
            </div>
            <!--- CLOSED CHAT --->
            <?php } ?>
            <!-- MY CHAT3 -->
