document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".menu-item").forEach(function (element) {
        element.addEventListener('click', () => {
            data = element.dataset.page;
            get_fetch(data);
            console.log(data)
        });
    })

    function get_fetch(data){
        fetch('/handler/get_page.php', {
            method: 'POST',
            body: data
        })
            .then(response =>response.text())
            .then(result =>
                document.querySelector(".content").innerHTML = result)
            .catch(error => console.error(error));
    }
});
