<!--================================
           START BANNER AREA
=================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<section class="trusted-area breadcrumb-area-beds text-center">
    <div class="trusted-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="trusted-content">
                        <div class="trusted__title">
                         
                            <h2 class="trusted__title-title">Beds & Bunks</h2>
                        </div><!-- end trusted__title -->
                    </div><!-- end trusted-content -->
                </div><!-- end col-md-12 -->
            </div><!-- end row -->
        </div><!-- container -->
    </div><!-- end trusted-fluid -->
</section><!-- end trusted-area -->
 <!--================================
          END BANNER AREA
=================================-->

<!--================================
          START THINK AREA
=================================-->


<?php 
$CI=&get_instance();
function generateThumbnail($img, $width, $height, $quality = 90){
	$imagick = new Imagick($img);
	$imagick->setImageFormat('jpeg');
	$imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
	$imagick->setImageCompressionQuality($quality);
	$imagick->thumbnailImage($width, $height, false, false);
	$filename_no_ext = reset(explode('.', $img));
	if (file_put_contents($filename_no_ext . '_thumbin2' . '.png', $imagick) === false) {}
	return true; 
	
}

function getThumbnail($prImage){
	$imagedivid2ch = explode('.',$prImage);
	$checknimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2ch[0].'_thumbin2.png';
	if(@getimagesize($checknimagethumb)){
		$nimage = $checknimagethumb;
	}else{
		$genthumb = generateThumbnail('/home1/southern/public_html/products/'.$prImage.'', 300,250,100);
		
		if($genthumb){
			$imagedivid2 = explode('.',$prImage);
			$nimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2[0].'_thumbin2.png';
			$nimage = $nimagethumb;
		}else{
			$nimage = '/products/'.$prImage;
		} 
	}
	return $nimage;
}
?>

