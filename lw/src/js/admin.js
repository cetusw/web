let postData = {
    title: '',
    subtitle: '',
    content: '',
    author: '',
    author_url: '',
    publish_date: '',
    image_url: '',
    /*heroImageCard: '',*/
    featured: 0,
    adventure: 0,
}


const inputs = document.querySelectorAll('input');

function inputFocus(event) {
    event.target.style.backgroundColor = 'rgba(247, 247, 247, 1)';
    event.target.style.borderBottom = '1px solid rgba(46, 46, 46, 1)';

    event.target.addEventListener('blur', inputBlur);
}

function inputBlur(event) {
    if (event.target.value === '') {
        event.target.style.backgroundColor = 'rgba(255, 255, 255, 1)';
        event.target.style.borderBottom = '1px solid rgba(234, 234, 234, 1)';
    }
}

for (const input of inputs) {
    input.addEventListener('focus', inputFocus);
    input.addEventListener('input', inputFocus);

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
    /*cardImageInput.addEventListener('change', updateCardImageDisplay);*/
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
        /*&& postData.heroImageCard !== ''*/
        && postData.content !== '';
}

async function publishPost(event) {
    if (isValidPostData) {
        console.log(postData);
        const response = await fetch('http://localhost:8001/api.php', {
            method: "POST",
            body: JSON.stringify(postData),
            headers: {
                "Content-Type": "application/json",
            },
        });
        console.log(response);
        const json = await response.json();
        if (response.ok) {
            console.log("Успех:", JSON.stringify(json));
         } else {
             console.log("Proebali with: ", response.status)
         }
    } else {
        alert('Заполнены не все поля')
    }
}

async function getBase64FromFile(file) {
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
    if (event.target.value !== '') {
        articlePreviewTitle.textContent = event.target.value;
        postPreviewTitle.textContent = event.target.value;
        postData.title = event.target.value;
    } else {
        articlePreviewTitle.textContent = 'New Post';
        postPreviewTitle.textContent = 'New Post';
        postData.title = '';

    }
}

function changeDescription(event) {
    if (event.target.value !== '') {
        articlePreviewDescription.textContent = event.target.value;
        postPreviewDescription.textContent = event.target.value;
        postData.subtitle = event.target.value;
    } else {
        articlePreviewDescription.textContent = 'Please, enter any description';
        postPreviewDescription.textContent = 'Please, enter any description';
        postData.subtitle = '';
    }
}

function changeAuthor(event) {
    if (event.target.value !== '') {
        postPreviewAuthor.textContent = event.target.value;
        postData.author = event.target.value;
    } else {
        postPreviewAuthor.textContent = 'Enter author name';
        postData.author = '';
    }
}

function changeDate(event) {
    if (event.target.value !== '') {
        const date = new Date(event.target.value);
        postPreviewDate.textContent = `${date.getMonth() + 1}/${date.getDate()}/${date.getFullYear()}`;
        postData.publish_date = `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`;
    } else {
        postPreviewDate.textContent = '00/00/0000';
        postData.publish_date = '';
    }
}

async function updateAuthorImageDisplay(event) {
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
    uploadNewAvatar.hidden = true;
    removeAvatar.hidden = true;
    upload.hidden = false;
    authorImage.src = 'static/images/placeholder-image-round.svg';
    authorImageInput.value = '';
    authorImagePreview.src = 'static/images/author-image-preview.svg';
    postData.author_url = '';
}

function uploadNewImageAvatar(event) {
    authorImageInput.click();
}

async function updateArticleImageDisplay(event) {
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
    articleImageInput.click();
}

function removeImageArticle() {
    uploadNewArticle.hidden = true;
    removeArticle.hidden = true;
    size10mb.hidden = false;
    heroImage10mb.src = 'static/images/placeholder-image-rectangle-10mb.svg';
    articleImageInput.value = '';
    articleImagePreview.src = 'static/images/article-preview.svg';
    postData.image_url = '';

}

async function updateCardImageDisplay(event) {
    const cardFiles = event.target.files;
    let fileType = cardFiles[0].type;
    if (fileType === 'image/jpg' || fileType === 'image/png' || fileType === 'image/gif' || fileType === 'image/jpeg') {
        heroImage5mb.src = window.URL.createObjectURL(cardFiles[0]);
        cardImagePreview.src = heroImage5mb.src;
        heroImage5mb.classList.add('main-information__hero-image-10mb-uploaded');
        uploadNewCard.hidden = false;
        removeCard.hidden = false;
        size5mb.hidden = true;
        postData.heroImageCard = await getBase64FromFile(cardFiles[0]);
    } else {
        alert('Неверный тип файла. Допустимые: png, jpg, jpeg, gif');
    }
}

function uploadNewImageCard() {
    cardImageInput.click();
}

function removeImageCard() {
    uploadNewCard.hidden = true;
    removeCard.hidden = true;
    size5mb.hidden = false;
    heroImage5mb.src = 'static/images/placeholder-image-rectangle-5mb.svg';
    cardImageInput.value = '';
    cardImagePreview.src = 'static/images/post-card-preview.svg';
    postData.heroImageCard = '';
}

function changeContent(event) {
    postData.content = event.target.value;
}

initListeners();


