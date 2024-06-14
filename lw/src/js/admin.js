window.addEventListener('load', function() {
    let postData = {
        title: '',
        subtitle: '',
        content: '',
        author: '',
        author_url: '',
        publish_date: '',
        image_url: '',
        featured: 0,
        adventure: 0,
        image_url_small: '',
    }

    //titles
    const inputTitle = document.getElementById('title-input');
    const articlePreviewTitle = document.getElementById('article-preview-title');
    const postPreviewTitle = document.getElementById('post-preview-title');

    //descriptions
    const inputDescription = document.getElementById('description-input');
    const articlePreviewDescription = document.getElementById('article-preview-description');
    const postPreviewDescription = document.getElementById('post-preview-description');

    //author
    const inputAuthor = document.getElementById('author-input')
    const postPreviewAuthor = document.getElementById('post-preview-author');

    //date
    const inputDate = document.getElementById('date-input');
    const postPreviewDate = document.getElementById('post-preview-date');

    //images
    const authorImageInput = document.getElementById('author-image-input');
    const authorImage = document.getElementById('author-image');
    const articleImageInput = document.getElementById('image10mb-input');
    const heroImage10mb = document.getElementById('hero-image-10mb');
    const articleImagePreview = document.getElementById('article-image-preview');
    const cardImageInput = document.getElementById('image5mb-input');
    const heroImage5mb = document.getElementById('hero-image-5mb');
    const cardImagePreview = document.getElementById('card-image-preview');
    const authorImagePreview = document.getElementById('author-image-preview');

    //buttons
    const uploadNewAvatar = document.getElementById('upload-new-avatar');
    const removeAvatar = document.getElementById('remove-avatar');
    const upload = document.getElementById('upload');
    const uploadNewArticle = document.getElementById('upload-new-article');
    const removeArticle = document.getElementById('remove-article');
    const size10mb = document.getElementById('size10mb');
    const uploadNewCard = document.getElementById('upload-new-card');
    const removeCard = document.getElementById('remove-card');
    const size5mb = document.getElementById('size5mb');
    const publish = document.getElementById('publish-button');

    //content
    const content = document.getElementById('content');

    //notifications
    const requiredFieldsNotification = document.getElementById('required-fields-empty');
    const formIsOk = document.getElementById('form-is-ok');
    const showTitleIsRequired = document.getElementById('title-required');

    const requiredFields = document.querySelectorAll('[required]');

    function initListeners() {
        inputTitle.addEventListener('input', changeTitle);
        inputDescription.addEventListener('input', changeDescription);
        inputAuthor.addEventListener('input', changeAuthor);
        inputDate.addEventListener('input', changeDate);
        authorImageInput.addEventListener('change', updateAuthorImageDisplay);
        removeAvatar.addEventListener('click', removeImageAvatar);
        uploadNewAvatar.addEventListener('click', uploadNewImageAvatar);
        articleImageInput.addEventListener('change', updateArticleImageDisplay);
        uploadNewArticle.addEventListener('click', uploadNewImageArticle);
        removeArticle.addEventListener('click', removeImageArticle);
        cardImageInput.addEventListener('change', updateCardImageDisplay);
        uploadNewCard.addEventListener('click', uploadNewImageCard);
        removeCard.addEventListener('click', removeImageCard);
        publish.addEventListener('click', publishPost);
        content.addEventListener('input', changeContent)

    }

    function isValidPostData() {
        return postData.title !== ''
            && postData.subtitle !== ''
            && postData.author !== ''
            && postData.author_url !== ''
            && postData.publish_date !== ''
            && postData.image_url !== ''
            && postData.image_url_small !== ''
            && postData.content !== '';
    }

    function clearFields() {
        inputTitle.value = '';
        inputDescription.value = '';
        inputDate.value = '';
        inputAuthor.value = '';
        removeImageCard();
        removeImageAvatar();
        removeImageArticle();
        content.value = '';
        postData.title = '';
        postData.subtitle = '';
        postData.author = '';
        postData.author_url = '';
        postData.publish_date = '';
        postData.image_url = '';
        postData.image_url_small = '';
        postData.content = '';
    }

    function synchroniseFields() {
        articlePreviewTitle.textContent = postData.title;
        postPreviewTitle.textContent = postData.title;

        articlePreviewDescription.textContent = postData.subtitle;
        postPreviewDescription.textContent = postData.subtitle;

        postPreviewAuthor.textContent = postData.author;

        postPreviewDate.textContent = postData.publish_date;
    }

    async function publishPost(event) {
        event.preventDefault();
        if (isValidPostData()) {
            const stringifyData = JSON.stringify(postData)
            console.log(stringifyData);
            const response = await fetch('http://localhost:8001/api.php', {
                method: "POST",
                body: stringifyData,
                headers: {
                    "Content-Type": "application/json",
                },
            });
            console.log(response);
            const json = await response.json();
            if (response.ok) {
                console.log("Успех: ", JSON.stringify(json));
                clearFields();
                synchroniseFields();
                formIsOk.hidden = false;
                setTimeout(() => {
                    formIsOk.hidden = true;
                }, 1000);
                for (const input of inputs) {
                    inputBlur(input);
                }
            } else {
                console.log("Провал: ", response.status);
            }
        } else {
            requiredFieldsNotification.hidden = false;
            formIsOk.hidden = true;
            for (let field of requiredFields) {
                if (field.value.trim() === '') {

                    /*const errorMessageElement = document.createElement('p');
                    errorMessageElement.textContent = 'Field is required';
                    errorMessageElement.style.color = 'rgba(232, 105, 97, 1)';

                    field.parentNode.insertBefore(errorMessageElement, field.nextSibling);*/
                    field.style.borderBottom = '1px solid rgba(232, 105, 97, 1)';
                }
            }
        }
    }

    function getBase64FromFile(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = (event) => {
                resolve(event.target.result);
            };
            reader.onerror = (error) => {
                reject(error);
            };
            reader.readAsDataURL(file);
        });
    }

    function changeTitle(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        if (event.target.value !== '') {
            postData.title = event.target.value;
            synchroniseFields();
        } else {
            postData.title = '';
            synchroniseFields();
        }
    }

    function changeDescription(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        if (event.target.value) {
            postData.subtitle = event.target.value;
            synchroniseFields();
        } else {
            postData.subtitle = '';
            synchroniseFields();
        }
    }

    function changeAuthor(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        if (event.target.value) {
            postData.author = event.target.value;
            synchroniseFields();
        } else {
            postData.author = '';
            synchroniseFields();
        }
    }

    function changeDate(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        if (event.target.value) {
            const date = new Date(event.target.value);
            postData.publish_date = `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`;
            synchroniseFields();
        } else {
            postData.publish_date = '';
            synchroniseFields();
        }
    }

    async function updateAuthorImageDisplay(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        const authorFiles = event.target.files;
        let fileType = authorFiles[0].type;
        if (fileType === 'image/jpg' || fileType === 'image/png' || fileType === 'image/gif' || fileType === 'image/jpeg') {
            authorImage.src = window.URL.createObjectURL(authorFiles[0]);
            uploadNewAvatar.hidden = false;
            removeAvatar.hidden = false;
            upload.hidden = true;
            authorImagePreview.src = authorImage.src;
            postData.author_url = await getBase64FromFile(authorFiles[0]);
        } else {
            alert('Неверный тип файла. Допустимые: png, jpg, jpeg, gif');
        }
    }

    function removeImageAvatar(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        uploadNewAvatar.hidden = true;
        removeAvatar.hidden = true;
        upload.hidden = false;
        authorImage.src = 'static/images/placeholder-image-round.svg';
        authorImageInput.value = '';
        authorImagePreview.src = 'static/images/author-image-preview.svg';
        postData.author_url = '';
    }

    function uploadNewImageAvatar(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        authorImageInput.click();
    }

    async function updateArticleImageDisplay(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        const articleFiles = event.target.files;
        let fileType = articleFiles[0].type;
        if (fileType === 'image/jpg' || fileType === 'image/png' || fileType === 'image/gif' || fileType === 'image/jpeg') {
            heroImage10mb.src = window.URL.createObjectURL(articleFiles[0]);
            articleImagePreview.src = heroImage10mb.src;
            heroImage10mb.classList.add('main-information__hero-image-10mb-uploaded');
            uploadNewArticle.hidden = false;
            removeArticle.hidden = false;
            size10mb.hidden = true;
            postData.image_url = await getBase64FromFile(articleFiles[0]);
        } else {
            alert('Неверный тип файла. Допустимые: png, jpg, jpeg, gif');
        }
    }

    function uploadNewImageArticle() {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        articleImageInput.click();
    }

    function removeImageArticle() {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        uploadNewArticle.hidden = true;
        removeArticle.hidden = true;
        size10mb.hidden = false;
        heroImage10mb.src = 'static/images/placeholder-image-rectangle-10mb.svg';
        articleImageInput.value = '';
        articleImagePreview.src = 'static/images/article-preview.svg';
        postData.image_url = '';

    }

    async function updateCardImageDisplay(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        const cardFiles = event.target.files;
        let fileType = cardFiles[0].type;
        if (fileType === 'image/jpg' || fileType === 'image/png' || fileType === 'image/gif' || fileType === 'image/jpeg') {
            heroImage5mb.src = window.URL.createObjectURL(cardFiles[0]);
            cardImagePreview.src = heroImage5mb.src;
            heroImage5mb.classList.add('main-information__hero-image-10mb-uploaded');
            uploadNewCard.hidden = false;
            removeCard.hidden = false;
            size5mb.hidden = true;
            postData.image_url_small = await getBase64FromFile(cardFiles[0]);
        } else {
            alert('Неверный тип файла. Допустимые: png, jpg, jpeg, gif');
        }
    }

    function uploadNewImageCard() {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        cardImageInput.click();
    }

    function removeImageCard() {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        uploadNewCard.hidden = true;
        removeCard.hidden = true;
        size5mb.hidden = false;
        heroImage5mb.src = 'static/images/placeholder-image-rectangle-5mb.svg';
        cardImageInput.value = '';
        cardImagePreview.src = 'static/images/post-card-preview.svg';
        postData.image_url_small = '';
    }

    function changeContent(event) {
        requiredFieldsNotification.hidden = true;
        formIsOk.hidden = true;
        postData.content = event.target.value;
    }

    initListeners();
});


