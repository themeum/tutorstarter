(function() {
    let select_value = document.querySelector('#hcf_select');
    let date_value = document.querySelector('#hcf_published_date');

    if ( null !== select_value ) {
        select_value.addEventListener('change', function() {
    
            if ('Course' === select_value.value) {
                date_value.style.display = 'none';
            } else {
                date_value.style.display = 'block';
            }
        })
    }
})();