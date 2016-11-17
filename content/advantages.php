<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * 核心优势 advantages
 */ 
if(cs_get_option('company_advantage')){ 
?>
<!-- OUR ADVANTAGES -->

<section id="agent-advantages">
  <div class="pv-xl">
    <div class="container-fluid">
      <h3 class="text-center text-uppercase">Our advantages</h3>
      <?php if(cs_get_manager_option('maintenance_logo')){
        	echo '<p class="text-center mb-lg">'.strip_tags(cs_get_option('company_adwords')).'</p>';
        }?>
      <div class="row">
        <?php foreach (cs_get_option('company_advantage') as $key=>$val) {
			echo '<div class="item-advantage scalebg col-xs-6 col-md-3 text-center">
                <a href="'.$val['advantage_url'].'" class="color-black"><span class="faicon icon-lg rounded bg-orange-900"><i class="'.$val['advantage_icon'].' fa-2x"></i></span></a>
                <div class="mt-md">
                <h3 class="title"><a href="'.$val['advantage_url'].'" class="color-black" title="'.$val['advantage_title'].'">'.$val['advantage_title'].'</a></h3>
            	<p>'.$val['advantage_description'].'</p>
                </div>
            </div>';
			
		}?>
      </div>
    </div>
  </div>
</section>
<!-- /OUR ADVANTAGES -->
<?php } else{
?>
<section id="agent-advantages">
  <div class="pv-xl">
    <div class="container-fluid">
      <h3 class="text-center text-uppercase">Our advantages</h3>
      <p class="text-center mb-lg">Manufacturer with the widest range of Laser Printer & Copier consumables in China</p>
      <div class="row">
        <div class="item-advantage colorbox scaleiconbox col-xs-6 col-md-3 text-center"> <a href="advantages.html" class="color-black"><span class="icon-lg b b-xxs rounded"><i class="fa fa-trophy fa-2x"></i></span></a>
          <div class="mt-md">
            <h3 class="title"><a href="advantages.html" class="color-black">More Than 10 years OEM Service</a></h3>
            <p>Dedicated to providing our worldwide business partners an one-stop solution for their printing businesses for more than 10 years. </p>
          </div>
        </div>
        <div class="item-advantage colorbox scaleiconbox col-xs-6 col-md-3 text-center"> <a href="advantages.html" class="color-black"><span class="icon-lg b b-xxs rounded"><i class="fa fa-suitcase fa-2x"></i></span></a>
          <div class="mt-md">
            <h3 class="title"><a href="advantages.html" class="color-black">Office supplies expert</a></h3>
            <p>Released more than 16 brands 2000 models. ASTA beating more than 99.5% competitors of printing and copier consumables suppliers. </p>
          </div>
        </div>
        <div class="item-advantage colorbox scaleiconbox col-xs-6 col-md-3 text-center"> <a href="advantages.html" class="color-black"><span class="icon-lg b b-xxs rounded"><i class="fa fa-users fa-2x"></i></span></a>
          <div class="mt-md">
            <h3 class="title"><a href="advantages.html" class="color-black">Professional R & D Team</a></h3>
            <p>Strong research and develop department.more than 45 R&D team members. </p>
          </div>
        </div>
        <div class="item-advantage colorbox scaleiconbox col-xs-6 col-md-3 text-center"> <a href="advantages.html" class="color-black"><span class="icon-lg b b-xxs rounded"><i class="fa fa-cogs fa-2x"></i></span></a>
          <div class="mt-md">
            <h3 class="title"><a href="advantages.html" class="color-black">High quality and stable supply chain</a></h3>
            <p>With the close cooperation with world-class supplier, effectively guarantee our supply chain. </p>
          </div>
        </div>
        <div class="item-advantage colorbox scaleiconbox col-xs-6 col-md-3 text-center"> <a href="advantages.html" class="color-black"><span class="icon-lg b b-xxs rounded"><i class="fa fa-globe fa-2x"></i></span></a>
          <div class="mt-md">
            <h3 class="title"><a href="advantages.html" class="color-black">Strong R & D capability</a></h3>
            <p>Invest 5% of our sales amount to upgrade all kinds of equipment every year.Release more than 300 new models every year. </p>
          </div>
        </div>
        <div class="item-advantage colorbox scaleiconbox col-xs-6 col-md-3 text-center"> <a href="advantages.html" class="color-black"><span class="icon-lg b b-xxs rounded"><i class="fa fa-print fa-2x"></i></span></a>
          <div class="mt-md">
            <h3 class="title"><a href="advantages.html" class="color-black">Test Equipments</a></h3>
            <p>Update more than 500 printers, copiers & other test equipments every year. </p>
          </div>
        </div>
        <div class="item-advantage colorbox scaleiconbox col-xs-6 col-md-3 text-center"> <a href="advantages.html" class="color-black"><span class="icon-lg b b-xxs rounded"><i class="fa fa-thumbs-o-up fa-2x"></i></span></a>
          <div class="mt-md">
            <h3 class="title"><a href="advantages.html" class="color-black">Commitment to the quality</a></h3>
            <p>Strict QC process ensures high quality cartridges with defectve rate less than 1%. </p>
          </div>
        </div>
        <div class="item-advantage colorbox scaleiconbox col-xs-6 col-md-3 text-center"> <a href="advantages.html" class="color-black"><span class="icon-lg b b-xxs rounded"><i class="fa fa-heart fa-2x"></i></span></a>
          <div class="mt-md">
            <h3 class="title"><a href="advantages.html" class="color-black">All-round customer service</a></h3>
            <p>keep customers informed about new market information and share new product information. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}?>
