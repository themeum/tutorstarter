const { __ } = wp.i18n;
const { Fragment, useState } = wp.element;
const { SelectControl, TextControl, TextareaControl } = wp.components;

import { localBusiness, organization, person, review } from './select-options';

const TutorSchemaFields = () => {
    let optionsGroup = [];
    let is_blog_post = tutorstarter_admin_schema.is_post;
    let post_title = tutorstarter_admin_schema.post_title;
    let post_excerpt = tutorstarter_admin_schema.post_excerpt;
    let post_content = tutorstarter_admin_schema.post_content;
    let post_thumbnail = tutorstarter_admin_schema.post_thumbnail;
    let post_meta = JSON.parse( tutorstarter_admin_schema.post_meta );

    const [name, setName] = useState(post_meta.name);
    const [main_schema_select, setMainSchemaSelect] = useState(post_meta.main_schema_select);
    const [sub_schema_select, setSubSchemaSelect] = useState(post_meta.sub_schema_select);
    const [logo_url, setLogoUrl] = useState(post_meta.logo_url);
    const [description, setDescription] = useState(post_meta.description);
    const [address, setAddress] = useState(post_meta.address);
    const [phone, setPhone] = useState(post_meta.phone);
    const [email, setEmail] = useState(post_meta.email);
    const [city, setCity] = useState(post_meta.city);
    const [state_region, setStateRegion] = useState(post_meta.state_region);
    const [zip_code, setZipCode] = useState(post_meta.zip_code);
    const [country, setCountry] = useState(post_meta.country);
    const [po_box, setPoBox] = useState(post_meta.po_box);
    const [job_title, setJobTitle] = useState(post_meta.job_title);
    const [height, setHeight] = useState(post_meta.height);
    const [birth_date, setBirthDate] = useState(post_meta.birth_date);
    const [birth_place, setBirthPlace] = useState(post_meta.birth_place);
    const [nationality, setNationality] = useState(post_meta.nationality);
    const [duration, setDuration] = useState(post_meta.duration);
    const [upload_date, setUploadDate] = useState(post_meta.upload_date);
    const [content_url, setContentUrl] = useState(post_meta.content_url);
    const [embed_url, setEmbedUrl] = useState(post_meta.embed_url);
    const [interaction_count, setInteractionCount] = useState(post_meta.interaction_count);
    const [rating_value, setRatingValue] = useState(post_meta.rating_value);
    const [reviewed_product, setReviewedProduct] = useState(post_meta.reviewed_product);
    const [reviewed_by, setReviewedBy] = useState(post_meta.reviewed_by);
    const [date_published, setDatePublished] = useState(post_meta.date_published);
    const [publisher_type, setPublisherType] = useState(post_meta.publisher_type);
    const [publisher_name, setPublisherName] = useState(post_meta.publisher_name);
    const [post_keywords, setPostKeywords] = useState(post_meta.keywords);
    const [article_body, setArticleBody] = useState(post_meta.article_body);
    const [provider_name, setProvidername] = useState(post_meta.provider_name);
    
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
                    id='name'
                    name='name'
                    value={name ? name : post_title}
                    onChange={(value) => setName(value)}
                />
                <TextControl
                    label={__('Image URL', 'tutorstarter')}
                    placeholder={__('e.g: https://site.com/image-url.jpg', 'tutorstarter')}
                    id='logo_url'
                    name='logo_url'
                    value={logo_url ? logo_url : post_thumbnail}
                    onChange={(value) => setLogoUrl(value)}
                />
                <TextControl
                    label={__('Keywords', 'tutorstarter')}
                    placeholder={__('e.g: seo wordpress blog', 'tutorstarter')}
                    id='keywords'
                    name='keywords'
                    value={post_keywords}
                    onChange={(value) => setPostKeywords(value)}
                />
                <TextareaControl
                    label={__('Description', 'tutorstarter')}
                    placeholder={__('e.g: Awesome Description', 'tutorstarter')}
                    id='description'
                    name='description'
                    value={description ? description : post_excerpt}
                    onChange={(value) => setDescription(value)}
                />
                <TextareaControl
                    label={__('Article Body', 'tutorstarter')}
                    placeholder={__('e.g: Awesome Post Content', 'tutorstarter')}
                    id='article_body'
                    name='article_body'
                    value={article_body ? article_body : post_content}
                    onChange={(value) => setArticleBody(value)}
                />
            </Fragment>
        );
    } else {
        return (
            <Fragment>
                <SelectControl
                    label={__('Schema Type', 'tutorstarter')}
                    id='main_schema_select'
                    name='main_schema_select'
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
                    value={main_schema_select}
                    onChange={(value) => setMainSchemaSelect(value)}
                />
                { 'WebPage' !== main_schema_select && 'Video' !== main_schema_select && 'Course' !== main_schema_select &&
                    <SelectControl
                        label={'Person' === main_schema_select ? __('Gender', 'tutorstarter') : __('Sub Schema Type', 'tutorstarter')}
                        id='sub_schema_select'
                        name='sub_schema_select'
                        options={selectOptions(main_schema_select)}
                        value={sub_schema_select}
                        onChange={(value) => setSubSchemaSelect(value)}
                    />
                }
                <TextControl
                    label={__('Name', 'tutorstarter')}
                    placeholder={__('e.g: John Doe', 'tutorstarter')}
                    id='name'
                    name='name'
                    value={name}
                    onChange={(value) => setName(value)}
                />
                { 'Person' === main_schema_select &&
                    <Fragment>
                        <TextControl
                            label={__('Job Title', 'tutorstarter')}
                            placeholder={__('e.g: Software Engineer', 'tutorstarter')}
                            id='job_title'
                            name='job_title'
                            value={job_title}
                            onChange={(value) => setJobTitle(value)}
                        />
                        <TextControl
                            label={__('Height', 'tutorstarter')}
                            placeholder={__('e.g: 165 cm', 'tutorstarter')}
                            id='height'
                            name='height'
                            value={height}
                            onChange={(value) => setHeight(value)}
                        />
                        <TextControl
                            label={__('Email', 'tutorstarter')}
                            placeholder={__('e.g: john@doe.com', 'tutorstarter')}
                            id='email'
                            name='email'
                            value={email}
                            onChange={(value) => setEmail(value)}
                        />
                        <TextControl
                            label={__('Birth Date', 'tutorstarter')}
                            placeholder={__('e.g: YYYY-MM-DD', 'tutorstarter')}
                            id='birth_date'
                            name='birth_date'
                            value={birth_date}
                            onChange={(value) => setBirthDate(value)}
                        />
                        <TextControl
                            label={__('Birth Place', 'tutorstarter')}
                            placeholder={__('e.g: Zurich, Switzerland', 'tutorstarter')}
                            id='birth_place'
                            name='birth_place'
                            value={birth_place}
                            onChange={(value) => setBirthPlace(value)}
                        />
                        <TextControl
                            label={__('Nationality', 'tutorstarter')}
                            placeholder={__('e.g: American', 'tutorstarter')}
                            id='nationality'
                            name='nationality'
                            value={nationality}
                            onChange={(value) => setNationality(value)}
                        />
                        <TextControl
                            label={__('PO Box', 'tutorstarter')}
                            placeholder={__('e.g: 4521', 'tutorstarter')}
                            id='po_box'
                            name='po_box'
                            value={po_box}
                            onChange={(value) => setPoBox(value)}
                        />
                    </Fragment>
                }
                { 'Person' !== main_schema_select && 'WebPage' !== main_schema_select && 'Course' !== main_schema_select &&
                    <TextControl
                        label={'Video' === main_schema_select ? __('Thumbnail URL', 'tutorstarter') : __('Logo/Image URL', 'tutorstarter')}
                        placeholder={__('e.g: https://site.com/image-url.jpg', 'tutorstarter')}
                        id='logo_url'
                        name='logo_url'
                        value={logo_url}
                        onChange={(value) => setLogoUrl(value)}
                    />
                }
                { 'Person' !== main_schema_select &&
                    <TextareaControl
                        label={__('Description', 'tutorstarter')}
                        placeholder={__('e.g: Awesome description', 'tutorstarter')}
                        id='description'
                        name='description'
                        value={description}
                        onChange={(value) => setDescription(value)}
                    />
                }
                { 'Organization' === main_schema_select &&
                    <TextControl
                        label={__('PO Box', 'tutorstarter')}
                        placeholder={__('e.g: 4521', 'tutorstarter')}
                        id='po_box'
                        name='po_box'
                        value={po_box}
                        onChange={(value) => setPoBox(value)}
                    />
                }
                { 'WebPage' !== main_schema_select && 'Video' !== main_schema_select && 'Review' !== main_schema_select && 'Course' !== main_schema_select &&
                    <Fragment>
                        <TextControl
                            label={__('Address', 'tutorstarter')}
                            placeholder={__('e.g: 45, johnson road', 'tutorstarter')}
                            id='address'
                            name='address'
                            value={address}
                            onChange={(value) => setAddress(value)}
                        />
                        <TextControl
                            label={__('Phone Number', 'tutorstarter')}
                            placeholder={__('e.g: +1 22 33 4567', 'tutorstarter')}
                            id='phone'
                            name='phone'
                            value={phone}
                            onChange={(value) => setPhone(value)}
                        />
                        <TextControl
                            label={__('City', 'tutorstarter')}
                            placeholder={__('e.g: New York', 'tutorstarter')}
                            id='city'
                            name='city'
                            value={city}
                            onChange={(value) => setCity(value)}
                        />
                        <TextControl
                            label={__('State/Region', 'tutorstarter')}
                            placeholder={__('e.g: California(CA)', 'tutorstarter')}
                            id='state_region'
                            name='state_region'
                            value={state_region}
                            onChange={(value) => setStateRegion(value)}
                        />
                        <TextControl
                            label={__('Zip/Postal Code', 'tutorstarter')}
                            placeholder={__('e.g: 1234', 'tutorstarter')}
                            id='zip_code'
                            name='zip_code'
                            value={zip_code}
                            onChange={(value) => setZipCode(value)}
                        />
                        <TextControl
                            label={__('Country', 'tutorstarter')}
                            placeholder={__('e.g: USA', 'tutorstarter')}
                            id='country'
                            name='country'
                            value={country}
                            onChange={(value) => setCountry(value)}
                        />
                    </Fragment>
                }
                { 'Video' === main_schema_select &&
                    <Fragment>
                        <TextControl
                            label={__('Upload Date', 'tutorstarter')}
                            help={__('Format it like this YYYY-MM-DD and the time with "T then hour:minute:second+timezone"', 'tutorstarter')}
                            placeholder={__('e.g: 2020-10-10T08:00:00+08:00', 'tutorstarter')}
                            id='upload_date'
                            name='upload_date'
                            value={upload_date}
                            onChange={(value) => setUploadDate(value)}
                        />
                        <TextControl
                            label={__('Duration', 'tutorstarter')}
                            help={__('Format it like this: PT then 1 minute and then 30 second', 'tutorstarter')}
                            placeholder={__('e.g: PT1M30S', 'tutorstarter')}
                            id='duration'
                            name='duration'
                            value={duration}
                            onChange={(value) => setDuration(value)}
                        />
                        <TextControl
                            label={__('Content URL', 'tutorstarter')}
                            placeholder={__('e.g: https://example.com/video-url.mp4', 'tutorstarter')}
                            id='content_url'
                            name='content_url'
                            value={content_url}
                            onChange={(value) => setContentUrl(value)}
                        />
                        <TextControl
                            label={__('Embed URL', 'tutorstarter')}
                            placeholder={__('e.g: https://example.com/videoplayer.swf?video=123', 'tutorstarter')}
                            id='embed_url'
                            name='embed_url'
                            value={embed_url}
                            onChange={(value) => setEmbedUrl(value)}
                        />
                        <TextControl
                            label={__('Interaction Count', 'tutorstarter')}
                            placeholder={__('e.g: 1254', 'tutorstarter')}
                            id='interaction_count'
                            name='interaction_count'
                            value={interaction_count}
                            onChange={(value) => setInteractionCount(value)}
                        />
                    </Fragment>
                }
                { 'Review' === main_schema_select &&
                    <Fragment>
                        <TextControl
                            label={__('Rating Value', 'tutorstarter')}
                            placeholder={__('e.g: 4', 'tutorstarter')}
                            id='rating_value'
                            name='rating_value'
                            value={rating_value}
                            onChange={(value) => setRatingValue(value)}
                        />
                        <TextControl
                            label={__('Reviewed Item', 'tutorstarter')}
                            placeholder={__('e.g: iPhone 11 Pro Case', 'tutorstarter')}
                            id='reviewed_product'
                            name='reviewed_product'
                            value={reviewed_product}
                            onChange={(value) => setReviewedProduct(value)}
                        />
                        <TextControl
                            label={__('Reviewed By', 'tutorstarter')}
                            placeholder={__('e.g: Mr John Doe', 'tutorstarter')}
                            id='reviewed_by'
                            name='reviewed_by'
                            value={reviewed_by}
                            onChange={(value) => setReviewedBy(value)}
                        />
                        <TextControl
                            label={__('Date Published', 'tutorstarter')}
                            help={__('Format it like this YYYY-MM-DD', 'tutorstarter')}
                            placeholder={__('e.g: 2020-10-10', 'tutorstarter')}
                            id='date_published'
                            name='date_published'
                            value={date_published}
                            onChange={(value) => setDatePublished(value)}
                        />
                        <TextControl
                            label={__('Review Publisher Type', 'tutorstarter')}
                            placeholder={__('e.g: Organization', 'tutorstarter')}
                            id='publisher_type'
                            name='publisher_type'
                            value={publisher_type}
                            onChange={(value) => setPublisherType(value)}
                        />
                        <TextControl
                            label={__('Publisher Name', 'tutorstarter')}
                            placeholder={__('e.g: iPhone 11 Pro Case Inc.', 'tutorstarter')}
                            id='publisher_name'
                            name='publisher_name'
                            value={publisher_name}
                            onChange={(value) => setPublisherName(value)}
                        />
                    </Fragment>
                }
                { 'Course' === main_schema_select && 
                    <Fragment>
                        <TextControl
                            label={__('Provider Name', 'tutorstarter')}
                            placeholder={__('e.g: Awesome Course Org.', 'tutorstarter')}
                            id='provider_name'
                            name='provider_name'
                            value={provider_name}
                            onChange={(value) => setProvidername(value)}
                        />
                    </Fragment>
                }
            </Fragment>
        );
    }
}

export default TutorSchemaFields;