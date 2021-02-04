( function() {
    const mainSchemaSelect = document.querySelector( '#main_schema_select' );
    const subSchemaSelect = document.querySelector( '.meta-sub-schema' );
    const name = document.querySelector( '.meta-name' );
    const description = document.querySelector( '.meta-description' );
    const logoUrl = document.querySelector( '.meta-logo' );
    const address = document.querySelector( '.meta-address' );
    const phone = document.querySelector( '.meta-phone' );
    const city = document.querySelector( '.meta-city' );
    const stateRegion = document.querySelector( '.meta-state-region' );
    const zipCode = document.querySelector( '.meta-zip-code' );
    const country = document.querySelector( '.meta-country' );
    const poBox = document.querySelector( '.meta-po-box' );
    const jobTitle = document.querySelector( '.meta-job-title' );
    const height = document.querySelector( '.meta-height' );
    const birthDate = document.querySelector( '.meta-birth-date' );
    const birthPlace = document.querySelector( '.meta-birth-place' );
    const nationality = document.querySelector( '.meta-nationality' );
    const duration = document.querySelector( '.meta-duration' );
    const uploadDate = document.querySelector( '.meta-upload-date' );
    const contentUrl = document.querySelector( '.meta-content-url' );
    const embedUrl = document.querySelector( '.meta-embed-url' );
    const interactionCount = document.querySelector( '.meta-interaction-count' );
    const ratingValue = document.querySelector( '.meta-rating-value' );
    const reviewedProduct = document.querySelector( '.meta-reviewed-product' );
    const reviewedBy = document.querySelector( '.meta-reviewed-by' );
    const datePublished = document.querySelector( '.meta-date-published' );
    const publisherType = document.querySelector( '.meta-publisher-type' );
    const publisherName = document.querySelector( '.meta-publisher-name' );
    const keywords = document.querySelector( '.meta-keywords' );
    const articleBody = document.querySelector( '.meta-article-body' );
    const providerName = document.querySelector( '.meta-provider-name' );
    
    if ( null !== mainSchemaSelect ) {
        mainSchemaSelect.addEventListener( 'change', function() {
    
            if ( 'Course' === mainSchemaSelect.value ) {
                null !== logoUrl ? logoUrl.style.display = 'none' : '';
                null !== address? address.style.display = 'none' : '';
                null !== phone ? phone.style.display = 'none' : '';
                null !== city ? city.style.display = 'none' : '';
                null !== stateRegion ? stateRegion.style.display = 'none' : '';
                null !== zipCode ? zipCode.style.display = 'none' : '';
                null !== country ? country.style.display = 'none' : '';
                null !== poBox ? poBox.style.display = 'none' : '';
                null !== jobTitle ? jobTitle.style.display = 'none' : '';
                null !== height ? height.style.display = 'none' : '';
                null !== birthDate ? birthDate.style.display = 'none' : '';
                null !== birthPlace ? birthPlace.style.display = 'none' : '';
                null !== nationality ? nationality.style.display = 'none' : '';
                null !== duration ? duration.style.display = 'none' : '';
                null !== uploadDate ? uploadDate.style.display = 'none' : '';
                null !== contentUrl ? contentUrl.style.display = 'none' : '';
                null !== embedUrl ? embedUrl.style.display = 'none' : '';
                null !== interactionCount ? interactionCount.style.display = 'none' : '';
                null !== ratingValue ? ratingValue.style.display = 'none' : '';
                null !== reviewedProduct ? reviewedProduct.style.display = 'none' : '';
                null !== reviewedBy ? reviewedBy.style.display = 'none' : '';
                null !== datePublished ? datePublished.style.display = 'none' : '';
                null !== publisherType ? publisherType.style.display = 'none' : '';
                null !== publisherName ? publisherName.style.display = 'none' : '';
                null !== keywords ? keywords.style.display = 'none' : '';
                null !== articleBody ? articleBody.style.display = 'none' : '';
                null !== subSchemaSelect ? subSchemaSelect.style.display = 'none' : '';
            }
        } );
    }
} )();