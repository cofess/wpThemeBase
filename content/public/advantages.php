<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * 核心优势 advantages
 */ 
if(cs_get_option('company_advantage')){ 
?>
      <div class="row">
        <?php foreach (cs_get_option('company_advantage') as $key=>$val) { ?>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">
            <div class="pv-3x ph-2x">
              <i class="<?php echo $val['advantage_icon'];?> fa-3x"></i>
              <!--<h3 class="fs"><a href="<?php echo $val['advantage_url'];?>" class="text-nowrap-1x"><?php echo $val['advantage_title'];?></a></h3>-->
              <h3 class="fs text-nowrap-1x"><?php echo $val['advantage_title'];?></h3>
              <p class="text-nowrap-3x"><?php echo $val['advantage_description'];?></p>
            </div>
          </div>
        <?php }?>  
      </div>
<?php } else{ ?>
        <div class="row">
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">
            <div class="pv-3x ph-2x">
              <i class="fa fa-trophy fa-3x"></i>
              <h3 class="fs">More Than 10 years OEM Service</h3>
              <p class="text-nowrap-3x">Dedicated to providing our worldwide business partners an one-stop solution for their printing businesses for more than 10 years. </p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">             
            <div class="pv-3x ph-2x">
              <i class="fa fa-suitcase fa-3x"></i>
              <h3 class="fs">Office supplies expert</h3>
              <p class="text-nowrap-3x">Released more than 16 brands 2000 models. ASTA beating more than 99.5% competitors of printing and copier consumables suppliers. </p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">            
            <div class="pv-3x ph-2x">
              <i class="fa fa-users fa-3x"></i>
              <h3 class="fs">Professional R & D Team</h3>
              <p class="text-nowrap-3x">Strong research and develop department.more than 45 R&D team members. </p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center"> 
            <div class="pv-3x ph-2x">
              <i class="fa fa-cogs fa-3x"></i>
              <h3 class="fs">High quality and stable supply chain</h3>
              <p class="text-nowrap-3x">With the close cooperation with world-class supplier, effectively guarantee our supply chain. </p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center"> 
            <div class="pv-3x ph-2x">
              <i class="fa fa-globe fa-3x"></i>
              <h3 class="fs">Strong R & D capability</h3>
              <p class="text-nowrap-3x">Invest 5% of our sales amount to upgrade all kinds of equipment every year.Release more than 300 new models every year. </p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center"> 
            <div class="pv-3x ph-2x">
              <i class="fa fa-print fa-3x"></i>
              <h3 class="fs">Test Equipments</h3>
              <p class="text-nowrap-3x">Update more than 500 printers, copiers & other test equipments every year. </p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center">             
            <div class="pv-3x ph-2x">
              <i class="fa fa-thumbs-o-up fa-3x"></i>
              <h3 class="fs">Commitment to the quality</h3>
              <p class="text-nowrap-3x">Strict QC process ensures high quality cartridges with defectve rate less than 1%. </p>
            </div>
          </div>
          <div class="item-advantage col-xs-12 col-sm-6 col-md-6 col-lg-3 scalebox mheight-md text-center"> 
            <div class="pv-3x ph-2x">
              <i class="fa fa-heart fa-3x"></i>
              <h3 class="fs">All-round customer service</h3>
              <p class="text-nowrap-3x">keep customers informed about new market information and share new product information. </p>
            </div>
          </div>
        </div>
<?php }