<style>
    .filtersec {
        margin-bottom: 20px;
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    /* Add some space at the top */
    .container .row:first-of-type {
        margin-top: 20px;
        margin-bottom: 20px;
    }


</style>


<div class="container">
<br/>
    <div class="row">
        <div class="col-12 col-sm-3 ml-auto"> <!-- Changed classes for better responsiveness -->
			<select name="Filter" class="filtersec form-control">
				<option value="">Search Filter</option>
				<option value="Filterbeds">Beds</option>
				<option value="Filterbunks">Bunks</option>
				<option value="Filterheadboards">Headboards</option>
				<option value="Filtermattresses">Mattresses</option>
				<option value="Filterbases">Bases</option>
			</select>
        </div>
    </div>
</div>
<section class="think-area responsive-content Filterbeds">
    <div class="think-fluid">
		<?php if(!empty($Beds)){ ?>
			<div class="container products">
				<h2 class="text-center" style="border-bottom: double;margin: 0;padding-bottom: 17px;width: 115px;text-align: center;margin: 0 auto;">Beds</h2>
				<div class="row text-center">
					<?php foreach($Beds as $product){ 
							$prImage = !empty($product->featured_image) ? $product->featured_image : reset(json_decode($product->image)); ?>
					
						<div class="col-sm-4 pro_div">
							<div class="avivon-heading">
								<div class="pro_image">
									<!--<a href="<?php echo base_url('/product/'.$product->id);?>">-->
									<?php 
										$imagedivid2ch = explode('.',$prImage);
										$checknimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2ch[0].'_thumbin2.png';
										if(@getimagesize($checknimagethumb)){
											$nimage = $checknimagethumb;
										}else{
											$genthumb = generateThumbnail('/home1/southern/public_html/products/'.$prImage.'', 300,250,100);
											
											if($genthumb){
												$imagedivid2 = explode('.',$prImage);
												$nimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2[0].'_thumbin2.png';
												$nimage = $nimagethumb;
											}else{
												$nimage = '/products/'.$prImage;
											} 
										}
									?>
									
										<?php if(!empty($product->image) && count(json_decode($product->image)) > 1){
												$imagess = json_decode($product->image);
												if(!empty($product->featured_image)){
													if (($key = array_search($product->featured_image, $imagess)) !== false) {
														unset($imagess[$key]);
													}
													//shuffle($imagess);
													array_unshift($imagess, $product->featured_image);
												}	?>
											<div class="slick-slider2">
												<?php foreach($imagess as $slide){ ?>
													<div class="element"><img src="/products/<?php echo $slide; ?>"></div>
												<?php } ?>
											</div>
										<?php }else{ ?>
											<img src="<?php echo $nimage; ?>" alt="" />
										<?php } ?>	
											
									<!--</a>-->
								</div>
								
							   <?php if($product->stock == 'Out of Stock') { ?><p style="color:red;font-weight:bold;">Currently out of stock</p><?php } ?>							
							   <p><?php echo $product->type; ?>: <?php echo $product->name;?> - $<?php echo $product->price;?></p>							
								<a href="<?php echo base_url('/product/'.$product->id);?>" class="avivon__btn">
									View Product <span class="fontello icon-angle-double-right"></span>
								</a>
							</div><!-- end avivon-heading -->
						</div><!-- end col-md-6 -->
						
				
					<?php }?>
				</div><!-- end row -->
			</div><!-- end container -->
		<?php } ?>
    </div><!-- end think-fluid -->
</section><!-- end think-area -->
<!--================================
         END THINK AREA
=================================-->
<section class="think-area responsive-content Filterbunks">
    <div class="think-fluid">
		<?php if(!empty($Bunks)){ ?>
			<div class="container products">
				<h2 class="text-center" style="border-bottom: double;margin: 0;padding-bottom: 17px;width: 115px;text-align: center;margin: 0 auto;">Bunks</h2>
				<div class="row text-center">
					<?php foreach($Bunks as $product){
							$prImage = !empty($product->featured_image) ? $product->featured_image : reset(json_decode($product->image));	?>
					
						<div class="col-sm-4 pro_div">
							<div class="avivon-heading">
								<div class="pro_image">
								<!--<a href="<?php echo base_url('/product/'.$product->id);?>">-->
								
									<?php 
										$imagedivid2ch = explode('.',$prImage);
										$checknimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2ch[0].'_thumbin2.png';
										if(@getimagesize($checknimagethumb)){
											$nimage = $checknimagethumb;
										}else{
											$genthumb = generateThumbnail('/home1/southern/public_html/products/'.$prImage.'', 300,250,100);
											
											if($genthumb){
												$imagedivid2 = explode('.',$prImage);
												$nimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2[0].'_thumbin2.png';
												$nimage = $nimagethumb;
											}else{
												$nimage = '/products/'.$prImage;
											} 
										}
									?>
									
									<?php if(!empty($product->image) && count(json_decode($product->image)) > 1){
											$imagess = json_decode($product->image);
											if(!empty($product->featured_image)){
												if (($key = array_search($product->featured_image, $imagess)) !== false) {
													unset($imagess[$key]);
												}
												//shuffle($imagess);
												array_unshift($imagess, $product->featured_image);
											}	?>
										<div class="slick-slider2">
											<?php foreach($imagess as $slide){ ?>
												<div class="element"><img src="/products/<?php echo $slide; ?>"></div>
											<?php } ?>
										</div>
									<?php }else{ ?>
										<img src="<?php echo $nimage;?>" alt="" />
									<?php } ?>	
								
								<!--</a>-->
								</div>
								
							   <?php if($product->stock == 'Out of Stock') { ?><p style="color:red;font-weight:bold;">Currently out of stock</p><?php } ?>							
							   <p><?php echo $product->type; ?>: <?php echo $product->name;?> - $<?php echo $product->price;?></p>							
								<a href="<?php echo base_url('/product/'.$product->id);?>" class="avivon__btn">
									View Product <span class="fontello icon-angle-double-right"></span>
								</a>
							</div><!-- end avivon-heading -->
						</div><!-- end col-md-6 -->
						
				
					<?php }?>
				</div><!-- end row -->
			</div><!-- end container -->
		<?php } ?>
    </div><!-- end think-fluid -->
</section><!-- end think-area -->
<!--================================
         END THINK AREA
=================================-->
<section class="think-area responsive-content Filterheadboards">
    <div class="think-fluid">
		<?php if(!empty($Headboards)){ ?>
			<div class="container products">
				<h2 class="text-center" style="border-bottom: double;margin: 0;padding-bottom: 17px;width: 202px;text-align: center;margin: 0 auto;">Headboards</h2>
				<div class="row text-center">
					<?php foreach($Headboards as $product){ 
							$prImage = !empty($product->featured_image) ? $product->featured_image : reset(json_decode($product->image)); ?>
					
						<div class="col-sm-4 pro_div">
							<div class="avivon-heading">
								<div class="pro_image">
									<!--<a href="<?php echo base_url('/product/'.$product->id);?>">-->
								
									<?php 
										$imagedivid2ch = explode('.',$prImage);
										$checknimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2ch[0].'_thumbin2.png';
										if(@getimagesize($checknimagethumb)){
											$nimage = $checknimagethumb;
										}else{
											$genthumb = generateThumbnail('/home1/southern/public_html/products/'.$prImage.'', 300,250,100);
											
											if($genthumb){
												$imagedivid2 = explode('.',$prImage);
												$nimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2[0].'_thumbin2.png';
												$nimage = $nimagethumb;
											}else{
												$nimage = '/products/'.$prImage;
											} 
										}
									?>
									
									<?php if(!empty($product->image) && count(json_decode($product->image)) > 1){
											$imagess = json_decode($product->image);
											if(!empty($product->featured_image)){
												if (($key = array_search($product->featured_image, $imagess)) !== false) {
													unset($imagess[$key]);
												}
												//shuffle($imagess);
												array_unshift($imagess, $product->featured_image);
											}	?>
										<div class="slick-slider2">
											<?php foreach($imagess as $slide){ ?>
												<div class="element"><img src="/products/<?php echo $slide; ?>"></div>
											<?php } ?>
										</div>
									<?php }else{ ?>
										<img src="<?php echo $nimage;?>" alt="" />
									<?php } ?>		
								
									<!--</a>-->
								</div>
								
							   <?php if($product->stock == 'Out of Stock') { ?><p style="color:red;font-weight:bold;">Currently out of stock</p><?php } ?>							
							   <p><?php echo $product->type; ?>: <?php echo $product->name;?> - $<?php echo $product->price;?></p>							
								<a href="<?php echo base_url('/product/'.$product->id);?>" class="avivon__btn">
									View Product <span class="fontello icon-angle-double-right"></span>
								</a>
							</div><!-- end avivon-heading -->
						</div><!-- end col-md-6 -->
						
				
					<?php }?>
				</div><!-- end row -->
			</div><!-- end container -->
		<?php } ?>
    </div><!-- end think-fluid -->
</section><!-- end think-area -->

<section class="think-area responsive-content Filtermattresses">
    <div class="think-fluid">
		<?php if(!empty($Mattresses)){ ?>
			<div class="container products">
				<h2 class="text-center" style="border-bottom: double;margin: 0;padding-bottom: 17px;width: 202px;text-align: center;margin: 0 auto;">Mattresses</h2>
				<div class="row text-center">
					<?php foreach($Mattresses as $product){ 
							$prImage = !empty($product->featured_image) ? $product->featured_image : reset(json_decode($product->image)); ?>
					
						<div class="col-sm-4 pro_div">
							<div class="avivon-heading">
								<div class="pro_image">
									<!--<a href="<?php echo base_url('/product/'.$product->id);?>">-->
								
									<?php 
										$imagedivid2ch = explode('.',$prImage);
										$checknimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2ch[0].'_thumbin2.png';
										if(@getimagesize($checknimagethumb)){
											$nimage = $checknimagethumb;
										}else{
											$genthumb = generateThumbnail('/home1/southern/public_html/products/'.$prImage.'', 300,250,100);
											
											if($genthumb){
												$imagedivid2 = explode('.',$prImage);
												$nimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2[0].'_thumbin2.png';
												$nimage = $nimagethumb;
											}else{
												$nimage = '/products/'.$prImage;
											} 
										}
									?>
									
									<?php if(!empty($product->image) && count(json_decode($product->image)) > 1){
											$imagess = json_decode($product->image);
											if(!empty($product->featured_image)){
												if (($key = array_search($product->featured_image, $imagess)) !== false) {
													unset($imagess[$key]);
												}
												//shuffle($imagess);
												array_unshift($imagess, $product->featured_image);
											}	?>
										<div class="slick-slider2">
											<?php foreach($imagess as $slide){ ?>
												<div class="element"><img src="/products/<?php echo $slide; ?>"></div>
											<?php } ?>
										</div>
									<?php }else{ ?>
										<img src="<?php echo $nimage;?>" alt="" />
									<?php } ?>	
								
									<!--</a>-->
								</div>
								
							   <?php if($product->stock == 'Out of Stock') { ?><p style="color:red;font-weight:bold;">Currently out of stock</p><?php } ?>							
							   <p><?php echo $product->type; ?>: <?php echo $product->name;?> - $<?php echo $product->price;?></p>							
								<a href="<?php echo base_url('/product/'.$product->id);?>" class="avivon__btn">
									View Product <span class="fontello icon-angle-double-right"></span>
								</a>
							</div><!-- end avivon-heading -->
						</div><!-- end col-md-6 -->
						
				
					<?php }?>
				</div><!-- end row -->
			</div><!-- end container -->
		<?php } ?>
    </div><!-- end think-fluid -->
</section><!-- end think-area -->

<section class="think-area responsive-content Filterbases">
    <div class="think-fluid">
		<?php if(!empty($Bases)){ ?>
			<div class="container products">
				<h2 class="text-center" style="border-bottom: double;margin: 0;padding-bottom: 17px;width: 202px;text-align: center;margin: 0 auto;">Bases</h2>
				<div class="row text-center">
					<?php foreach($Bases as $product){ 
							$prImage = !empty($product->featured_image) ? $product->featured_image : reset(json_decode($product->image)); ?>
					
						<div class="col-sm-4 pro_div">
							<div class="avivon-heading">
								<div class="pro_image">
									<!--<a href="<?php echo base_url('/product/'.$product->id);?>">-->
								
									<?php 
										$imagedivid2ch = explode('.',$prImage);
										$checknimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2ch[0].'_thumbin2.png';
										if(@getimagesize($checknimagethumb)){
											$nimage = $checknimagethumb;
										}else{
											$genthumb = generateThumbnail('/home1/southern/public_html/products/'.$prImage.'', 300,250,100);
											
											if($genthumb){
												$imagedivid2 = explode('.',$prImage);
												$nimagethumb = 'https://ourwebsitehere.com/products/'.$imagedivid2[0].'_thumbin2.png';
												$nimage = $nimagethumb;
											}else{
												$nimage = '/products/'.$prImage;
											} 
										}
									?>
									
									<?php if(!empty($product->image) && count(json_decode($product->image)) > 1){
											$imagess = json_decode($product->image);
											if(!empty($product->featured_image)){
												if (($key = array_search($product->featured_image, $imagess)) !== false) {
													unset($imagess[$key]);
												}
												//shuffle($imagess);
												array_unshift($imagess, $product->featured_image);
											}	?>
										<div class="slick-slider2">
											<?php foreach($imagess as $slide){ ?>
												<div class="element"><img src="/products/<?php echo $slide; ?>"></div>
											<?php } ?>
										</div>
									<?php }else{ ?>
										<img src="<?php echo $nimage;?>" alt="" />
									<?php } ?>	
								
									<!--</a>-->
								</div>
							   <?php if($product->stock == 'Out of Stock') { ?><p style="color:red;font-weight:bold;">Currently out of stock</p><?php } ?>							
							   <p><?php echo $product->type; ?>:  <?php echo $product->name;?> - $<?php echo $product->price;?></p>							
								<a href="<?php echo base_url('/product/'.$product->id);?>" class="avivon__btn">
									View Product <span class="fontello icon-angle-double-right"></span>
								</a>
							</div><!-- end avivon-heading -->
						</div><!-- end col-md-6 -->
						
				
					<?php }?>
				</div><!-- end row -->
			</div><!-- end container -->
		<?php } ?>
    </div><!-- end think-fluid -->
</section><!-- end think-area -->
<!--================================
         END THINK AREA
=================================-->

<script>
    $(document).ready(function(){
        $('.filtersec').change(function(){
            var value = $(this).val();
            if(value){
                $('section.think-area').hide();
                $('.'+value).show();
            }else{
                $('section.think-area').show();
            }
        });
    });
</script>
<script type="text/javascript">
$('.slick-slider2').slick({
  dots:false,
  infinite: true,
  slidesToShow: 1,
   //autoplay: true,
   //autoplaySpeed: 2000
});
</script>