    <form role="search" method="get" class="form-inline pv-0x" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
      <input type="hidden" name="post_type" value="product">
      <div class="form-group">
        <label>Keyword</label>
        <input type="search" class="form-control r-no b-light" placeholder="Product Code" name="s">       
      </div>
      <div class="form-group">
        <label>Brand</label>
        <select class="form-control r-no b-light" name="product_cat">
          <option value="">Choose</option>
          <?php $catTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC')); ?>
            <?php foreach($catTerms as $catTerm) : ?>
              <option value="<?php echo $catTerm->slug; ?>"><?php echo $catTerm->name; ?></option>
            <?php endforeach; ?>   
        </select>
      </div>
      <!--<div class="form-group">
        <label>Type</label>
        <select class="form-control r-no b-light" name="product-type">
          <option value="">Choose</option>
          <option value ="toner">Toner</option>
          <option value ="drum">Drum</option>
          <option value="toner-cartridge">Toner Cartridge</option>
        </select>        
      </div>-->
      <button type="submit" class="btn btn-default bg-light b-no"><i class="fa fa-filter fa-fw"></i>Filter</button>
      <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Product Categories' ) ) ); ?>" class="btn btn-default bg-light b-no"><i class="fa fa-th-large fa-fw"></i>Product Categories</a>
    </form>