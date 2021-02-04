<?php
/**
 * Template part for displaying Schema custom meta fields
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

require_once get_template_directory() . '/views/admin/select-options.php';

?>

<div class="tutorstarter-metabox">

<?php wp_nonce_field( 'tutorstarter_metabox_inputs', 'tutorstarter_metabox_nonce' ); ?>

    <div class="meta-fields tutorstarter-meta-field meta-main-schema">
        <label for="main_schema_select"><?php esc_attr_e( 'Schema Type', 'tutorstarter' ); ?></label>
        <select id="main_schema_select" name="main_schema_select">
            <option value=""><?php esc_attr_e( '--Select Type--', 'tutorstarter' ); ?></option>
            <option value="LocalBusiness"><?php esc_attr_e( 'Local Business', 'tutorstarter' ); ?></option>
            <option value="Organization"><?php esc_attr_e( 'Organization', 'tutorstarter' ); ?></option>
            <option value="WebPage"><?php esc_attr_e( 'Web Page', 'tutorstarter' ); ?></option>
            <option value="Video"><?php esc_attr_e( 'Video', 'tutorstarter' ); ?></option>
            <option value="Review"><?php esc_attr_e( 'Review', 'tutorstarter' ); ?></option>
            <option value="Person"><?php esc_attr_e( 'Person', 'tutorstarter' ); ?></option>
            <option value="Course"><?php esc_attr_e( 'Course', 'tutorstarter' ); ?></option>
        </select>
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-sub-schema">
    <label for="sub_schema_select"><?php esc_attr_e( 'Schema Sub Type', 'tutorstarter' ); ?></label>
        <select id="sub_schema_select" name="sub_schema_select">
            <option value=""><?php esc_attr_e( '--Select Sub Type--', 'tutorstarter' ); ?></option>
            <?php foreach ( tutorstarter_local_business_oprions() as $key => $value ) { ?>
                <option value="<?php esc_attr_e( $key ); ?>"><?php esc_attr_e( $value ); ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-name">
        <label for="name"><?php esc_attr_e( 'Name', 'tutorstarter' ); ?></label>
        <input id="name" type="text" name="name" placeholder="<?php esc_attr_e( 'e.g: John Doe', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['name'] ) ? esc_attr( $post_meta['name'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-logo">
        <label for="logo_url"><?php esc_attr_e( 'Logo/Image URL', 'tutorstarter' ); ?></label>
        <input id="logo_url" type="text" name="logo_url" placeholder="<?php esc_attr_e( 'e.g: https://myimage.com/image.jpg', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['logo_url'] ) ? esc_attr( $post_meta['logo_url'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-description">
        <label for="description"><?php esc_attr_e( 'Description', 'tutorstarter' ); ?></label>
        <textarea id="description" name="description" placeholder="<?php esc_attr_e( 'e.g: Great Schema Description', 'tutorstarter' ); ?>"><?php echo ! empty( $post_meta['description'] ) ? esc_attr( $post_meta['description'] ) : ''; ?></textarea>
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-address">
        <label for="address"><?php esc_attr_e( 'Address', 'tutorstarter' ); ?></label>
        <input id="address" type="text" name="address" placeholder="<?php esc_attr_e( 'e.g: 123, Street, NY, USA', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['address'] ) ? esc_attr( $post_meta['address'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-phone">
        <label for="phone"><?php esc_attr_e( 'Phone', 'tutorstarter' ); ?></label>
        <input id="phone" type="text" name="phone" placeholder="<?php esc_attr_e( 'e.g: +1 000 111 222', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['phone'] ) ? esc_attr( $post_meta['phone'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-city">
        <label for="city"><?php esc_attr_e( 'City', 'tutorstarter' ); ?></label>
        <input id="city" type="text" name="city" placeholder="<?php esc_attr_e( 'e.g: New York', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['city'] ) ? esc_attr( $post_meta['city'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-state-region">
        <label for="state_region"><?php esc_attr_e( 'State/Region', 'tutorstarter' ); ?></label>
        <input id="state_region" type="text" name="state_region" placeholder="<?php esc_attr_e( 'e.g: California(CA)', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['state_region'] ) ? esc_attr( $post_meta['state_region'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-zip-code">
        <label for="zip_code"><?php esc_attr_e( 'Zip Code', 'tutorstarter' ); ?></label>
        <input id="zip_code" type="text" name="zip_code" placeholder="<?php esc_attr_e( 'e.g: 123456', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['zip_code'] ) ? esc_attr( $post_meta['zip_code'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-country">
        <label for="country"><?php esc_attr_e( 'Country', 'tutorstarter' ); ?></label>
        <input id="country" type="text" name="country" placeholder="<?php esc_attr_e( 'e.g: USA', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['country'] ) ? esc_attr( $post_meta['country'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-po-box">
        <label for="po_box"><?php esc_attr_e( 'PO Box', 'tutorstarter' ); ?></label>
        <input id="po_box" type="text" name="po_box" placeholder="<?php esc_attr_e( 'e.g: 1352', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['po_box'] ) ? esc_attr( $post_meta['po_box'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-job-title">
        <label for="job_title"><?php esc_attr_e( 'Job Title', 'tutorstarter' ); ?></label>
        <input id="job_title" type="text" name="job_title" placeholder="<?php esc_attr_e( 'e.g: CEO', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['job_title'] ) ? esc_attr( $post_meta['job_title'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-height">
        <label for="height"><?php esc_attr_e( 'Height', 'tutorstarter' ); ?></label>
        <input id="height" type="text" name="height" placeholder="<?php esc_attr_e( 'e.g: 170 cm', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['height'] ) ? esc_attr( $post_meta['height'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-birth-date">
        <label for="birth_date"><?php esc_attr_e( 'Birth Date', 'tutorstarter' ); ?></label>
        <input id="birth_date" type="text" name="birth_date" placeholder="<?php esc_attr_e( 'e.g: YYYY-MM-DD', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['birth_date'] ) ? esc_attr( $post_meta['birth_date'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-birth-place">
        <label for="birth_place"><?php esc_attr_e( 'Birth Place', 'tutorstarter' ); ?></label>
        <input id="birth_place" type="text" name="birth_place" placeholder="<?php esc_attr_e( 'e.g: London, UK', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['birth_place'] ) ? esc_attr( $post_meta['birth_place'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-nationality">
        <label for="nationality"><?php esc_attr_e( 'Nationality', 'tutorstarter' ); ?></label>
        <input id="nationality" type="text" name="nationality" placeholder="<?php esc_attr_e( 'e.g: American', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['nationality'] ) ? esc_attr( $post_meta['nationality'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-duration">
        <label for="duration"><?php esc_attr_e( 'Duration', 'tutorstarter' ); ?></label>
        <input id="duration" type="text" name="duration" placeholder="<?php esc_attr_e( 'e.g: PT1M30S', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['duration'] ) ? esc_attr( $post_meta['duration'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-upload-date">
        <label for="upload_date"><?php esc_attr_e( 'Upload Date', 'tutorstarter' ); ?></label>
        <input id="upload_date" type="text" name="upload_date" placeholder="<?php esc_attr_e( 'e.g: YYYY-MM-DD', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['upload_date'] ) ? esc_attr( $post_meta['upload_date'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-content-url">
        <label for="content_url"><?php esc_attr_e( 'Content URL', 'tutorstarter' ); ?></label>
        <input id="content_url" type="text" name="content_url" placeholder="<?php esc_attr_e( 'e.g: https://mycontent.com/content-url', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['content_url'] ) ? esc_attr( $post_meta['content_url'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-embed-url">
        <label for="embed_url"><?php esc_attr_e( 'Embed URL', 'tutorstarter' ); ?></label>
        <input id="embed_url" type="text" name="embed_url" placeholder="<?php esc_attr_e( 'e.g: https://mycontent.com/embed-url', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['embed_url'] ) ? esc_attr( $post_meta['embed_url'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-interaction-count">
        <label for="interaction_count"><?php esc_attr_e( 'Interaction Count', 'tutorstarter' ); ?></label>
        <input id="interaction_count" type="text" name="interaction_count" placeholder="<?php esc_attr_e( 'e.g: 1234', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['interaction_count'] ) ? esc_attr( $post_meta['interaction_count'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-rating-value">
        <label for="rating_value"><?php esc_attr_e( 'Rating Value', 'tutorstarter' ); ?></label>
        <input id="rating_value" type="text" name="rating_value" placeholder="<?php esc_attr_e( 'e.g: 4', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['rating_value'] ) ? esc_attr( $post_meta['rating_value'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-reviewed-product">
        <label for="reviewed_product"><?php esc_attr_e( 'Reviewed Product', 'tutorstarter' ); ?></label>
        <input id="reviewed_product" type="text" name="reviewed_product" placeholder="<?php esc_attr_e( 'e.g: iPhone 12 Pro Max Case', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['reviewed_product'] ) ? esc_attr( $post_meta['reviewed_product'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-reviewed-by">
        <label for="reviewed_by"><?php esc_attr_e( 'Reviewed By', 'tutorstarter' ); ?></label>
        <input id="reviewed_by" type="text" name="reviewed_by" placeholder="<?php esc_attr_e( 'e.g: Jane Doe', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['reviewed_by'] ) ? esc_attr( $post_meta['reviewed_by'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-date-published">
        <label for="date_published"><?php esc_attr_e( 'Date Published', 'tutorstarter' ); ?></label>
        <input id="date_published" type="text" name="date_published" placeholder="<?php esc_attr_e( 'e.g: YYYY-MM-DD', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['date_published'] ) ? esc_attr( $post_meta['date_published'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-publisher-type">
        <label for="publisher_type"><?php esc_attr_e( 'Review Publisher Type', 'tutorstarter' ); ?></label>
        <input id="publisher_type" type="text" name="publisher_type" placeholder="<?php esc_attr_e( 'e.g: Organization', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['publisher_type'] ) ? esc_attr( $post_meta['publisher_type'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-publisher-name">
        <label for="publisher_name"><?php esc_attr_e( 'Review Publisher Name', 'tutorstarter' ); ?></label>
        <input id="publisher_name" type="text" name="publisher_name" placeholder="<?php esc_attr_e( 'e.g: Mr. Anonymous', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['publisher_name'] ) ? esc_attr( $post_meta['publisher_name'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-keywords">
        <label for="keywords"><?php esc_attr_e( 'Keywords', 'tutorstarter' ); ?></label>
        <input id="keywords" type="text" name="keywords" placeholder="<?php esc_attr_e( 'e.g: seo wordpress tutor', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['keywords'] ) ? esc_attr( $post_meta['keywords'] ) : ''; ?>">
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-article-body">
        <label for="article_body"><?php esc_attr_e( 'Article Body', 'tutorstarter' ); ?></label>
        <textarea id="article_body" name="article_body" placeholder="<?php esc_attr_e( 'e.g: Lorem ipsum doler sit amet', 'tutorstarter' ); ?>"><?php echo ! empty( $post_meta['article_body'] ) ? esc_attr( $post_meta['article_body'] ) : ''; ?></textarea>
    </div>
    <div class="meta-fields tutorstarter-meta-field meta-provider-name">
        <label for="provider_name"><?php esc_attr_e( 'Provider Name', 'tutorstarter' ); ?></label>
        <input id="provider_name" type="text" name="provider_name" placeholder="<?php esc_attr_e( 'e.g: Awesome Course Org.', 'tutorstarter' ); ?>" value="<?php echo ! empty( $post_meta['provider_name'] ) ? esc_attr( $post_meta['provider_name'] ) : ''; ?>">
    </div>
</div>
