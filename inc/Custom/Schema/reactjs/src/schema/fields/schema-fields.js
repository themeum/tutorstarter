const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { SelectControl, TextControl, TextareaControl } = wp.components;

import { localBusiness, organization, person, review } from './select-options';

const SchemaFields = ({ updatedValue, updateMeta }) => {

    let optionsGroup = [];
    let is_blog_post = tutorstarter_admin.is_post;
    let post_title = tutorstarter_admin.post_title;
    let post_excerpt = tutorstarter_admin.post_excerpt;
    let post_content = tutorstarter_admin.post_content;
    let post_thumbnail = tutorstarter_admin.post_thumbnail;

    const selectOptions = input => {
        if ('LocalBusiness' === input) {
            optionsGroup = localBusiness;
        } else if ('Organization' === input) {
            optionsGroup = organization;
        } else if ('Person' === input) {
            optionsGroup = person;
        } else if ('Review' === input) {
            optionsGroup = review;
        }

        return optionsGroup;
    };

    if ('1' === is_blog_post) {
        return (
            <Fragment>
                <TextControl
                    label={__('Schema Type', 'tutorstarter')}
                    value='Blog Post'
                    disabled={true}
                    style={{ backgroundColor: '#eeeeee', cursor: 'not-allowed' }}
                />
                <TextControl
                    label={__('Title', 'tutorstarter')}
                    placeholder={__('e.g: My Awesome Post', 'tutorstarter')}
                    value={updatedValue.name ? updatedValue.name : post_title}
                    onChange={(value) => updateMeta(value, 'name')}
                />
                <TextControl
                    label={__('Image URL', 'tutorstarter')}
                    placeholder={__('e.g: https://site.com/image-url.jpg', 'tutorstarter')}
                    value={updatedValue.logo_url ? updatedValue.logo_url : post_thumbnail}
                    onChange={(value) => updateMeta(value, 'logo_url')}
                />
                <TextControl
                    label={__('Keywords', 'tutorstarter')}
                    placeholder={__('e.g: seo wordpress blog', 'tutorstarter')}
                    value={updatedValue.keywords}
                    onChange={(value) => updateMeta(value, 'keywords')}
                />
                <TextareaControl
                    label={__('Description', 'tutorstarter')}
                    placeholder={__('e.g: Awesome Description', 'tutorstarter')}
                    value={updatedValue.description ? updatedValue.description : post_excerpt}
                    onChange={(value) => updateMeta(value, 'description')}
                />
                <TextareaControl
                    label={__('Article Body', 'tutorstarter')}
                    placeholder={__('e.g: Awesome Post Content', 'tutorstarter')}
                    value={updatedValue.article_body ? updatedValue.article_body : post_content}
                    onChange={(value) => updateMeta(value, 'article_body')}
                />
            </Fragment>
        );
    } else {

        return (
            <Fragment>
                <SelectControl
                    label={__('Schema Type', 'tutorstarter')}
                    value={updatedValue.main_schema_select}
                    options={[
                        { label: __('--Select--', 'tutorstarter'), value: '' },
                        { label: __('Local Business', 'tutorstarter'), value: 'LocalBusiness' },
                        { label: __('Organization', 'tutorstarter'), value: 'Organization' },
                        { label: __('Web Page', 'tutorstarter'), value: 'WebPage' },
                        { label: __('Video', 'tutorstarter'), value: 'Video' },
                        { label: __('Review', 'tutorstarter'), value: 'Review' },
                        { label: __('Person', 'tutorstarter'), value: 'Person' },
                        { label: __('Course', 'tutorstarter'), value: 'Course' },
                    ]}
                    onChange={(value) => updateMeta(value, 'main_schema_select')}
                />
                { 'WebPage' !== updatedValue.main_schema_select && 'Video' !== updatedValue.main_schema_select && 'Course' !== updatedValue.main_schema_select &&
                    <SelectControl
                        label={'Person' === updatedValue.main_schema_select ? __('Gender', 'tutorstarter') : __('Sub Schema Type', 'tutorstarter')}
                        value={updatedValue.sub_schema_select}
                        options={selectOptions(updatedValue.main_schema_select)}
                        onChange={(value) => updateMeta(value, 'sub_schema_select')}
                    />
                }
                <TextControl
                    label={__('Name', 'tutorstarter')}
                    placeholder={__('e.g: John Doe', 'tutorstarter')}
                    value={updatedValue.name}
                    onChange={(value) => updateMeta(value, 'name')}
                />
                { 'Person' === updatedValue.main_schema_select &&
                    <Fragment>
                        <TextControl
                            label={__('Job Title', 'tutorstarter')}
                            placeholder={__('e.g: Software Engineer', 'tutorstarter')}
                            value={updatedValue.job_title}
                            onChange={(value) => updateMeta(value, 'job_title')}
                        />
                        <TextControl
                            label={__('Height', 'tutorstarter')}
                            placeholder={__('e.g: 165 cm', 'tutorstarter')}
                            value={updatedValue.height}
                            onChange={(value) => updateMeta(value, 'height')}
                        />
                        <TextControl
                            label={__('Email', 'tutorstarter')}
                            placeholder={__('e.g: john@doe.com', 'tutorstarter')}
                            value={updatedValue.email}
                            onChange={(value) => updateMeta(value, 'email')}
                        />
                        <TextControl
                            label={__('Birth Date', 'tutorstarter')}
                            placeholder={__('e.g: YYYY-MM-DD', 'tutorstarter')}
                            value={updatedValue.birth_date}
                            onChange={(value) => updateMeta(value, 'birth_date')}
                        />
                        <TextControl
                            label={__('Birth Place', 'tutorstarter')}
                            placeholder={__('e.g: Zurich, Switzerland', 'tutorstarter')}
                            value={updatedValue.birth_place}
                            onChange={(value) => updateMeta(value, 'birth_place')}
                        />
                        <TextControl
                            label={__('Nationality', 'tutorstarter')}
                            placeholder={__('e.g: American', 'tutorstarter')}
                            value={updatedValue.nationality}
                            onChange={(value) => updateMeta(value, 'nationality')}
                        />
                        <TextControl
                            label={__('PO Box', 'tutorstarter')}
                            placeholder={__('e.g: 4521', 'tutorstarter')}
                            value={updatedValue.po_box}
                            onChange={(value) => updateMeta(value, 'po_box')}
                        />
                    </Fragment>
                }
                { 'Person' !== updatedValue.main_schema_select && 'WebPage' !== updatedValue.main_schema_select && 'Course' !== updatedValue.main_schema_select &&
                    <TextControl
                        label={'Video' === updatedValue.main_schema_select ? __('Thumbnail URL', 'tutorstarter') : __('Logo/Image URL', 'tutorstarter')}
                        placeholder={__('e.g: https://site.com/image-url.jpg', 'tutorstarter')}
                        value={updatedValue.logo_url}
                        onChange={(value) => updateMeta(value, 'logo_url')}
                    />
                }
                { 'Person' !== updatedValue.main_schema_select &&
                    <TextareaControl
                        label={__('Description', 'tutorstarter')}
                        placeholder={__('e.g: Awesome description', 'tutorstarter')}
                        value={updatedValue.description}
                        onChange={(value) => updateMeta(value, 'description')}
                    />
                }
                { 'Organization' === updatedValue.main_schema_select &&
                    <TextControl
                        label={__('PO Box', 'tutorstarter')}
                        placeholder={__('e.g: 4521', 'tutorstarter')}
                        value={updatedValue.po_box}
                        onChange={(value) => updateMeta(value, 'po_box')}
                    />
                }
                { 'WebPage' !== updatedValue.main_schema_select && 'Video' !== updatedValue.main_schema_select && 'Review' !== updatedValue.main_schema_select && 'Course' !== updatedValue.main_schema_select &&
                    <Fragment>
                        <TextControl
                            label={__('Address', 'tutorstarter')}
                            placeholder={__('e.g: 45, johnson road', 'tutorstarter')}
                            value={updatedValue.address}
                            onChange={(value) => updateMeta(value, 'address')}
                        />
                        <TextControl
                            label={__('Phone Number', 'tutorstarter')}
                            placeholder={__('e.g: +1 22 33 4567', 'tutorstarter')}
                            value={updatedValue.phone}
                            onChange={(value) => updateMeta(value, 'phone')}
                        />
                        <TextControl
                            label={__('City', 'tutorstarter')}
                            placeholder={__('e.g: New York', 'tutorstarter')}
                            value={updatedValue.city}
                            onChange={(value) => updateMeta(value, 'city')}
                        />
                        <TextControl
                            label={__('State/Region', 'tutorstarter')}
                            placeholder={__('e.g: California(CA)', 'tutorstarter')}
                            value={updatedValue.state_region}
                            onChange={(value) => updateMeta(value, 'state_region')}
                        />
                        <TextControl
                            label={__('Zip/Postal Code', 'tutorstarter')}
                            placeholder={__('e.g: 1234', 'tutorstarter')}
                            value={updatedValue.zip_code}
                            onChange={(value) => updateMeta(value, 'zip_code')}
                        />
                        <TextControl
                            label={__('Country', 'tutorstarter')}
                            placeholder={__('e.g: USA', 'tutorstarter')}
                            value={updatedValue.country}
                            onChange={(value) => updateMeta(value, 'country')}
                        />
                    </Fragment>
                }
                { 'Video' === updatedValue.main_schema_select &&
                    <Fragment>
                        <TextControl
                            label={__('Upload Date', 'tutorstarter')}
                            help={__('Format it like this YYYY-MM-DD and the time with "T then hour:minute:second+timezone"', 'tutorstarter')}
                            placeholder={__('e.g: 2020-10-10T08:00:00+08:00', 'tutorstarter')}
                            value={updatedValue.upload_date}
                            onChange={(value) => updateMeta(value, 'upload_date')}
                        />
                        <TextControl
                            label={__('Duration', 'tutorstarter')}
                            help={__('Format it like this: PT then 1 minute and then 30 second', 'tutorstarter')}
                            placeholder={__('e.g: PT1M30S', 'tutorstarter')}
                            value={updatedValue.duration}
                            onChange={(value) => updateMeta(value, 'duration')}
                        />
                        <TextControl
                            label={__('Content URL', 'tutorstarter')}
                            placeholder={__('e.g: https://example.com/video-url.mp4', 'tutorstarter')}
                            value={updatedValue.content_url}
                            onChange={(value) => updateMeta(value, 'content_url')}
                        />
                        <TextControl
                            label={__('Embed URL', 'tutorstarter')}
                            placeholder={__('e.g: https://example.com/videoplayer.swf?video=123', 'tutorstarter')}
                            value={updatedValue.embed_url}
                            onChange={(value) => updateMeta(value, 'embed_url')}
                        />
                        <TextControl
                            label={__('Interaction Count', 'tutorstarter')}
                            placeholder={__('e.g: 1254', 'tutorstarter')}
                            value={updatedValue.interaction_count}
                            onChange={(value) => updateMeta(value, 'interaction_count')}
                        />
                    </Fragment>
                }
                { 'Review' === updatedValue.main_schema_select &&
                    <Fragment>
                        <TextControl
                            label={__('Rating Value', 'tutorstarter')}
                            placeholder={__('e.g: 4', 'tutorstarter')}
                            value={updatedValue.rating_value}
                            onChange={(value) => updateMeta(value, 'rating_value')}
                        />
                        <TextControl
                            label={__('Reviewed Item', 'tutorstarter')}
                            placeholder={__('e.g: iPhone 11 Pro Case', 'tutorstarter')}
                            value={updatedValue.reviewed_product}
                            onChange={(value) => updateMeta(value, 'reviewed_product')}
                        />
                        <TextControl
                            label={__('Reviewed By', 'tutorstarter')}
                            placeholder={__('e.g: Mr John Doe', 'tutorstarter')}
                            value={updatedValue.reviewed_by}
                            onChange={(value) => updateMeta(value, 'reviewed_by')}
                        />
                        <TextControl
                            label={__('Date Published', 'tutorstarter')}
                            help={__('Format it like this YYYY-MM-DD', 'tutorstarter')}
                            placeholder={__('e.g: 2020-10-10', 'tutorstarter')}
                            value={updatedValue.date_published}
                            onChange={(value) => updateMeta(value, 'date_published')}
                        />
                        <TextControl
                            label={__('Review Publisher Type', 'tutorstarter')}
                            placeholder={__('e.g: Organization', 'tutorstarter')}
                            value={updatedValue.publisher_type}
                            onChange={(value) => updateMeta(value, 'publisher_type')}
                        />
                        <TextControl
                            label={__('Publisher Name', 'tutorstarter')}
                            placeholder={__('e.g: iPhone 11 Pro Case Inc.', 'tutorstarter')}
                            value={updatedValue.publisher_name}
                            onChange={(value) => updateMeta(value, 'publisher_name')}
                        />
                    </Fragment>
                }
                { 'Course' === updatedValue.main_schema_select && 
                    <Fragment>
                        <TextControl
                                label={__('Provider Name', 'tutorstarter')}
                                placeholder={__('e.g: Awesome Course Org.', 'tutorstarter')}
                                value={updatedValue.provider_name}
                                onChange={(value) => updateMeta(value, 'provider_name')}
                            />
                    </Fragment>
                }
            </Fragment>
        );
    }
}

export default SchemaFields;