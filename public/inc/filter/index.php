<?php
defined('ABSPATH') || die();

// Get all categories
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
    'taxonomy' => 'category',
));

// Get all tags
$tags = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
    'taxonomy' => 'post_tag',
));

$no_of_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$custom_query_args_posts = null;

$selected_category = '';
$selected_tag = '';
$selected_date = '';

if ($_POST) {
    $selected_category = isset($_POST['category']) ? $_POST['category'] : '';
    $selected_tag = isset($_POST['tag']) ? $_POST['tag'] : '';
    $selected_date = isset($_POST['daterange']) ? $_POST['daterange'] : '';

    $cat_filters = array();
    $tag_filters = array();
    $data_range = array();

    if (isset($selected_category)) {
        array_push($cat_filters, $selected_category);
    }
    if (isset($selected_tag)) {
        array_push($tag_filters, $selected_tag);
    }
    if ($selected_date) {
        $fulldate = explode(" - ", $selected_date);
        $time_from = strtotime($fulldate[0]);
        $time_to = strtotime($fulldate[1]);

        $data_range = array(
            'inclusive' => true,
            'after' => array(
                'year' => date("Y", $time_from),
                'month' => date("m", $time_from),
                'day' => date("j", $time_from),
            ),
            'before' => array(
                'year' => date("Y", $time_to),
                'month' => date("m", $time_to),
                'day' => date("j", $time_to),
            ),
        );
    }

    $custom_query_args_posts = array(
        'cat' => $cat_filters,
        'tag__and' => $tag_filters,
        'date_query' => $data_range,
        'posts_per_page' => 10,
        'paged' => $no_of_page,
    );
    $custom_query = new WP_Query($custom_query_args_posts);
} else {
    $custom_query_args_posts = array(
        'cat' => '',
        'posts_per_page' => 10,
        'paged' => $no_of_page,
    );
    $custom_query = new WP_Query($custom_query_args_posts);

}

?>
<div id="af-filter-wrapper">
    <form method="post">
    <div class="row">
        <div class="col">
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category">
            <option value="">Select Category</option>
            <?php
foreach ($categories as $category) {
    ?>
            <option value="<?=$category->term_id;?>" <?php if (isset($selected_category) && $selected_category == $category->term_id) {echo "selected='selected'";}?>><?=$category->name;?></option>
            <?php
}
?>
        </select>
        </div>

        <div class="col">
        <label for="tags">Tags</label>
        <select class="form-control" id="tags" name="tag">
        <option value="">Select Tag</option>
            <?php
foreach ($tags as $category) {
    ?>
            <option value="<?=$category->term_id;?>" <?php if (isset($selected_tag) && $selected_tag == $category->term_id) {echo "selected='selected'";}?>><?=$category->name;?></option>
            <?php
}
?>
        </select>
        </div>

        <div class="col">
        <label for="exampleFormControlSelect1">Date Range</label>
        <input type="text" name="daterange" value="<?=$selected_date?>"/>
        </div>

        <div class="col text-center mt-4">
        <button type="submit" class="btn btn-primary">Filter</button>
        </div>

    </div>
    </form>

<?php
if ($custom_query->have_posts()) {
    ?>
		<!-- posts -->
		<div id="filter_posts_container" class="mt-5 row">

    <?php
while ($custom_query->have_posts()):
        // get post data
        $custom_query->the_post();
        $post_id = get_the_ID();
        global $post;

        // get post image
        $image_id = get_post_thumbnail_id();
        $image_title = get_the_title($image_id);
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        if (empty($image_alt)) {
            $image_alt = $image_title;}

        // get post publish date
        $day = get_the_date('d');
        $month = get_the_date('m');
        $year = get_the_date('Y');

        ?>
	            <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
	            <div class="card" style="width: 18rem;">
	            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail')); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="card-img-top">
	            <div class="card-body">
	            <h5 class="card-title"><?php echo esc_html_e(ucwords(the_title())); ?></h5>
	            <p><?php the_time('j F, Y');?></p>
	            <p class="card-text"><?php echo esc_html(ucfirst(stripcslashes(substr(get_the_excerpt(), 0, '100')) . '...')); ?></p>
	            <a href="<?php the_permalink();?>" class="btn btn-primary text-white text-decoration-none">View</a>
	            </div>
	            </div>
	            </div>

	        <?php
endwhile;
// Reset Post Data
    wp_reset_postdata();
}

?>

		</div>

</div>

<script type="text/javascript">
$(function() {
    var datepicker = $('input[name="daterange"]').daterangepicker({
        // locale: {
        //     format: 'DD-MM-YYYY',
        // },
        // autoUpdateInput: false,
    });
    <?php
if (!$selected_date) {
    ?>
            datepicker . val('');
            <?php
}
?>


});
</script>
