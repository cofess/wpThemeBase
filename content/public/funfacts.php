<?php 
/**
 * 数据事实 funfacts
 */ 
if(cs_get_option('company_facts')){ 
?>        
      <div class="row pv-4x">
        <?php foreach (cs_get_option('company_facts') as $key=>$val) { ?> 
          <div class="col-xs-6 col-sm-4 col-md-2 text-center">
            <h3 class="fs-md"><span class="counter"><?php echo $val['facts_number']?></span><?php echo $val['facts_after']?></h3>
            <div class="colored-line bg-black mv-0x"></div>
            <p><?php echo $val['facts_description']?></p>
          </div>
        <?php }?>            
      </div>
<?php } else{ ?> 
      <div class="row mt-3x">
          <div class="col-xs-6 col-sm-4 col-md-2 text-center">
            <h3 class="counter fs-md">16</h3>
            <div class="colored-line bg-black mv-0x"></div>
            <p>Compatible Brands</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2 text-center">
            <h3 class="counter fs-md">2000</h3>
            <div class="colored-line bg-black mv-0x"></div>
            <p>Product Models</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2 text-center">
            <h3 class="counter fs-md">100</h3>
            <div class="colored-line bg-black mv-0x"></div>
            <p>Countries</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2 text-center">
            <h3 class="counter fs-md">200</h3>
            <div class="colored-line bg-black mv-0x"></div>
            <p>Million Total Users</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2 text-center">
            <h3 class="counter fs-md">21</h3>
            <div class="colored-line bg-black mv-0x"></div>
            <p>Total Agents</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2 text-center">
            <h3 class="counter fs-md">360</h3>
            <div class="colored-line bg-black mv-0x"></div>
            <p>Stable Clinets</p>
          </div>            
        </div>     
<?php }       