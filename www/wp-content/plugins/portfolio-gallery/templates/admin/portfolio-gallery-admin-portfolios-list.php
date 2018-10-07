<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wpdb;
?>
<div class="wrap">
	<?php require( PORTFOLIO_GALLERY_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'portfolio-gallery-admin-free-banner.php' ); ?>
	<?php
	$path_site2                  = plugins_url( "../images", __FILE__ );
	$add_new_portfolio_safe_link = wp_nonce_url(
		'admin.php?page=portfolios_huge_it_portfolio&task=add_portfolio',
		'add_new_portfolio',
		'hugeit_portfolio_add_portfolio_nonce'
	);
	?>
	<div id="poststuff">
		<div id="portfolios-list-page">
			<form method="post" onkeypress="doNothing()" action="admin.php?page=portfolios_huge_it_portfolio"
			      id="admin_form" name="admin_form">
				<h2>Huge-IT Portfolios
					<a onclick="window.location.href='<?php echo $add_new_portfolio_safe_link; ?>'"
					   class="add-new-h2"><?php echo __( 'Add New Portfolio', 'portfolio-gallery' ); ?></a>
				</h2>
				<?php
				$serch_value = '';
				if ( isset( $_POST['serch_or_not'] ) ) {
					if ( $_POST['serch_or_not'] == "search" ) {
						$serch_value = esc_html( stripslashes( $_POST['search_events_by_title'] ) );
					} else {
						$serch_value = "";
					}
				}
				$serch_fields = '<div class="alignleft actions"">
				<label for="search_events_by_title" style="font-size:14px">Filter: </label>
					<input type="text" name="search_events_by_title" value="' . $serch_value . '" id="search_events_by_title" onchange="clear_search_texts()">
			</div>
			<div class="alignleft actions">
				<input type="button" value="Search" onclick="document.getElementById(\'page_number\').value=\'1\'; document.getElementById(\'serch_or_not\').value=\'search\';
				 document.getElementById(\'admin_form\').submit();" class="button-secondary action">
				 <input type="button" value="Reset" onclick="window.location.href=\'admin.php?page=portfolios_huge_it_portfolio\'" class="button-secondary action">
			</div>';

				portfolio_gallery_print_html_nav( $pageNav['total'], $pageNav['limit'], $serch_fields );
				?>
				<table class="wp-list-table widefat fixed pages" style="width:95%">
					<thead>
					<tr>
						<th scope="col" id="id" style="width:12%">
							<span><?php echo __( 'ID', 'portfolio-gallery' ); ?></span><span
								class="sorting-indicator"></span></th>
						<th scope="col" id="name" style="width:20%">
							<span><?php echo __( 'Name', 'portfolio-gallery' ); ?></span><span
								class="sorting-indicator"></span></th>
						<th scope="col" id="prod_count" style="width:12%;">
							<span><?php echo __( 'Images', 'portfolio-gallery' ); ?></span><span
								class="sorting-indicator"></span></th>
						<th style="width:20%"><span><?php echo __( 'Shortcode', 'portfolio-gallery' ); ?></span><span
								class="sorting-indicator"></span></th>
						<th style="width:12%"><span><?php echo __( 'Duplicate', 'portfolio-gallery' ); ?>
							</span><span class="sorting-indicator"></span></th>
						<th style="width:12%"><span><?php echo __( 'Delete', 'portfolio-gallery' ); ?></span><span
								class="sorting-indicator"></span></th>
					</tr>
					</thead>
					<tbody>
					<?php
					$trcount = 1;
					for ( $i = 0; $i < count( $rows ); $i ++ ) {
						$trcount ++;
						$ka0 = 0;
						$ka1 = 0;
						if ( isset( $rows[ $i - 1 ]->id ) ) {
							if ( $rows[ $i ]->sl_width == $rows[ $i - 1 ]->sl_width ) {
								$x1  = $rows[ $i ]->id;
								$x2  = $rows[ $i - 1 ]->id;
								$ka0 = 1;
							} else {
								$jj = 2;
								while ( isset( $rows[ $i - $jj ] ) ) {
									if ( $rows[ $i ]->sl_width == $rows[ $i - $jj ]->sl_width ) {
										$ka0 = 1;
										$x1  = $rows[ $i ]->id;
										$x2  = $rows[ $i - $jj ]->id;
										break;
									}
									$jj ++;
								}
							}
							if ( $ka0 ) {
								$move_up = '<span><a href="#reorder" onclick="return listItemTask(\'' . $x1 . '\',\'' . $x2 . '\')" title="Move Up">   <img src="' . plugins_url( 'images/uparrow.png', __FILE__ ) . '" width="16" height="16" border="0" alt="Move Up"></a></span>';
							} else {
								$move_up = "";
							}
						} else {
							$move_up = "";
						}

						if ( isset( $rows[ $i + 1 ]->id ) ) {

							if ( $rows[ $i ]->sl_width == $rows[ $i + 1 ]->sl_width ) {
								$x1  = $rows[ $i ]->id;
								$x2  = $rows[ $i + 1 ]->id;
								$ka1 = 1;
							} else {
								$jj = 2;
								while ( isset( $rows[ $i + $jj ] ) ) {
									if ( $rows[ $i ]->sl_width == $rows[ $i + $jj ]->sl_width ) {
										$ka1 = 1;
										$x1  = $rows[ $i ]->id;
										$x2  = $rows[ $i + $jj ]->id;
										break;
									}
									$jj ++;
								}
							}

							if ( $ka1 ) {
								$move_down = '<span><a href="#reorder" onclick="return listItemTask(\'' . $x1 . '\',\'' . $x2 . '\')" title="Move Down">  <img src="' . plugins_url( 'images/downarrow.png', __FILE__ ) . '" width="16" height="16" border="0" alt="Move Down"></a></span>';
							} else {
								$move_down = "";
							}
						}

						$uncat = $rows[ $i ]->par_name;
						if ( isset( $rows[ $i ]->prod_count ) ) {
							$pr_count = $rows[ $i ]->prod_count;
						} else {
							$pr_count = 0;
						}

						$delete_portfolio_safe_link = wp_nonce_url(
							'admin.php?page=portfolios_huge_it_portfolio&task=remove_portfolio&id=' . $rows[ $i ]->id,
							'remove_portfolio_' . $rows[ $i ]->id,
							'hugeit_portfolio_remove_portfolio_nonce'
						);

						$huge_it_portfolio_gallery_nonce_duplicate_portfolio = wp_create_nonce( 'huge_it_portfolio_duplicate_nonce' . $rows[ $i ]->id );
						?>
						<tr>
							<td><?php echo $rows[ $i ]->id; ?></td>
							<td>
								<a href="<?php echo esc_url( 'admin.php?page=portfolios_huge_it_portfolio&task=edit_cat&id=' . $rows[ $i ]->id ); ?>"><?php echo esc_html( stripslashes( $rows[ $i ]->name ) ); ?></a>
							</td>
							<td>(<?php if ( ! ( $pr_count ) ) {
									echo '0';
								} else {
									echo $rows[ $i ]->prod_count;
								} ?>)
							</td>
							<td>
								[huge_it_portfolio id="<?php echo $rows[ $i ]->id; ?>"]
							</td>
							<td>
								<a href="admin.php?page=portfolios_huge_it_portfolio&task=duplicate_portfolio_gallery&id=<?php echo $rows[ $i ]->id; ?>&portfolio_gallery_duplicate_nonce=<?php echo $huge_it_portfolio_gallery_nonce_duplicate_portfolio; ?>"
								   class="duplicate-link"><span class="duplicate-icon"></span></a>
							<td><a href="<?php esc_attr_e($delete_portfolio_safe_link);
								?>" class="delete-link"><span class="delete-icon"></span></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<input type="hidden" name="oreder_move" id="oreder_move" value=""/>
				<input type="hidden" name="asc_or_desc" id="asc_or_desc"
				       value="<?php if ( isset( $_POST['asc_or_desc'] ) ) {
					       echo esc_attr( $_POST['asc_or_desc'] );
				       } ?>"/>
				<input type="hidden" name="order_by" id="order_by" value="<?php if ( isset( $_POST['order_by'] ) ) {
					echo esc_attr( $_POST['order_by'] );
				} ?>"/>
				<input type="hidden" name="saveorder" id="saveorder" value=""/>
			</form>
		</div>
	</div>
</div>