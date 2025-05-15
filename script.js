
document.querySelector("#cancel").addEventListener("click", function (e) {
    e.preventDefault();
    document.querySelector("#add_new_photo").classList.remove("open")
});

document.querySelectorAll(".photo").forEach(photo => {
    photo.addEventListener("click", open_photo);
})

document.querySelector("#popup_photo").addEventListener("click", function () {
    this.classList.remove("open");
})