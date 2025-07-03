document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('formApply');
    const modal = document.getElementById('jobApplyModal');
    const closeModalBtn = document.getElementById('closeSuccessBtn');

    function showModal() {
        modal.classList.add('active');
    }

    function closeModal () {
        modal.classList.remove('active');
    }
    // закрытие модалки успешной отправки
    closeModalBtn.addEventListener('click', closeModal);

    form.addEventListener('submit', function(e){
        e.preventDefault();

        form.querySelectorAll('.error-message').forEach(el => {
            el.textContent = '';
        });

        const formData = new FormData(form);

        const vacancyId = document.querySelector('.job_details_header');
        formData.append('vacancy_id', vacancyId.id);

        BX.ajax.runComponentAction('impulsit:job.apply', 'checkForm', {
            mode: 'class',
            data: formData,
            processData: false,
            contentType: false
        })
            .then(response => {
                const data = response.data;
                if (!data.status) {
                    Object.entries(data.errors).forEach(([field, message]) => {
                        const err = form.querySelector(`.error-message[data-for="${field}"]`);
                        if (err) err.textContent = message;
                    });
                } else {
                    BX.ajax.runComponentAction('impulsit:job.apply', 'saveFormData', {
                        mode: 'class',
                        data: formData,
                        processData: false,
                        contentType: false
                    })
                        .then(response => {
                            showModal();
                            form.reset();
                        })
                        .catch(err => {
                            console.error(err);
                        });
                }
            })
            .catch(err => {
                console.error(err);
            });
    });
});
