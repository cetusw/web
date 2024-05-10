let postData = {
    title: '',
    description: '',
    authorName: '',
    authorPhoto: '',
    publishDate: '',
    heroImagePost: '',
    heroImageCard: '',
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
const size = document.getElementById('size');

function initListeners() {
    inputTitle.addEventListener('input', changeTitle);
    inputDescription.addEventListener('input', changeDescription);
    inputAuthor.addEventListener('input', changeAuthor);
    inputDate.addEventListener('input', changeDate);
    authorImageInput.addEventListener('change', updateAuthorImageDisplay);
    removeAvatar.addEventListener('click', removeAuthorImage);
    uploadNewAvatar.addEventListener('click', uploadNewImageAvatar);
    articleImageInput.addEventListener('change', updateArticleImageDisplay);
    uploadNewArticle.addEventListener('click', uploadNewImageArticle);
}

function changeTitle(event) {
    if (event.target.value !== '') {
        articlePreviewTitle.textContent = event.target.value;
        postPreviewTitle.textContent = event.target.value;
        postData.title = event.target.value;
    } else {
        articlePreviewTitle.textContent = 'New Post';
        postPreviewTitle.textContent = 'New Post';
        postData.title = event.target.value;

    }
}

function changeDescription(event) {
    if (event.target.value !== '') {
        articlePreviewDescription.textContent = event.target.value;
        postPreviewDescription.textContent = event.target.value;
    } else {
        articlePreviewDescription.textContent = 'Please, enter any description';
        postPreviewDescription.textContent = 'Please, enter any description';
    }
}

function changeAuthor(event) {
    if (event.target.value !== '') {
        postPreviewAuthor.textContent = event.target.value;
    } else {
        postPreviewAuthor.textContent = 'Enter author name';
    }
}

function changeDate(event) {
    if (event.target.value !== '') {
        const date = new Date(event.target.value);
        postPreviewDate.textContent = `${date.getMonth() + 1}/${date.getDate()}/${date.getFullYear()}`;
    } else {
        postPreviewDate.textContent = '00/00/0000';
    }
}

function updateAuthorImageDisplay(event) {
    const curFiles = event.target.files;
    if (curFiles.length !== 0) {
        authorImage.src = window.URL.createObjectURL(curFiles[0]);
        uploadNewAvatar.hidden = false;
        removeAvatar.hidden = false;
        upload.hidden = true;
        authorImagePreview.src = authorImage.src;
    }
}

function removeAuthorImage(event) {
    uploadNewAvatar.hidden = true;
    removeAvatar.hidden = true;
    upload.hidden = false;
    authorImage.src = 'static/images/placeholder-image-round.svg';
    authorImageInput.value = '';
    authorImagePreview.src = 'static/images/author-image-preview.svg';
}

function uploadNewImageAvatar(event) {
    authorImageInput.click();
}

function updateArticleImageDisplay(event) {
    const articleFiles = event.target.files;
    if (articleFiles.length !== 0) {
        heroImage10mb.src = window.URL.createObjectURL(articleFiles[0]);
        articleImagePreview.src = heroImage10mb.src;
        heroImage10mb.classList.add('main-information__hero-image-10mb-uploaded');
        uploadNewArticle.hidden = false;
        removeArticle.hidden = false;
        size.hidden = true;
    }
}

function uploadNewImageArticle() {
    articleImageInput.click();
}

initListeners();


