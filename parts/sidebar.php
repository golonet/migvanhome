<?php
$categoryTitle = Category::getCategoryTitle();
?>

			<div class="col-md-2 col-md hideOnMobile">
				<div class=" possible-about" style="direction: rtl;">
									
					<div class="accordion" style="text-align: right;">
					
					<?php 
					$con = Conect::connectToDB();										
					?>
											
					<?php foreach($categoryTitle as $categoryTitle): ?>
					<?php $title = $categoryTitle["category_title"]; ?>
					  	 <h3 class="tab" style="    line-height: 2;">
							<ul class="place">							
								<li class="sort" style="font-size: 18px;"><span><?php echo $title ?></span></li>
								<li class="by"><img src="images/do.png" alt="לחצן בחירה" style="position: relative;"></li>
								<div class="clearfix"> </div>
							</ul>
						</h3>
						<?php $result = mysqli_query($con,"SELECT * FROM `category` WHERE `category_title`='$title' order by `sort` ASC" ); ?>												
						
						
						  <div class="tab tabHover" style="height: auto;">	
						  <?php $catName = array(); ?>
						  <?php while ($row = mysqli_fetch_array($result)): ?>	
						  	<?php $catName[] = $row["name"]; ?>
						  <?php endwhile; ?>	
						  
						  	<?php foreach($catName as $catName): ?>
							 
								<div style="width: 100%; min-height: 25px;border-bottom:1px solid #fef;">
									<a style="font-size: 16px;" href="search.php?byTextSubCategory=<?php echo $catName ?>" style="font-size: 18px;" title="<?php echo $catName ?>"><?php echo $catName ?></a>
								</div>
							 
							 <?php endforeach; ?>
						  </div>				
						
					<?php endforeach; ?>
					</div>
						
						<!--script-->
						<script>
						  $( function() {
							    $( ".accordion" ).accordion({
							      collapsible: true,
							      active: false,
							      heightStyle: "content"
							      							      
							    });
							  } );
						  
						</script>
						<!-- script -->
					</div>

				<!---->
				<br/><br/>
				<div class="money" style="direction: rtl; display: none;">
					<h3>אפשרויות תשלום</h3>
						<ul class="money-in">
						
						<li><a href="single.html"><img class="Ximg-responsive" src="images/p2.png" title="mastercard" alt="mastercard"></a></li>
						<li><a href="single.html"><img class="Ximg-responsive" src="images/p3.png" title="paypal" alt="paypal"></a></li>
						<li><a href="single.html"><img class="Ximg-responsive" src="images/p4.png" title="visa" alt="visa"></a></li>
						<li><a href="single.html"><img class="Ximg-responsive" src="images/p5.png" title="isracard" alt="isracard" style="border-radius: 10px;box-shadow: 0.5px 1px 1px #444;"></a></li>
						<li><a href="single.html"><img class="Ximg-responsive" src="images/p7.png" title="emerican express" alt="emerican express" style="border-radius: 10px;box-shadow: 0.5px 1px 1px #444;"></a></li>


						</ul>
					</div>
			</div>