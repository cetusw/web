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

const inputTitle = document.getElementById('title-input');
const articlePreviewTitle = document.getElementById('article-preview-title');
const postPreviewTitle = document.getElementById('post-preview-title');

function changeTitle(event) {
    if (event.target.value !== '') {
        articlePreviewTitle.textContent = event.target.value;
        postPreviewTitle.textContent = event.target.value;
    } else {
        articlePreviewTitle.textContent = 'New Post';
        postPreviewTitle.textContent = 'New Post';
    }
}

articlePreviewTitle.textContent = 'New Post';
postPreviewTitle.textContent = 'New Post';
inputTitle.addEventListener('input', changeTitle);

const inputDescription = document.getElementById('description-input');
const articlePreviewDescription = document.getElementById('article-preview-description');
const postPreviewDescription = document.getElementById('post-preview-description');

function changeDescription(event) {
    if (event.target.value !== '') {
        articlePreviewDescription.textContent = event.target.value;
        postPreviewDescription.textContent = event.target.value;
    } else {
        articlePreviewDescription.textContent = 'Please, enter any description';
        postPreviewDescription.textContent = 'Please, enter any description';
    }
}

articlePreviewDescription.textContent = 'Please, enter any description';
postPreviewDescription.textContent = 'Please, enter any description';
inputDescription.addEventListener('input', changeDescription);

const inputAuthor = document.getElementById('author-input')
const postPreviewAuthor = document.getElementById('post-preview-author');

function changeAuthor(event) {
    if (event.target.value !== '') {
        postPreviewAuthor.textContent = event.target.value;
    } else {
        postPreviewAuthor.textContent = 'Enter author name';
    }
}

postPreviewAuthor.textContent = 'Enter author name';
inputAuthor.addEventListener('input', changeAuthor);

const inputDate = document.getElementById('date-input');
const postPreviewDate = document.getElementById('post-preview-date');

function changeDate(event) {
    if (event.target.value !== '') {
        postPreviewDate.textContent = event.target.value;
    } else {
        postPreviewDate.textContent = '00/00/0000';
    }
}

postPreviewDate.textContent = '00/00/0000';
inputDate.addEventListener('input', changeDate);



authorImageInput = document.getElementById('author-image-input');
authorImagePreview = document.getElementById('author-image')

authorImageInput.addEventListener("change", updateImageDisplay);

function updateImageDisplay(event) {
    while (authorImagePreview.firstChild) {
        authorImagePreview.removeChild(authorImagePreview.firstChild);
    }
    const curFiles = event.target.files;
    const image = document.createElement("img");

    image.src = window.URL.createObjectURL(curFiles[0]);
    authorImagePreview.appendChild(image);
}
