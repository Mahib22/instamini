// finding hashtag
document.querySelectorAll(".captions").forEach(function(el) {
    let renderedText = el.innerHTML.replace(/#(\w+)/g,
        "<a class='text-decoration-none' href='/search?query=%23$1'>#$1</a>");
    el.innerHTML = renderedText;
});

// like post dan komentar
function like(id, type='post') {
    let el = document.getElementById(`btn-${type}-${id}`);
    fetch(`/like/${type}/${id}`)
        .then(res => res.json())
        .then(data => {
            el.innerText = (data.status === 'LIKE') ? 'Unlike' : 'Like';
        });
}

// follow button
function follow(id, el) {
    fetch('/follow/' + id)
        .then(res => res.json())
        .then(data => {
            el.innerText = (data.status === 'FOLLOW') ? 'Unfollow' : 'Follow';
        });
}