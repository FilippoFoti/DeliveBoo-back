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
}