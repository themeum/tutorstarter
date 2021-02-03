<?php
/**
 * Template part for displaying a custom Admin area
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );
?>

<div class="tutorstarter-metabox">
<?php wp_nonce_field( 'tutorstarter_metabox_inputs', 'tutorstarter_metabox_nonce' ); ?>
    <style scoped>
        .tutorstarter-metabox{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .tutorstarter-meta-field {
            justify-content: flex-start;
            display: flex;
            flex-direction: column;
            margin: 5px 0;
            width: 100%;
        }
    </style>
    <p class="meta-options tutorstarter-meta-field ">
        <label for="main_schema_select">Schema Type</label>
        <select id="hcf_select" name="hcf_select">
            <option value="">--Select Type--</option>
            <option value="Course">Course</option>
            <option value="Review">Review</option>
            <option value="WebPage">Web Page</option>
        </select>
    </p>
    <p class="meta-options tutorstarter-meta-field meta-date">
        <label for="hcf_published_date">Published Date</label>
        <input id="hcf_published_date" type="date" name="hcf_published_date" value="<?php echo ! empty( $post_meta['hcf_published_date'] ) ? $post_meta['hcf_published_date'] : ''; ?>">
    </p>
    <p class="meta-options tutorstarter-meta-field">
        <label for="hcf_price">Price</label>
        <input id="hcf_price" type="number" name="hcf_price" value="<?php echo ! empty( $post_meta['hcf_price'] ) ? $post_meta['hcf_price'] : ''; ?>">
    </p>
</div>
