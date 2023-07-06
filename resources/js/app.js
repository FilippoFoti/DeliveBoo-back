import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteBtns = document.querySelectorAll(".btn-delete");

if (deleteBtns.length > 0) {
    deleteBtns.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            event.preventDefault();
            const restaurantTitle = btn.getAttribute("data-restaurant-title");

            const deleteModal = new bootstrap.Modal(
                document.getElementById("delete-modal")
            );
            document.getElementById("restaurant-title").innerText = restaurantTitle;

            document
                .getElementById("action-delete")
                .addEventListener("click", function () {
                    btn.parentElement.submit();
                });

            deleteModal.show();
        });
    });
};


const image = document.getElementById("image");
const imagePreview = document.getElementById("image-preview");
// Se l'elemento è trovato
if (image && imagePreview) {
    // Al change del valore di image input
    image.addEventListener("change", function () {
        // prelevo il file selzionato
        const selectedFile = this.files[0];

        const reader = new FileReader();
        reader.addEventListener("load", function () {
            //      Metto il file nel src del elemento image-preview
            //      Visualizzo l'immagine
            imagePreview.src = reader.result;
            imagePreview.classList.remove("d-none");
        });

        reader.readAsDataURL(selectedFile);
    });
}