const { __, _x, _n, _nx } = wp.i18n;

const createNewCourse = document.getElementById('tutor-starter-create-course');

async function ajaxHandler(formData) {
	try {
		const post = await fetch(tutorstarter_vars.ajaxurl, {
			method: 'POST',
			body: formData,
		});
		return post;
	} catch (error) {
		tutor_toast(__('Operation failed', 'tutor'), error, 'error');
	}
}

if(createNewCourse) {
    createNewCourse.addEventListener('click', async (e) => {

        e.preventDefault();
        
        createNewCourse.setAttribute('disabled', 'disabled');
        createNewCourse.classList.add('is-loading');
        const defaultErrorMessage = __('Something went wrong, please try again', 'tutor');
        const formData = new FormData();
        formData.set('action', 'tutor_create_new_draft_course');
        formData.set(window.tutor_get_nonce_data(true).key, window.tutor_get_nonce_data(true).value);
        const post = await ajaxHandler(formData);
        if (post.ok) {
            createNewCourse.classList.remove('is-loading');
            const response = await post.json();
            
            if (response.success) {
                window.location = response.data.url;
            } else {
                if (response.data.error_message) {
                    tutor_toast(__('Failed', 'tutor'), response.data.error_message, 'error');
                } else {
                    tutor_toast(__('Failed', 'tutor'), defaultErrorMessage, 'error');
                }
            }
        } else {
            tutor_toast(__('Failed', 'tutor'), defaultErrorMessage, 'error');
        }

    });
}