document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggle = document.querySelector('.services');
    dropdownToggle.addEventListener('click', function () {
        const dropdownMenu = this.querySelector('.drop-down');
        dropdownMenu.classList.toggle('show');
    });
});
