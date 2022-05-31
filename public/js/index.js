// finding hashtag
document.querySelectorAll(".captions").forEach(function(el) {
    let renderedText = el.innerHTML.replace(/#(\w+)/g,
        "<a class='text-decoration-none' href='/search?query=%23$1'>#$1</a>");
    el.innerHTML = renderedText;
});

// like post dan komentar
function like(id, type='post') {
    let likesCount = document.getElementById(`${type}-likescount-${id}`);
    let el = document.getElementById(`btn-${type}-${id}`);
    
    fetch(`/like/${type}/${id}`)
        .then(res => res.json())
        .then(data => {
            let currentCount = 0;

            if (data.status === 'LIKE') {
                currentCount = parseInt(likesCount.innerHTML) + 1;
                el.innerHTML = "<i class='fa-solid fa-heart'></i>";
            } else {
                currentCount = parseInt(likesCount.innerHTML) - 1;
                el.innerHTML = "<i class='fa-regular fa-heart'></i>";
            }

            likesCount.innerHTML = `${currentCount} likes`;
        });
}

// follow button
function follow(id, el) {
    fetch(`/follow/${id}`)
        .then(res => res.json())
        .then(data => {
            el.innerText = (data.status === 'FOLLOW') ? 'Unfollow' : 'Follow';
        });
}