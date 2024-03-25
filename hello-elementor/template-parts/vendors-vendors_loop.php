<?php

	global $exclusive, $collaborative; 

	if ($exclusive) : ?>

		<div class="relationship_category--title">Exclusive Distribution Partner</div>
		<div class="relationship_category--wrap">
			<?php 
				foreach ($exclusive as $key => $exclusive_id) {
					$vendor_logo = get_field( 'vendor_logo', $exclusive_id );
					?>
						<a href="<?php echo get_permalink($exclusive_id);?>" class="vendor_logo_el" data-vendorid="<?php echo $exclusive_id;?>">
							<img src="<?=$vendor_logo['url']?>" class="vendor_logo">
						</a>
					<?php
				}
			?>
		</div>
	<?php endif;

	if ($collaborative) : ?>

		<div class="relationship_category--title">Collaborative Distribution Partner</div>
		<div class="relationship_category--wrap">
			<?php 
				foreach ($collaborative as $key => $collaborative_id) {
					$vendor_logo = get_field( 'vendor_logo', $collaborative_id );
					?>
						<a href="<?php echo get_permalink($exclusive_id);?>" class="vendor_logo_el" data-vendorid="<?php echo $collaborative_id;?>">
							<img src="<?=$vendor_logo['url']?>" class="vendor_logo">
						</a>
					<?php
				}
			?>
		</div>

	<?php endif;